<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Order;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function producers()
    {
        return User::with('Profile')->where('type', 'producer')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function orders()
    {
        $datas = auth('api')->user()->orders;
        $response = [];
        $i = 0;
        foreach ($datas as $data) {
            $response[$i]['date'] = Carbon::parse($data->payment_created_at)->format('d M. y - H:i');
            $response[$i]['amount'] = getPrice($data->amount);
            $response[$i]['notes'] = $data->notes;
            $response[$i]['state'] = $data->state;
            foreach (unserialize($data->products) as $product) {
                $response[$i]['products'][] = $product;
            }
            $i++;
        }
        return $response;
    }


    public function allOrders()
    {
        $datas = Order::all();
        $response = [];
        $i = 0;
        foreach ($datas as $data) {
            $response[$i]['date'] = Carbon::parse($data->payment_created_at)->format('d M. y - H:i');
            $response[$i]['amount'] = getPrice($data->amount);
            $response[$i]['notes'] = $data->notes;
            $response[$i]['state'] = $data->state;
            $dataser = preg_replace_callback(
                '!s:(\d+):"(.*?)";!',
                function($m) {
                    return 's:'.strlen($m[2]).':"'.$m[2].'";';
                },
                $data->user_informations);
            $response[$i]['user'] = unserialize($dataser);
            $response[$i]['id'] = $data->id;
            foreach (unserialize($data->products) as $product) {
                $response[$i]['products'][] = $product;
            }
            $i++;
        }
        return $response;
    }

    public function markValidate(Order $order)
    {
        $order->state = 2;
        $order->save();
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
