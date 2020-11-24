<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function test()
    {
        return \view('test');
    }
    public function index()
    {
        return view('charts');
    }
    public function fetchMessage()
    {
        return Message::with('user')->get();
    }
    public function sendmessage(Request $request)
    {
        $message = auth()->user()->messages()->create([
            'message' => $request->message,
        ]);
        broadcast(new MessageSent($message->load('user')))->toOthers();
        return ['status' => 'success'];

    }
}
