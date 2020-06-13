<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except('index', 'show', 'slug');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response
     */
    public function index()
    {
        if(Str::contains(URL::previous(), 'shop'))
            return Product::with('Category', 'Images', 'Tags')->get();
        $user = auth('api')->user();
        if($user->isAdmin())
            return Product::with('Category', 'Images', 'Tags')->get();
        return Product::where('user_id', auth('api')->id())->with('Category', 'Images', 'Tags')->get();
    }

    public function slug($slug)
    {
        return Product::with('Category', 'Images', 'Tags', 'Raitings')->get()->where('slug', $slug)->first();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:191',
            'category_id' => 'required|integer',
            'user_id' => 'required|integer',
            'price' => 'required|integer',
            'quantity' => 'required|integer',
            'description' => 'required|string',
            'image' => 'required'
        ]);
        $names = [];
        $path = public_path().'/uploads/products/images/' . uniqid();
        File::makeDirectory($path, 0775, true);

        foreach ($request->image as $image) {
            $name = time() .uniqid(). '.' . explode('/',
                    explode(':',
                        substr($image, 0,
                            strpos($image, ';')))[1])[1];

            $img = Image::make($image)->save($path .'/'. $name);
            $img->fit(270, 320);
            $img->save();

            $name = $path . '/'. $name;
            $corectPath = Str::after($name, '/public');

            $pi = \App\Image::create([
                'path' => $corectPath
            ]);

            $names[] = $pi->id;
        }

        $request->request->remove('image');
        $request->request->add(['slug' => Str::slug($request->name)]);
        $tags = $request->tags;
        $request->request->remove('tags');

        $product = Product::create($request->all());

        $product->tags()->attach($tags);
        $product->images()->attach($names);

        return response()->json(["message" => "Produit ajouté !"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::with('Category')->get()->find($id);
        return $product;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $this->validate($request, [
            'name' => 'required|string|max:191',
            'category_id' => 'required|integer',
            'user_id' => 'required|integer',
            'price' => 'required|integer',
            'quantity' => 'required|integer',
        ]);


        if ($request->hasFile('image')) {
            $name = time() . '.' . explode('/',
                    explode(':',
                        substr($request->image, 0,
                            strpos($request->image, ';')))[1])[1];
            $path = public_path('uploads/products/images/' . uniqid());
            File::makeDirectory($path, 0775);
            Image::make($request->image)->save($path . $name);

            $name = $path . '/'. $name;

            $request->merge(['image' => $name]);
        }

        $tags = $request->tags;
        $request->request->remove('tags');


        $product->update($request->all());

        if(!empty($tags))
            $product->tags()->sync($tags);

        return response()->json(["message" => "Produit modifié !"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        //$this->authorize('isAdmin');

        $product = Product::findOrFail($id);

        //Delete the product
        $c = Str::after($product->images->first()->path, '/images/');
        $path = "/uploads/products/images/" . Str::before($c, '/');
        $folder = public_path($path);
        File::deleteDirectory($folder);
        $product->images()->delete();
        $product->delete();

        //Return message
        return response()->json(["message" => "Produits supprimé !"]);
    }
}
