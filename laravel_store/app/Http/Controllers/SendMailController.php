<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\TheEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendMailController extends Controller
{
    public function sendMail(ContactRequest $user)
    {
        Mail::to($user->adv_email)->send(new TheEmail($user));
        return back();
    }
}
