<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    public function dashboard()
    {

        $products = Product::all();
        $carts = DB::table("carts")->where('user_id', '=', auth()->user()->id)->get();
        $favorites = DB::table("favorites")->where('user_id', '=', auth()->user()->id)->get();
        $users = User::all();
        return view('home.dashboard', ['products' => $products, 'carts' => $carts, 'users' => $users, 'favorites' => $favorites]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        if ($request->hasFile('file')) {
            $request->validate([
                'image' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
            ]);
            $request->file->store('product', 'public');
            $product = new Product([
                'name' => $request->name,
                'description' => $request->description,
                'image' => $request->image,
                'price' => $request->price,
                'stock' => $request->stock
            ]);
            $product->save();
        }
        $products = Product::all();
        return view('home.dashboard', ['products' => $products]);
    }

    public function edit($id)
    {
        $users = User::find($id);
        $favorites = DB::table("favorites")->where('user_id', '=', auth()->user()->id)->get();
        $carts = DB::table("carts")->where('user_id', '=', auth()->user()->id)->get();
        return view('home.edit_user', compact('users', 'carts', 'favorites'));
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('dashboard')->with('success', 'User delete successfully');
    }

    public function update(Request $request, $id)
    {


        $user = User::find($id);

        $user->name = $request->input('name');
        $user->role = $request->input('role');
        $user->email = $request->input('email');
        $user->password = $request->input('password');

        $user->update();
        return redirect()->route('dashboard')->with('success', 'User updated successfully');
    }
}