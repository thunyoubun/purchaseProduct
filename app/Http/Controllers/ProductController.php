<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::all();
        $carts = Cart::all();

        return view('home.index', compact('products', 'carts'));
    }

    public function item($id)
    {
        $products = Product::find($id);
        /*     $products = Product::where('id', '=', $idx->id)->first(); */
        $carts = Cart::all();
        return view('item', compact('products', 'carts'));
    }

    public function cart()
    {
        $carts = DB::select('select * from carts');
        $users = User::all();
        return view('cart', ['carts' => $carts, 'users' => $users]);
    }

    public function remove($id)
    {
        $cart = Cart::findOrFail($id);
        $product = Product::where('name', '=', $cart->name)->first();
        DB::transaction(function () use ($product, $cart) {
            $product->stock = $product->stock + $cart->quantity;
            $product->save();
            $cart->delete();
        });
        return  back()->with('success', 'Product removed successfully');
    }

    public function addToCart($id)
    {
        $users = User::all();
        $product = Product::find($id);
        $cart = Cart::where('name', '=', $product->name)->first();
        DB::transaction(function () use ($product, $cart, $users) {
            if ($cart != null) {
                $cart->quantity = $cart->quantity + 1;
                $cart->save();
            } else {
                $cart = new Cart();
                $cart->name = $product->name;
                $cart->quantity = 1;
                $cart->price = $product->price;
                $cart->image = $product->image;
                $cart->save();
            }
            $product->stock = $product->stock - 1;
            $product->save();
        });
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function addcountCart($id, $count)
    {
        $cart = Cart::findOrFail($id);

        $product = Product::where('name', '=', $cart->name)->first();
        DB::transaction(function () use ($product, $cart, $count) {
            if ($cart != null) {
                $cart->quantity = $cart->quantity + $count;
                $cart->save();
            } else {
                $cart = new Cart();
                $cart->name = $product->name;
                $cart->quantity = 1;
                $cart->price = $product->price;
                $cart->image = $product->image;
                $cart->save();
            }
            $product->stock = $product->stock - $count;
            $product->save();
        });
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function removeToCart($id)
    {
        $cart = Cart::findOrFail($id);
        $product = Product::where('name', '=', $cart->name)->first();
        DB::transaction(function () use ($product, $cart) {
            $product->stock = $product->stock - 1;
            $product->save();
            if ($cart->stock <= 0)
                $cart->delete();
        });
        return  back()->with('success', 'Product removed successfully');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        $carts = Cart::all();
        return view('home.create', compact('products', 'carts'));
    }

    public function store(Request $request)
    {
        $product = new Product;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extenstion;
            $file->move('assets/products', $filename);
            $product->image = 'assets/products/' . $filename;
        }
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->stock = $request->input('stock');
        $product->price = $request->input('price');
        $product->save();
        return redirect()->route('dashboard')->with('status', 'Product Added Successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Product::find($id);
        $carts = Cart::all();
        return view('home.edit', compact('products', 'carts'));
    }

    public function update(Request $request, $id)
    {

        $product = Product::find($id);

        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');

        if ($request->hasFile('image')) {
            $destination = 'assets/products/' . $product->image;
            if (File::exitsts()) {
                File::delete($destination);
            }
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalName();
            $file->move(public_path() . 'assets/products/', $extenstion);
            $product->image = $file;
        }
        $product->save();
        return redirect()->route('dashboard')->with('success', 'Product updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $product = Product::find($id);
        $product->delete();

        return redirect()->route('dashboard')->with('success', 'Product deleted successfully');
    }
}