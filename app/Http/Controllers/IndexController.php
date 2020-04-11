<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use HG\Crud\src\Models\Matrix;

class IndexController extends Controller
{
    public function products()
    {
        return view('products');
    }

    public function matrix()
    {
    	$matrix = Matrix::orderBy('created_at', 'desc')->paginate(20);
        return view('matrix', compact('matrix'));
    }
}
