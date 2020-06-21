<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Raiting;
use App\Tag;
use Illuminate\Http\Request;

class RaitingController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Raiting::with("Product")->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $this->validate($request, [
            'user_name' => 'required|string|min:3',
            'product_id' => 'required',
            'type' => 'required|string',
            'message' => 'required|string',
            'stars' => 'required|integer'
        ]);

        return Raiting::create($data);
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

        $raiting = Raiting::findOrFail($id);

        $raiting->delete();

        //Return message
        return response()->json(["message" => "Note supprimée !"]);
    }
}
