<?php

namespace FirstPackage\Contact\Http\Controllers;

use App\Http\Controllers\Controller;
use FirstPackage\Contact\Mail\ContactMailable;
use FirstPackage\Contact\Http\Requests\CreateContactRequest;
use FirstPackage\Contact\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index() {
        return view('contact::index');
    }

    public function send(CreateContactRequest $request) {
        $contact = Contact::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'message' => $request->input('message')
        ]);
        Mail::to(config('contact.send_email_to'))->send(new ContactMailable($contact));

        return redirect()->back();
    }
}
