<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Mail;
use App\Mail\QRLink;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index() 
    {
        return view('welcome');
    }
    
    public function send()
    {
        request()->validate(['email' => 'required|email']);

        Mail::to(request('email'))->send(new QRLink(request('link')));
        return redirect()->back();
    }
}
