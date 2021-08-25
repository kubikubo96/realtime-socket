<?php

namespace App\Http\Controllers;

use App\Events\RedisEvent;
use App\Models\Message;
use Illuminate\Http\Request;

class RedisController extends Controller
{
    public function index()
    {
        $messages = Message::all();
        return view('messages', ['messages' => $messages]);
    }

    public function sendMessage(Request $request)
    {
        $messages = Message::create($request->all());

        //tạo event lắng nghe sự kiện khi người dùng gửi tin nhắn tới
        event(
            $e = new RedisEvent($messages)
        );
        return redirect()->back();
    }
}
