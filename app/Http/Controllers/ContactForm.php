<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use Mail;
use Illuminate\Http\Request;

class ContactForm extends Controller
{
    private $fullName;
    private $email;
    private $phone;
    private $message;

    public function __construct(Request $request){
        $this->fullName = $request->fullName;
        $this->email = $request->email;
        $this->phone = $request->phone;
        $this->message = $request->message;
    }

    public function sendMail(){
      $data = array(
        'fullName' => $this->fullName,
        'email' => $this->email,
        'phone' => $this->phone,
        'message' => $this->message 
       );

       Mail::to( config('mail.from.address') )
          ->send( new SendMail($data) );
    }
}