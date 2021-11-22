<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Mail\ContactFormMailable;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $messages = Message::get();
        return view('admin.messages')->with('messages',$messages);
    }
    public function deletemessage($id){
        $message = Message::find($id);
        $message->delete();
        return redirect('/messages')->with('status','The message has been deleted successfully');
    }
    public function contact(Request $request){
        $this->validate($request,['name'=>'required','email'=>'required|email','message'=>'required']);
        $contact = [
            'name' => $request->name,
            'email'=>$request->email,
            'subject'=>$request->subject,
            'message'=>$request->message,
        ];
        $message = new Message();
        $message->name = $request->input('name');
        $message->subject = $request->input('subject');
        $message->email = $request->input('email');
        $message->message = $request->input('message');
        $message->save();
        Mail::to('oumarfilston@gmail.com')->send(new ContactFormMailable($contact));
       
        return redirect('/')->with('status','Thank you for your message');       
    }
}
