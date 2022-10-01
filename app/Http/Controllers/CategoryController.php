<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Cart;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function create()
    {
        $categories = Category::all();
        $carts = Cart::all();

        return view('home.create', compact('categories', 'carts'));
    }
}