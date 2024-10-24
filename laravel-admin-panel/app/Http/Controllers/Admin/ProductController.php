<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
       $products=Product::orderBy('created_at','desc')->paginate(15);

       return view( 'admin.products.index',compact('products'));
    }
    public function create(){
        return view('admin.products.create');

    }
    public function store(Request $request){
        $data=$request->all();
        $data['is_featured']=$request->boolean('is_featured');
        $data['is_published']=$request->boolean('is_published');
        Product::create($data);

        return redirect()->back()->with('success','Ürün Başarıyla Eklendi');

    }
    public function edit($id){
        $product=Product::findOrFail($id);
        return view('admin.products.edit',compact('product'));
    }
    public function update(Request $request,$id){
        $data=$request->all();
        $data['is_featured']=$request->boolean('is_featured');
        $data['is_published']=$request->boolean('is_published');
        Product::findOrFail($id)->update($data);
        return redirect()->back()->with('success','Ürün Başarıyla Güncellendi');
    }
    public function destroy($id){
            Product::find($id)->delete();
            return redirect()->back()->with('success','Ürün Başarıyla Silindi');
    }
}
