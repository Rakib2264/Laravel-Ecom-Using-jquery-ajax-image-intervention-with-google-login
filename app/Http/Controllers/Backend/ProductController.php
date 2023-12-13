<?php

namespace App\Http\Controllers\Backend;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return view('backend.pages.product.add');
    }

    public function insert(Request $request){

       $product = new Product();
       $product->name = $request->name;
       $product->des = $request->des;
       $product->price = $request->price;
       $product->quantity = $request->qnt;
       $product->status = $request->status;
       $product->save();
       return redirect()->route('showproduct');
    }

    public function show(){
        $products = Product::all();
        return view('backend.pages.product.manage',compact('products'));
    }

    public function active($id){
        $product = Product::find($id);
        $product->status = '2';
        $product->update();
        return back();
    }
    public function inactive($id){
        $product = Product::find($id);
        $product->status = '1';
        $product->update();
        return back();
    }
    public function delete($id){
        $product = Product::find($id);
        $product->delete();
        return back();
    }

    public function edit($id){
        $product = Product::find($id);
        return view('backend.pages.product.edit',compact('product'));

    }


    public function update(Request $request , $id){
        $product = Product::find($id);
        $product->name = $request->name;
        $product->des = $request->des;
        $product->price = $request->price;
        $product->quantity = $request->qnt;
        $product->status = $request->status;
        $product->update();
        return redirect()->route('showproduct');

    }

}
