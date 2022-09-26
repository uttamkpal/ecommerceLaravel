<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $product = product::latest()->get();
        return view('admin.product.index', ['products' => $product]);
    } 
    public function create(){
        $category = category::all();
        return view('admin.product.create', ['category'=>$category]);
    } 

    public function store(Request $req){
        $req->validate([
            'title' => 'required',
            'description' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'category_id' => 'required',
        ]);
        $product = new product();
        $product->title = $req->title;
        $product->description = $req->description;
        $product->quantity = $req->quantity;
        $product->price = $req->price;
        $product->mrp = $req->mrp;
        $product->category_id = $req->category_id;

        $image = $req->image;
        $imageName = time().'.'. $image->getClientOriginalExtension();
        $req->image->move('user/img/product', $imageName);

        $product->image = $imageName;
        $product->save();
        return redirect('admin/product');
    }

    public function delete($id){
        $product = product::find($id);
        $product->delete();
        return redirect()->back();
    }

    public function edit($id){
        $product = product::find($id);
        $category = category::all();
        return view('admin.product.edit', ['product'=>$product, 'category'=> $category]);
    }
    public function update(Request $req, $id){
        $req->validate([
            'title' => 'required',
            'description' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'category_id' => 'required',
        ]);
        $product = product::find($id);
        $product->title = $req->title;
        $product->description = $req->description;
        $product->quantity = $req->quantity;
        $product->price = $req->price;
        $product->mrp = $req->mrp;
        $product->category_id = $req->category_id;

        if($req->image != null){
        $image = $req->image;
        $imageName = time().'.'. $image->getClientOriginalExtension();
        $req->image->move('user/img/product', $imageName);
        $product->image = $imageName;
        }
        

        
        $product->save();
        return redirect('admin/product');
    }
}
