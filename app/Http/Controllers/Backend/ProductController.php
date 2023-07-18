<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Product;
use App\Models\Backend\Category;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Products= product::all();
        return view('backend.product.index',compact('Products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products= Category::all()->pluck('name','id')->toArray();
        return view('backend.product.create',compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'name'=> 'required|unique:products|min:3',

        ]);
       $products = new Product();
      
       if($request->hasFile('image')){
        $file  = $request->file('image');
        $extension =$file->getClientOriginalExtension();
        $fileName= time(). ".". $extension;
        $file->move('assets/backend/product/',$fileName);
        $products->image = $fileName;
       }
        $products->cate_id = $request->input('cate_id');
        $products->name = $request->input('name');
        $products->slug =str::slug($request->name);
        $products->small_description = $request->input('small_descripiton');
        $products->description = $request->input('description');
        $products->orginal_price = $request->input('original_price');
        $products->selling_price = $request->input('selling_price');

        $products->qty = $request->input('qty');
        $products->tax = $request->input('tax');
        $products->status = $request->input('status') == True ? '1':'0';
        $products->trending = $request->input('trending') == True ? '1':'0';

        $products->meta_title = $request->input('meta_title');
        $products->meta_descrip	 = $request->input('meta_descrip');

        $products->meta_keywords = $request->input('meta_keywords');

        $products->save();
        return redirect()->route('p_index')->with('sucess',"Products added Successfully");

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $products = Product::find($id);

        if($products){
            return view('backend.product.show', compact('products'));
            response()->session()->flash('success',"Product found");
        }else{
            response()->session()->flash('error', "Product not found");
            return redirect()->route('p_index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $products = Product::find($id);
        return view('backend.product.edit',compact('products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      
        
        $products = Product::find($id);
   

        if($request->hasFile('image')){
            $path = 'assets/backend/product/'. $products->image;

            if(File::exists($path)){
                File::delete($path);
            }
            $file  = $request->file('image');
            $extension =$file->getClientOriginalExtension();
            $fileName= time(). ".". $extension;
            $file->move('assets/backend/product/',$fileName);
            $products->image = $fileName;
           }
            $products->cate_id = $request->input('category_id');
            $products->name = $request->input('name');
            $products->slug = str::slug($request->name);
            $products->small_description = $request->input('small_descripiton');
            $products->description = $request->input('description');
            $products->orginal_price = $request->input('original_price');
            $products->selling_price = $request->input('selling_price');
    
            $products->qty = $request->input('qty');
            $products->tax = $request->input('tax');
            $products->status = $request->input('status') == True ? '1':'0';
            $products->trending = $request->input('trending') == True ? '1':'0';
    
            $products->meta_title = $request->input('meta_title');
            $products->meta_descrip	 = $request->input('meta_descrip');
    
            $products->meta_keywords = $request->input('meta_keywords');

        
    
            $products->update();

            return redirect()->route('p_index')->with('success',"Product Update successfully");


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $products = Product::find($id);

        $products->delete();
        return redirect()->route('p_index')->with('success',"Product deleted successfully");
    }
}
