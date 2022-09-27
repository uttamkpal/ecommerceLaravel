<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Site;
use App\Models\product;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $products = product::latest()->get();
        $categories = category::all();
        $site = Site::all()->first();
        $carts = Cart::where('user_id', Auth::id())->count();
        
        
        return view('home', ['site' => $site , 'products'=> $products, 'categories'=> $categories, 'carts'=>$carts]);
    }
    public function product_details($id){
        $site = Site::all()->first();
        $product = product::find($id);
        $products = product::where('category_id', '=', $product->category_id)->get();
        $carts = Cart::where('user_id', Auth::id())->count();
        return view('product_details', ['site' => $site ,'product'=> $product, 'products'=>$products, 'carts'=>$carts]);
    }
    public function cart(){
        $site = Site::all()->first();
        $carts = Cart::where('user_id', Auth::id())->count();
        $cartdata = Cart::where('user_id', Auth::id())->get();
        return view('cart', ['site' => $site ,'carts'=>$carts, 'cartdata' =>$cartdata]);
    }
    public function add_cart(Request $req, $id){
        $cart = new Cart();
        $cart->user_id = Auth::id();
        $cart->product_id =$id;
        $cart->count = $req->count;
        $cart->save();
        return redirect()->back();
    }
    public function cart_delete($id){
        $cart = Cart::find($id);
        $cart->delete();
        return redirect()->back();
    }
    public function shop(){
        $site = Site::all()->first();
        $products = product::latest()->get();
        $categories = category::all();
        $carts = Cart::where('user_id', Auth::id())->count();
        $cartdata = Cart::where('user_id', Auth::id())->get();

        // foreach($orders as $order){
        //     $order->address = Orderaddress::where('order_id', '=', $order->invoice)->get();
            
        // }
        // dd($orders->address->city);
        // dd($orders);
        return view('shop', ['site' => $site ,'products'=> $products, 'categories'=> $categories, 'carts'=>$carts]);
    }
}
