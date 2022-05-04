<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Http\Controllers\Controller;

class PosController extends Controller
{
    public function index(){

        $products = Product::all();

        return view('admin.pos.index', compact('products'));
    }
}
