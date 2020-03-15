<?php

namespace App\Http\Controllers;

use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Cart::content();
        $result = [];
        foreach ($products as $product) {
            $result[] = $product->model;
        }
    }

    public function cart()
    {
        return view('cart');
    }

    /**
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
        $duplicata = Cart::search(function ($cardItem, $rowId) use ($request) {
            return $cardItem->id == $request->id;
        });

        if($duplicata->isNotEmpty()) {
            return response()->json([
                "message" => $request->name . " est déjà dans le panier !",
                "type" => "warning"
            ]);
        }

        $product = Product::find($request->id);
        $qte = intval($request->qte) ? intval($request->qte) : 1;
        Cart::add($request->id, $request->name, $qte, $request->price)
            ->associate(Product::class);

        return response()->json([
            "message" => $product->name . " a été ajouté au panier !",
            "type" => "success"
        ]);
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
    public function destroy($rowId)
    {
        Cart::remove($rowId);

        return response()->json([
            "message" => "Le produit a été retiré au panier !",
            "type" => "success"
        ]);
    }
}
