<?php

namespace Bjora\Http\Controllers;

use Bjora\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'message_detail'=>'required',
        ]);

        $message = new Message();
        $message->sender_id = Auth::id();
        $message->recipient_id = $request->id;
        $message->message_detail = $request->message_detail;
        $message->save();

        return redirect()->route('show_user', $request->id)->with('status', 'Your message have been sent.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Bjora\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message, $id)
    {
        $messages = Message::where('recipient_id', $id)->paginate(10);
        return view('message/inbox', compact('messages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Bjora\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Bjora\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Bjora\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Message::destroy($id);
        return redirect()->route('inbox', Auth::id());
    }
}
