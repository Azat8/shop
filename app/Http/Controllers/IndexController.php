<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function products()
    {
        return view('products');
    }

    public function matrix()
    {
        return view('matrix');
    }
}
