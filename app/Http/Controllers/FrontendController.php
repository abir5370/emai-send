<?php

namespace App\Http\Controllers;

use App\Mail\email;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FrontendController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function send(Request $request){
        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];
        // Send email using Laravel Mail
        Mail::to($request->email)->send(new email($data));
        return back()->with('message', 'Message sent successfully!');
    }
}
