<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{

    public function create()
    {
        return view('contact.create');
    }

    public function store()
    {
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        //  use the redirect()->with() dynamically by catching an exception and storing it in the session flash
        try {
            Mail::to('test@test.com')->send(new ContactFormMail($data));
            session()->flash('contact-success', ['type'=>'success', 'content'=>'Contact email was sent']);
        } catch (\Throwable $e) {
            session()->flash('contact-error', ['type'=>'danger', 'content'=>'<strong>Error C-ContactForm-0029: </strong>' .$e->getMessage()]);
        }

        return redirect('contact');
    }
}
