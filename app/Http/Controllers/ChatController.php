<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function fetchMessages(Request $request) {
        $userId = session('LoggedUserInfo');
        $receiverId = $request->query('receiver_id');

        $messages = Chat::where(function ($query) use ($userId, $receiverId) {
            $query->where('sender_id', $userId)
                ->where('receiver_id', $receiverId);
        })->orWhere(function ($query) use ($userId, $receiverId) {
            $query->where('sender_id', $receiverId)
                ->where('receiver_id', $userId);
        })->orderBy('created_at', 'asc')->get();
        return response()->json(['messages' => $messages]);
    }

    public function sendMessage(Request $request) {
        $userId = session('LoggedUserInfo');
        $receiverId = $request->receiver_id;
        $message = $request->message;

        $chat = Chat::create([
            'sender_id' => $userId,
            'receiver_id' => $receiverId,
            'message' => $message,
            'sender_type' => 'user'
        ]);


        return response()->json(['success' => true, 'message' => 'Message sent successfully']);
    }
}
