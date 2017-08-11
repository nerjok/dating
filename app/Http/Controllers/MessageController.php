<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

use App\User;

class MessageController extends Controller
{
 public function __construct()
    {
        $this->middleware('auth');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($receiver)
    {
        return view('messages.send', compact('receiver'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(User $user, Request $request, Message $message, $receiver = null)
    {
              if ($user->blocked):
                    if (array_search(\Auth::user()->id, unserialize($user->blocked))!== false) return redirect()->home();
            endif;
                 $this->validate($request, [
                 
                   'sender' => 'required|integer',
            
                    'receiver' => 'required|integer',

                    'message' => 'required|string|max:700',
                ]);


        $message->message = $request->input('message');

        $message->user_id = $user->id;

        $message->sender_id = $request->input('sender');

        $message->save();


       //$message-

        return redirect()->back();
    }

    /**
     * Show all received messsaged ordered by sender
     *
     */
    public function messages()
    {
            $messages = Message::select('sender_id')->where('user_id', '=', \Auth::user()->id)->groupBy('sender_id')->get();


          //  $messages = Message::select(\DB::raw('DISTINCT sender_id as sender_id'), 'user_id', 'message')->where('user_id', '=', \Auth::user()->id)->get();


       return view('messages.talkings', compact('messages'));
    }



    /**
     * @param sender
     *
     * @return mesages between two users
     */
     public function showMesagging($sender)
     {
        $messages = Message::whereIn('user_id',  [\Auth::user()->id, $sender])
                                    ->whereIn('sender_id',  [\Auth::user()->id, $sender])
                                    ->orderBy('created_at', 'desc')
                                    ->paginate(25);


        return view('messages.messagging', compact('messages', 'sender'));

     }

}
