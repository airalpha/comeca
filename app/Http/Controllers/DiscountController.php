<?php

namespace App\Http\Controllers;

use App\Discount;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function store(Request $request) {
        $code = $request->get("code");
        $discount = Discount::where("code", $code)->first();

        if (!$discount) {
            return redirect()->back()->with('error', 'Le coupon est invalide');
        }

        $request->session()->put('discount', [
            'code' => $discount->code,
            'remise' => $discount->discount(Cart::subtotal())
        ]);

        return redirect()->back()->with('success', 'Le coupon a été apliqué !');
    }

    public function delete()
    {

    }
}
