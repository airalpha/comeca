<?php

namespace App\Http\Controllers;

use App\ContactMessage;
use App\Notifications\NewContactMessagePosted;
use App\Product;
use App\Testimonial;
use App\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $products = Product::all();
        $latestProduct = $products->last();
        $testimonials = Testimonial::all();
        return view('welcome',
            compact('products','latestProduct', 'testimonials'));
    }

    public function about()
    {
        $products = Product::all();
        $latestProduct = $products->last();
        return view('about', compact('latestProduct'));
    }

    public function shop()
    {
        $latestProduct = Product::all()->last();
        return view('shop', compact('latestProduct'));
    }

    public function producer()
    {
        $latestProduct = Product::all()->last();
        return view('producer', compact('latestProduct'));
    }

    public function contact()
    {
        $latestProduct = Product::all()->last();
        return view('contact', compact('latestProduct'));
    }

    public function shopDetail($slug)
    {
        return view('shop-detail', compact('slug'));
    }

    /**
     * Function pour l'ajout d'un nouveau message de contact (Ca doit pas etre ici)
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name' => 'required|string|min:3',
            'email' => 'required|email|min:3',
            'subject' => 'required|string|min:3',
            'message' => 'required|string|min:5',
        ]);

        $contactMessage = ContactMessage::create($request->all());

        $admin = User::where('type', 'admin')->first();

        $admin->notify(new NewContactMessagePosted($contactMessage));

        return redirect()->back()->with('success', 'Message envoyé !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
