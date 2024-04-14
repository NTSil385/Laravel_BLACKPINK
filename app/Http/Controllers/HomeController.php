<?php

namespace App\Http\Controllers;

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
        return view('user.product_detail', compact('product'));
    }

}