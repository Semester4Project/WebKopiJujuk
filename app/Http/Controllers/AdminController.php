<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index() {
        return view('dashboard');
    }

    function customer() {
        return view('layout.user');
    }
}