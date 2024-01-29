<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product;
use Inertia\Inertia;
use DB;

class productController extends Controller
{
    public function getProducts(){
        $data=product::all();
        return Inertia::render('products',[
            'products'=>$data
        ]);
    }
    public function productPost(Request $request){
        $request->validate([
            'product_type'=>'required',
            'product_name'=>'required',
            'product_desc'=>'required',
            'price'=>'required',
        ]);
        product::updateOrCreate(['id'=>$request->id],[
            'product_type'=>$request->product_type,
            'product_name'=>$request->product_name,
            'product_desc'=>$request->product_desc,
            'price'=>$request->price,
        ]);
    }
    public function productPict(Request $request){
        $request->validate([
            'picture'=>'required'
        ]);
        $picture=$request->file('picture')->store('products','public');
        if($request->id){
            $upload=product::find($request->id);
            $upload->update([
                'picture'=>$picture
            ]);
        }
        return back();
    }
    public function productEdit($id){
        $data=product::where('id',$id)->first();
        return response()->json($data);
    }
    public function productDelProduct($id){
        if($id){
            $hapus=product::find($id);
            $hapus->delete();
        }
        return back();
    }

}
