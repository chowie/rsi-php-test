<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactFormSubmission;


class ContactFormController extends Controller
{
    public function show()
    {
        return view('contact');
    }

    public function save(ContactFormSubmission $request)
    {
        dd($request->all());
    }
}
