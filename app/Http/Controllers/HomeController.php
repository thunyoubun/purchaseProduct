<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }

    public function myaccount()
    {
        $users = Auth::user();
        $carts = DB::table("carts")->where('user_id', '=', auth()->user()->id)->get();
        return view('home.myaccount', compact('users', 'carts'));
    }
}