<?php

namespace App\Http\Controllers;

use App\Mail\TestEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendEmail extends Controller
{
    public function index() {
        Mail::to('kontolodon@gmail.com')->send(new TestEmail());
    }
}
