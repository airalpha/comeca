<?php

namespace App\Http\Controllers\API;

use App\Category;
use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function foo\func;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth('api')->user();
        if($user->isAdmin()) {
            $products = Product::all()->count();
            $orders = Order::all()->count();
        }
        else {
            $products = Product::where('user_id', $user->id)->count();
            $orders = Order::where('user_id', $user->id)->count();
        }

        $datas = DB::table('orders')
            ->select(DB::raw('MONTH(created_at) as month, count(*) as total'))
            ->groupBy('month')
            ->get()
            ->sortBy('month');

        $results = [];
        $i = 0;
        foreach ($datas as $data) {
            $results[$i]['month'] = \DateTime::createFromFormat('!m', $data->month)->format('F');
            $results[$i]['total'] = $data->total;
            $i++;
        }

        //$datas = array_values($datas);

        $category = Category::all()->count();
        $users = User::all()->count();

        return response()->json([
            'products' => $products,
            'users' => $users,
            'category' => $category,
            'orders' => $orders,
            'datas' => $results,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
