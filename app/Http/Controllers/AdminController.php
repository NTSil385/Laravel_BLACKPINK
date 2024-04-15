<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Category;
use App\Models\order_product;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;

class AdminController extends Controller
{
    public function adminHome()
    {
        return view('home',["msg"=>"Hello! I am admin"]);
    }


    //Category 
    public function createCategory(){
        return view('dasboard.cate');
    }

    public function storeCategory(Request $request){
        $request->validate([
            'category_name' => 'required|string|max:255',
        ]);

        $category = new Category();
        $category->category_name = $request->category_name;
        $category->save();

        return redirect()->back()->with('status', 'Category created successfully.');
    }

    //Product 
    public function showProduct(){
            $products = Product::all();
            $categories = Category::all();
            return view('dasboard.showproduct', compact('products', 'categories')); 
    }

    public function createProduct(){
        $categories = Category::all();
        return view('dasboard.product', compact('categories'));
    }

    public function storeProduct(Request $request){
        $product = new Product;
        $product->name = $request->input('name');
        $product->category_id = $request->input('category_id');
        $product->price = $request->input('price');
        $product->discount = $request->input('discount');
        if($request->hasFile('thumbnail_url')){
            $file = $request->file('thumbnail_url');
            $extension = $file->getClientOriginalExtension(); //Lấy tên mở rộng 
            $filename = time().'.'.$extension;
            $file->move('uploads/products/', $filename); //Upload vào thư mục theo path truyền vào
            $product->thumbnail_url = $filename;
        }
        $product->description = $request->input('description');
        $product->deleted = $request->input('deleted');
        $product->save();
        return redirect()->back()->with('status','Update Successfully');
    }

    //Edit Product
    public function editProduct($id){
        $products = Product::find($id);
        $categories = Category::all();
        return view('dasboard.editproduct', compact('products', 'categories'));
    }

    public function updateProduct(Request $request, $id){
        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->category_id = $request->input('category_id');
        $product->price = $request->input('price');
        $product->discount = $request->input('discount');
        if($request->hasFile('thumbnail_url')){
            //Nếu đã select file cũ - > Xóa
            $firstAvt = 'uploads/products/'.$product->thumbnail_url;
            if(File::exists($firstAvt)){
                File::delete($firstAvt);
            }
            $file = $request->file('thumbnail_url');
            $extension = $file->getClientOriginalExtension(); //Lấy tên mở rộng 
            $filename = time().'.'.$extension;
            $file->move('uploads/products/', $filename); //Upload vào thư mục theo path truyền vào
            $product->thumbnail_url = $filename;
        }
        $product->description = $request->input('description');
        $product->deleted = $request->input('deleted');
        $product->save();
        return redirect()->back()->with('status','Update Successfully');
    }

    //Delete Product
    public function deleteProduct($id){
        $products = Product::find($id);
        $thumbnail_url = 'uploads/products/'.$products->thumbnail_url;
        if(File::exists($thumbnail_url)){
            File::delete($thumbnail_url);
        }
        $products->delete();
        return redirect()->back()->with('status','Delete Successfully');
    }

    //Show Users
    public function showUsers(){
        $accounts = User::where('role', 0)->get();
        return view('dasboard.manage', compact('accounts')); 
    }

    public function editUsers($id){
        $accounts = User::find($id);
        return view('dasboard.edituser', compact('accounts'));
    }

    public function updateUsers(Request $request, $id){
        $accounts = User::find($id);
        $accounts->name = $request->input('name');
        $accounts->email = $request->input('email');
        $accounts->save();
        return redirect()->back()->with('status','Update Successfully');
    }

        //Delete Users
        public function deleteUsers($id){
            $acounts = User::find($id);
            $acounts->delete();
            return redirect()->back()->with('status','Delete Successfully');
        }


    //Bill 
        public function showBill(){
            $bills = Order::all();
            $users = User::all();
            return view('dasboard.showbill', compact('bills','users'));
        }

        
        public function showOrderDetails($orderId) {
            $order = Order::findOrFail($orderId);

            // Lấy các mặt hàng trong đơn hàng
            $orderProducts = $order->products;
        
            
            // Trả về view với dữ liệu đơn hàng và các mặt hàng
            return view('dasboard.orderdetails', compact('order', 'orderProducts'));
        }

        public function deleteBill($id){
            $bill = Order::find($id);
            $bill->delete();
            return redirect()->back()->with('status','Delete Successfully');
        }
  
}
