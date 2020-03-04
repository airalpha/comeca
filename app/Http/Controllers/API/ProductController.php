<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except('index', 'show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Product::with('Category')->get();
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
            'image' => 'required|string'
        ]);

        $name = time() . '.' . explode('/',
                explode(':',
                    substr($request->image, 0,
                        strpos($request->image, ';')))[1])[1];

        $img = Image::make($request->image)->save(public_path('uploads/products/') . $name);
        $img->fit(270, 320);
        $img->save();

        $request->merge(['image' => $name]);

        $product = Product::create($request->all());

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
        $product = Product::findOrFail($id);
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

            Image::make($request->image)->save(public_path('uploads/products/') . $name);

            $request->merge(['image' => $name]);
        }


        $product->update($request->all());

        return response()->json(["message" => "Produit modifié !"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('isAdmin');

        $product = Product::findOrFail($id);

        //Delete the user
        $product->delete();

        //Return message
        return response()->json(["message" => "Produits supprimé !"]);
    }
}
