<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class ContactFormController extends Controller
{
    public function create() {
        return view('contacts.create');
    }

    public function store() {
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        Mail::to('test1@test.com')->send(new ContactFormMail($data));

        return redirect('contact')
        ->with('message', 'Thack for your massage. We\'ll be in touch');
    }
}
