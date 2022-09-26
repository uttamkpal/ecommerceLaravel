<?php

namespace App\Http\Controllers;

use Session;

use Stripe\Charge;

use Stripe\Stripe;
use App\Models\Cart;
use App\Models\Order;
use App\Models\product;
use App\Models\Orderaddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class OrderController extends Controller
{
    public function index(){
        $cartdata = Cart::where('user_id', Auth::id())->get();
        // dd($cartdata);
        $carts = Cart::where('user_id', Auth::id())->count();
        return view('checkout', ['carts'=> $carts, 'cartdata' => $cartdata]);
    }

    public function stripe(Request $request){
        $password = $request->password;
        if(Hash::check($password, Auth::user()->password)){
            $invoce = time();
            $total = 0;
            $cartdata = Cart::where('user_id', Auth::id())->get();
            $cartdatacount = Cart::where('user_id', Auth::id())->count();
            if($cartdatacount > 1){
                foreach ($cartdata as $data) {
                    $order =new Order();
                    $order->invoice = $invoce;
                    $order->note = $request->note;
                    $order->phone = $request->phone;
                    $order->user_id = Auth::id();
                    $order->product_id = $data->product_id;
                    $order->count = $data->count;
                    $order->status = "Processing";
                    $order->save();
    
                    $product = product::find($data->product_id);
    
                    $total = $total + ($data->count * $product->price);
    
    
                    $cart = Cart::find($data->id);
                    $cart->delete();
                }
            } else{
                // dd($cartdata);
                $order =new Order();
                $order->invoice = $invoce;
                $order->note = $request->note;
                $order->phone = $request->phone;
                $order->user_id = Auth::id();
                $order->product_id = $cartdata[0]->product_id;
                $order->count = $cartdata[0]->count;
                $order->status = "Processing";
                $order->save();

                $product = product::find($cartdata[0]->product_id);

                $total = $total + ($cartdata[0]->count * $product->price);


                $cart = Cart::find($cartdata[0]->id);
                $cart->delete();
            }
            
            $address = new Orderaddress();
            $address->order_id = $invoce;
            $address->state = $request->state;
            $address->zip = $request->zip;
            $address->city = $request->city;
            $address->save();

            Stripe::setApiKey(env('STRIPE_SECRET'));
            Charge::create ([
                "amount" => $total * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => $request->note,
            ]);
            Session::flash('success', 'Payment successful!');
        }else{
            return redirect()->back();
        }
        // dd(Auth::user()->password);
        // dd($request);
        return back();
    }
}
