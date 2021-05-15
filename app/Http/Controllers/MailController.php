<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    //
    public function sendEmail(){
        $details = [
            'title' => 'Mail from The Fire and Incident Management System',
            'body' => 'This is to say a very warm welcome, to you.'
        ];

        Mail::to('dandamnannim125@gmail.com')->send(new WelcomeUser($details));
        return 'Email Sent';
    }
}
