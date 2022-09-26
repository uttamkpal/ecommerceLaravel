<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $category = category::all();
        return view('admin.category.show', ['category'=> $category]);
    }
    public function create(){
        return view('admin.category.create');
    }
    public function store(Request $req){
        $req->validate([
            'name' => 'required',
        ]);
        $category = new category();
        $category->name = $req->name ;
        $category->save();
        return redirect('admin/category');
    }
    public function delete($id){
        $category = category::find($id);
        $category->delete();
        return redirect()->back();
    }
    public function edit($id){
        $category = category::find($id);
        return view('admin.category.edit', ['category'=>$category]);
    }
    public function update(Request $req, $id){
        $req->validate([
            'name' => 'required',
        ]);
        $category = category::find($id);
        $category->name = $req->name;
        $category->save();
        return redirect('admin/category');
    }
}
