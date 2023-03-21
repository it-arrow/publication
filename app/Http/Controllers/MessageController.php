<?php

namespace App\Http\Controllers;

use App\Models\Callback;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class MessageController extends Controller
{
    public function index(Request $request)
    {
        
        $messages=Message::latest()->get();
        
        
        return view('admin.message.index',compact('messages'));
    }

    public function show($id)
    {
        $message = Message::findOrFail($id);
        return view('admin.message.show',compact('message'));
    }

    public function delete($id)
    {
        $message = Message::findOrFail($id);
        $message->delete();
        return back()->with('message','Message deleted successfully');
    }

    public function callbacks(Request $request)
    {
        $messages=Callback::latest()->get();
        return view('admin.message.callbacks',compact('messages'));
    }
    public function callbacks_show(Request $request,$id)
    {
        $message=Callback::find($id);
        return view('admin.message.show_callback',compact('message'));
    }
    public function callback_delete($id)
    {
        $message = Callback::findOrFail($id);
        $message->delete();
        return back()->with('message','Deleted successfully');
    }
}
