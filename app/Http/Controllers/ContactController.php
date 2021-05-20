<?php

namespace App\Http\Controllers;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        return view('contact');
    }
    public function sendMail(Request $request){
        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'msg' => $request->msg,
        ];
        Mail::to($request->email)->send(new ContactMail($details));
        return back()->with('message','Your message has been sent successfully');
    }
}
