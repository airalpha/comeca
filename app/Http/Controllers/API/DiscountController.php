<?php

namespace App\Http\Controllers\API;

use App\Discount;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Discount::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('isAdmin');

        $data = $this->validate($request, [
            'code' => 'required|string|min:3',
            'percent' => 'required|integer'
        ]);

        Discount::create($data);

        return response()->json(["message" => "Coupons ajouté !"]);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->authorize('isAdmin');

        $discount = Discount::findOrFail($id);

        $this->validate($request, [
            'code' => 'required|string|min:3',
            'percent' => 'required|integer'
        ]);

        $discount->update($request->all());

        return response()->json(["message" => "Coupon modifié !"]);
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

        $discount = Discount::findOrFail($id);

        $discount->delete();

        //Return message
        return response()->json(["message" => "Coupon supprimé !"]);
    }
}
