<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    function listproduct() {
        return view('product');
    }

    function addproduct() {
        return view('fitur.tambahproduk');
    }
}
