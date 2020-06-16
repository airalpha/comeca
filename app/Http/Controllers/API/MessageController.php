<?php

namespace App\Http\Controllers\API;

use App\Events\NewMessage;
use App\Http\Controllers\Controller;
use App\Message;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    public function contacts() {
        $contacts =  User::with("Profile")->where('id', '!=', auth('api')->id())->get();

        //On selectione d'abord le nombre de messages non lus
        $unreadIds = Message::select(DB::raw('`from` as sender_id, count(`from`) as messages_count'))
            ->where('to', auth('api')->id())
            ->where('read', false)
            ->groupBy('from')
            ->get();

        //On recherche parmis tout les contacts ceux qui ont des messages non lus
        $contacts = $contacts->map(function ($contact) use ($unreadIds) {
            $contactUnread = $unreadIds->where('sender_id', $contact->id)->first();
            // Maintenant si $contactUnread existe c'est qu'on recupere le nombre de
            // messages non lus si ca n'existe pas on met 0
            $contact->unread = $contactUnread ? $contactUnread->messages_count : 0;
            return $contact;
        });

        return $contacts;
    }

    public function getMessagesFor($id) {
        // Quand on clique sur un contact on mets doc ses messages a lue
        Message::where('from', $id)->where('to', auth('api')->id())->update(['read' => true]);

        $user_id = auth('api')->user()->id;

        $messages = Message::where(function($q) use($id, $user_id) {
            $q->where('from', $id);
            $q->where('to', $user_id);
        })->orWhere(function($q) use($id, $user_id) {
            $q->where('from', $user_id);
            $q->where('to', $id);
        })->get();

        if ($id === "0")
            $messages = Message::with('fromContact')->where('to', null)->get();


        $datas = [];
        foreach ($messages as $message) {
            $message->date = $message->created_at->diffForHumans();//Carbon::createFromTimeString( $message->created_at)->diffForHumans();
            $message->fromContact->load('Profile');
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
}
