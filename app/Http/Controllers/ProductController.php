<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Symfony\Component\Console\Input\Input;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $products = Product::all();
        if (Auth::check()) {
            $carts = DB::table("carts")->where('user_id', '=', auth()->user()->id)->get();
            $favorites = DB::table("favorites")->where('user_id', '=', auth()->user()->id)->get();
            return view('home.index', compact('products', 'carts', 'favorites'));
        } else {
            return view('home.index', compact('products'));
        }
    }


    public function all(Request $request)
    {

        $products = Product::all();
        $categories = Category::all();


        if (Auth::check()) {
            $carts = DB::table("carts")->where('user_id', '=', auth()->user()->id)->get();
            $favorites = DB::table("favorites")->where('user_id', '=', auth()->user()->id)->get();
            return view('home.product', compact('products', 'carts', 'categories', 'favorites'));
        } else {
            return view('home.product', compact('products', 'categories'));
        }
    }

    public function filterProduct(Request $request)
    {
        $categories = Category::all();
        $query = Product::query();
        $carts = DB::table("carts")->where('user_id', '=', auth()->user()->id)->get();
        if ($request->ajax()) {
            if (empty($request->category)) {
                $products = $query->get();
            } else {
                $products = $query->where('ProductCategoryID', $request->category)->get();
            }
            return response()->json(['products' => $products]);
        }
        $products = $query->get();
        return view('home.product', compact('categories', 'products', 'carts'));
    }



    public function product($category)
    {
        $categories = Category::where('name', $category)->first();
        if ($categories) {
            $products = $categories->product()->get();
            return view('home.product', compact('products', 'categories'));
        } else {
            return redirect()->back();
        }
    }
    public function favorite()
    {
        $carts = DB::table("carts")->where('user_id', '=', auth()->user()->id)->get();
        $products = DB::table("favorites")->where('user_id', '=', auth()->user()->id)->get();
        $favorites = DB::table("favorites")->where('user_id', '=', auth()->user()->id)->get();

        $users = User::all();
        return view('home.favorite', ['carts' => $carts, 'favorites' => $favorites, 'products' => $products]);
    }


    public function item($id)
    {
        $products = Product::find($id);
        /*     $products = Product::where('id', '=', $idx->id)->first(); */
        if (Auth::check()) {
            $carts = DB::table("carts")->where('user_id', '=', auth()->user()->id)->get();
            $favorites = DB::table("favorites")->where('user_id', '=', auth()->user()->id)->get();
            return view('item', compact('products', 'carts', 'favorites'));
        } else {
            return view('item', compact('products'));
        }
    }

    public function cart()
    {
        $carts = DB::table("carts")->where('user_id', '=', auth()->user()->id)->get();
        $favorites = DB::table("favorites")->where('user_id', '=', auth()->user()->id)->get();
        $users = User::all();
        return view('cart', ['carts' => $carts, 'users' => $users, 'favorites' => $favorites]);
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
    public function removeFav($id)
    {
        $cart = Favorite::findOrFail($id);
        $product = Product::where('name', '=', $cart->name)->first();
        DB::transaction(function () use ($product, $cart) {
            $product->stock = $product->stock + $cart->quantity;
            $product->save();
            $cart->delete();
        });
        return  back()->with('success', 'Favorite removed successfully');
    }

    public function addToCart($id)
    {
        $users = User::find(auth()->user()->id);
        $product = Product::find($id);
        $cart = Cart::where('name', '=', $product->name)->where('user_id', '=', auth()->user()->id)->first();
        DB::transaction(function () use ($product, $cart, $users) {
            if ($cart != null) {
                $cart->quantity = $cart->quantity + 1;
                $cart->save();
            } else {
                $cart = new Cart();
                $cart->user_id = $users->id;
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

    public function addToFav($id)
    {
        $users = User::find(auth()->user()->id);
        $product = Product::find($id);
        $cart = Favorite::where('name', '=', $product->name)->where('user_id', '=', auth()->user()->id)->first();
        DB::transaction(function () use ($product, $cart, $users) {
            if ($cart != null) {
                $cart->quantity =  1;
                $cart->save();
            } else {
                $cart = new Favorite();
                $cart->user_id = $users->id;
                $cart->name = $product->name;
                $cart->quantity = 1;
                $cart->price = $product->price;
                $cart->image = $product->image;
                $cart->save();
            }
            $product->stock = $product->stock - 1;
            $product->save();
        });
        return redirect()->back()->with('success', 'Product added to Favorite successfully!');
    }

    public function addcountCart($id)
    {
        $cart = Cart::findOrFail($id);
        $product = Product::where('name', '=', $cart->name)->first();
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
        return redirect()->back();
    }
    public function removecountCart($id)
    {
        $cart = Cart::findOrFail($id);
        $product = Product::where('name', '=', $cart->name)->first();
        DB::transaction(function () use ($product, $cart) {
            if ($cart != null) {
                $cart->quantity = $cart->quantity - 1;
                if ($cart->quantity <= 0) {
                    return $cart->delete();
                }
                $cart->save();
            } else {
                $cart = new Cart();
                $cart->name = $product->name;
                $cart->quantity = 1;
                $cart->price = $product->price;
                $cart->image = $product->image;
                $cart->save();
            }


            $product->stock = $product->stock + 1;
            $product->save();
        });
        return redirect()->back();
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
        $carts = DB::table("carts")->where('user_id', '=', auth()->user()->id)->get();
        $favorites = DB::table("favorites")->where('user_id', '=', auth()->user()->id)->get();
        return view('home.create', compact('products', 'carts', 'favorites'));
    }

    public function store(Request $request)
    {
        $product = new Product;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = $file->getClientOriginalName() . '.' . $extenstion;
            $file->move('assets/products', $filename);
            $product->image =  $filename;
        }
        $product->name = $request->input('name');
        $product->title = $request->input('title');
        $product->ProductCategoryID = $request->input('category');
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
        $carts = DB::table("carts")->where('user_id', '=', auth()->user()->id)->get();
        $favorites = DB::table("favorites")->where('user_id', '=', auth()->user()->id)->get();
        return view('home.edit', compact('products', 'carts', 'favorites'));
    }

    public function update(Request $request, $id)
    {

        $product = Product::find($id);

        $product->name = $request->input('name');
        $product->title = $request->input('title');
        $product->ProductCategoryID = $request->get('category');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');

        if ($request->hasFile('image')) {
            $destination = 'assets/products/' . $product->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extenstion;
            $file->move('assets/products/', $fileName);
            $product->image = $fileName;
        }
        $product->update();
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
        $destination = 'assets/products/' . $product->image;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $product->delete();
        return redirect()->route('dashboard')->with('success', 'Product deleted successfully');
    }

    public function productList()
    {
        $products = Product::select('name')->get();
        $data = [];

        foreach ($products as $product) {
            $data[] = $product['name'];
        }

        return $data;
    }

    public function searchProduct(Request $request)
    {
        $searched_product = $request->product_name;

        if ($searched_product != "") {
            $product = Product::where("name", "LIKE", "%$searched_product%")->first();
            if ($product) {
                return redirect('item/' . $product->id);
            } else {
                return redirect()->back()->with('fail', "Product's name not found!");
            }
        } else {
            return redirect()->back();
        }
    }
}