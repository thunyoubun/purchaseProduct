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
        $favorites = DB::table("favorites")->where('user_id', '=', auth()->user()->id)->get();
        $carts = DB::table("carts")->where('user_id', '=', auth()->user()->id)->get();
        return view('home.myaccount', compact('users', 'carts', 'favorites'));
    }

    public function edit($id)
    {

        $users = User::find($id);
        $favorites = DB::table("favorites")->where('user_id', '=', auth()->user()->id)->get();
        $carts = DB::table("carts")->where('user_id', '=', auth()->user()->id)->get();
        return view('home.edit_account', compact('users', 'carts', 'favorites'));
    }

    public function update(Request $request)
    {

        $auth = Auth::id();
        $user = User::find($auth);

        $user->name = $request->input('name');
        $user->phone = $request->input('phone');
        $user->email = $request->input('email');
        $user->address = $request->input('address');
        $user->password = $request->input('password');

        $user->update();
        return redirect()->route('myaccount')->with('success', 'Account updated successfully');
    }
}