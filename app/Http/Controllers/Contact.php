<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mail;

class Contact extends Controller
{
    public function index(){
        return view('contactus');
    }
    public function mail(Request $request){
        $this-> validate($request, [
            'email' => 'required|email',
            'name' => 'required|min:3',
            'phone' => 'required|regex:/[0-9]/|min:10|max:10',
            'message' => 'required|min:1'
        ]);
        $data = array(
            'email' => $request->email,
            'name' => $request->name,
            'phone' => $request->phone,
            'bodymessage' => $request->message
        ); 
        $check=true;
        if($check==true){
            Mail::send('email.contact', $data, function($message)use ($data){
                $message->from($data['email']);
                $message->to('cms.adit@gmail.com');
                
            });
        $message="Your Message was successfully sent";
        $status="success";
        }
        else{
        $check=false;
        $message="Error while sending your Message.";
        $status="error";
        }
        return redirect('/contactus')->with($status,$message);
        
        
       
    }
}
