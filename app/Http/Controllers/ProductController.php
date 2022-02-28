<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductModel;

class ProductController extends Controller
{
    public function index()
    {
        return view('product.index');
    }

    public function addform()
    {
        return view('product.addproduct');
    }

    public function store(Request $request)
    {
        
       // image validation //
       $request->validate([
        'title' => 'required|max:255',
        'details' => 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
    ]);

    $imageName = '';
    if($request->image){
    $imageName= time().'.'.$request->file('image')->getClientOriginalExtension();
    $request->image->move(public_path('uploads'),$imageName);
    }

        

    // data store to database //

     $data = new ProductModel;


    $data->title = $request->title;
    $data->details = $request->details;
    $data->image =$imageName;
    $data->save();

    return back()->with('status','Movies has been added succesfully');
    }
}
