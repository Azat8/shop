<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Matrix;

class IndexController extends Controller
{
    public function products()
    {
        return view('products');
    }

    public function matrix()
    {
    	$matrix = Matrix::orderBy('created_at', 'desc')->paginate(5);
        
        return view('matrix', compact('matrix'));
    }
}
