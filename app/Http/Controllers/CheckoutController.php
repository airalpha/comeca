<?php

namespace App\Http\Controllers;

use App\Order;
use Cartalyst\Stripe\Exception\CardErrorException;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Cartalyst\Stripe\Stripe;


class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        return view('checkout', compact('user'));
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
        $stripe = new Stripe(config('services.stripe.secret'));
        $stripe = Stripe::make(config('services.stripe.secret'));

        $data = $this->validate($request, [
            'name' => 'required|string|min:3',
            'email' => 'required|string|email',
            'phone' => 'required|integer',
            'city' => 'required|string',
            'order_notes' => 'required|string'
        ]);

        $total = checkSession()
            ? getDiscountTotalPrice(Cart::subtotal(), request()->session()->get('discount')['remise'])
            : Cart::total();

        try {
            $charge = $stripe->charges()->create([
                'source' => $request->stripeToken,
                'description' => 'Comeca Shoping',
                'receipt_email' => $request->email,
                'currency' => 'eur',
                'amount'   => $total,
            ]);

            $order = new Order();
            $order->payment_intent_id = $charge["id"];
            $order->amount = $charge["amount"];
            $order->notes = $request->order_notes;
            $order->payment_created_at = (new \DateTime())
                ->setTimestamp($charge["created"])
                ->format("Y-m-d H:i:s");

            // Enregistrement des produits et quantités
            $products = [];
            $i = 0;
            foreach (Cart::content() as $product) {
                $products[$i]["id"] = $product->model->id;
                $products[$i]["name"] = $product->model->name;
                $products[$i]["qty"] = $product->qty;
                $i++;
            }

            $order->products = serialize($products);

            if(auth())
                $order->user_id = auth()->id();

            $order->user_informations = serialize($data);
            $order->save();
            Cart::destroy();
            session()->flash('success', 'Merci pour votre payment !');
            return redirect()->back();

        } catch (CardErrorException $e) {
            session()->flash('error', 'Erreur : '.$e->getMessage());
            return redirect()->back();
        }
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
