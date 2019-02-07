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
        $validated = $request->validated();

        $message = new \App\Message($validated);
        $message->save();

        return redirect('success');

    }

    public function success(Request $request)
    {
        return view('success')
            ->with('result', 'success');
    }
}
