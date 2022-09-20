<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;

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

    public function item()
    {
        $products = DB::select('select * from products where id = 5');
        $carts = Cart::all();
        return view('item', compact('products', 'carts'));
    }

    public function cart()
    {
        $carts = DB::select('select * from carts');
        return view('cart', ['carts' => $carts]);
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
        $product = Product::findOrFail($id);
        $cart = Cart::where('name', '=', $product->name)->first();
        DB::transaction(function () use ($product, $cart) {
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
    }
}