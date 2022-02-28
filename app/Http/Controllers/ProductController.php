<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\ProductModel;

class ProductController extends Controller
{
    public function index()
    {
        $i=1;
        
        $product = ProductModel::latest()->paginate(4);
        return view('product.index',compact('product','i'))->with('i',(request()->input('page',1)-1)*4);
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

    return back()->with('status','Product has been added succesfully');
    }


    public function show($id)
    {
        $post = ProductModel::where('id',$id)->first();
        return view('product.show',compact('post'));
    }

    public function edit($id)
    {
        
        $editPost = ProductModel::find($id);
        return view('product.edit',compact('editPost'));

    }


    public function update(Request $request ,$id)
    {
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
        
            // data update to database //
            $data = ProductModel::find($id);
            $data->title = $request->title;
            $data->details = $request->details;
            $data->image =$imageName;
            $data->save();
        
            return back()->with('status','Product has been Update succesfully');
    }

    public function delete($id)
    {
        ProductModel::where('id',$id)->delete();
        return back()->with('delete','Product has been delete succesfully');
    }
}
