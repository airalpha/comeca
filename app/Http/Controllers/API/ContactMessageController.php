<?php

namespace App\Http\Controllers\API;

use App\ContactMessage;
use App\Http\Controllers\Controller;
use App\Notifications\NewContactMessagePosted;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;

class ContactMessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except('store', 'notificationRead');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ContactMessage::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
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

    public function notificationRead(DatabaseNotification $notification) {
        $notification->markAsRead();
        return redirect('/messages-list');
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

        $contactMessage = ContactMessage::findOrFail($id);

        $contactMessage->delete();

        //Return message
        return response()->json(["message" => "Message supprimé !"]);
    }
}
