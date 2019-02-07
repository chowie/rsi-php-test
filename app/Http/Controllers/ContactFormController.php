<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactFormController extends Controller
{
    public function show()
    {
        return view('contact');
    }

    public function save(Request $request)
    {
        dd($request->all());
    }
}
