<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactFormRequest;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contact()
    {
        return view('contact.index');
    }

    public function confirm(ContactFormRequest $request)
    {
        $contact = $request->all();
        return view('contact.confirm', compact('contact'));
    }

    public function send(ContactFormRequest $request)
    {
        $contact = $request->all();
        Mail::to(config('key.MAIL'))->send(new ContactMail($contact));
        $request->session()->regenerateToken();
        return view('contact.thanks');
    }
}
