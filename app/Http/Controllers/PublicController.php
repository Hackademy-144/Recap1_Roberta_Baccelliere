<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PhpParser\Node\Stmt\TryCatch;

class PublicController extends Controller
{

    public function home()
    {
        return view('welcome');
    }

    public function contact()
    {
        return view('contact');
    }

    public function submit(Request $request)
    {
        $email = $request->input('email');
        $name = $request->input('name');
        $body = $request->input('body');

        $content = compact('email', 'name', 'body');

        try {
            Mail::to('robby.bacc@gmail.com')->send(new ContactMail($content));
        } catch (\Exception $e) {
            return redirect(route('home'))->with('ErrorMessage', 'Email non inviata, riprova più tardi');
        }

        return redirect(route('home'))->with('message', 'Email inviata con successo!');
    }
}
