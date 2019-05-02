<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Mail;
class PagesController extends Controller
{
    public function getHome(){
        $posts= Post::limit(5)->orderBy('id','desc')->get();
       return view ('Pages.welcome')->with('posts',$posts);
    }
    public function getAbout(){
        $first ="Mostafa";
        $last="Hassan";
        $name= $first . " ". $last;
        return view('Pages.about')->with("fullName",$name);
    }
    public function getContact(){
        return view('Pages.contact');
    }
    public function postContact(Request $request){
        $this->validate($request,[
            'email'=>'required|email',
            'message'=> 'min:10',
            'subject'=>'min:3'
            ]);
                $data =array(
                    'email'=> $request->email,
                    'subject'=>$request->subject,
                    'bodyMessage'=>$request->message
                );
            Mail::send('emails.contact',$data,function($message) use ($data){
                $message->from($data['email']);
                $message->to('eragon_tefa@live.com');
                $message->subject($data['subject']);
            });

            session()->flash('success', 'Email was Sent');
            return redirect()->url('/');

    }
    
}
