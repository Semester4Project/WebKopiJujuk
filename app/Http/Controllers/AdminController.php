<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index() {
        return view('layout.admin');
    }

    function customer() {
        return view('layout.user');
    }
}