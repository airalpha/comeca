<?php

namespace App\Listeners;

use App\Discount;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CartUpdatedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        if(request()->session()->has("discount")) {
            $code = request()->session()->get("discount")["code"];
            $discount = Discount::where("code", $code)->first();
            if ($discount) {
                request()->session()->put('discount', [
                    'code' => $discount->code,
                    'remise' => $discount->discount(Cart::subtotal())
                ]);
            }
        }
    }
}
