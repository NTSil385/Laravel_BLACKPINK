<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function userHome()
    // {
    //     return view('user.homepage',["msg"=>"Hello! I am user"]);
    // }


    
    public function showLanding(){
        $products = Product::where('category_id', 1)->get();
        return view('user.homepage', compact('products')); 
    }

    public function showAllProducts(){
        $products = Product::all();
        return view('user.shopping', compact('products'));
    }

    public function showProductDetail($id) {
        $product = Product::find($id);
        $categories = Category::all();
        return view('user.productdetails', compact('product', 'categories'));
    }

    //Cart 
    public function cart() {
        return view('user.cart');
    }
    public function addToCart($id) {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        if(isset($cart[$id])){
            $cart[$id]['quantity']++;
        }else {
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'image' => $product->thumbnail_url
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('status','Add to Cart Successfully');
    }
    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart successfully updated!');
        }
    }
    public function remove(Request $request){
        if($request->id){
            $cart = session()->get('cart', []);
            if(isset($cart[$request->id])){
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('status','Remove Successfully');
        }
    }
}