<?php

namespace App\Http\Controllers;

use App\Message;
use App\Notifications\MessageSent;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home', [
            'users' => User::where('id', '!=', auth()->user()->id)->get()
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'body' => 'required',
            'recipient_id' => 'required|exists:users,id'
        ]);

        $message = Message::create([
            'sender_id' => auth()->user()->id,
            'recipient_id' => $request->recipient_id,
            'body' => $request->body
        ]);

        $recipient = User::find($request->recipient_id);

        $recipient->notify(new MessageSent($message));

        return back()->with('flash', 'Tu mensaje fué enviado');
    }

    public function show($id)
    {
        return view('messages.show', [
            'message' => Message::findOrFail($id)
        ]);
    }
}
