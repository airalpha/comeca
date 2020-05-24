<?php

namespace App\Http\Controllers\API;

use App\Events\NewMessage;
use App\Http\Controllers\Controller;
use App\Message;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;
use function foo\func;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('isAdmin');
        return User::all();
    }

    public function contacts() {
        return User::with("Profile")->where('id', '!=', auth('api')->user()->id)->get();
    }

    public function getMessagesFor($id) {
        $user_id = auth('api')->user()->id;
        $messages = Message::where(function($q) use($id, $user_id) {
            $q->where('from', $id);
            $q->where('to', $user_id);
        })->orWhere(function($q) use($id, $user_id) {
            $q->where('from', $user_id);
            $q->where('to', $id);
        })->get();
        $datas = [];
        foreach ($messages as $message) {
            $message->date = $message->created_at->diffForHumans();//Carbon::createFromTimeString( $message->created_at)->diffForHumans();
            $datas[] = $message;
        }

        return $datas;
    }

    public function sendMessage(Request $request)
    {
        $message =  Message::create([
            "from" => auth('api')->user()->id,
            "to" => $request->contact_id,
            "text" => $request->text
        ]);
        broadcast(new NewMessage($message));
        return $message;
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

        $this->validate($request, [
            'name' => 'required|string|max:191',
            'email' => 'required|string|email|max:191|unique:users',
            'password' => 'required|string|min:6'
        ]);

         $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type' => $request->type
        ]);

         $user->profile()->create([
             'city' => '',
             'bio' => '',
             'phone' => '',
             'avatar' => 'uploads/avatars/default.png'
         ]);

         return response()->json(["message" => "Utilisateur ajouté !"]);
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

        $user = User::findOrFail($id);

        $this->validate($request, [
            'name' => 'required|string|max:191',
            'email' => 'required|string|email|max:191|unique:users,email,'.$user->id,
            'password' => 'sometimes|min:6'
        ]);

        $user->update($request->all());

        return response()->json(["message" => "Utilisateur modifié !"]);
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

        $user = User::findOrFail($id);

        //Delete the user
        $user->delete();

        //Return message
        return response()->json(["message" => "Utilisateur supprimé !"]);
    }
}
