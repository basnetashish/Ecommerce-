<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('backend.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $categories = new Category();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time().'.'.$extension;
            $file->move('assets/category/', $fileName);
            $categories->image = $fileName;
        }

        $categories->name = $request->input('name');
        $categories->slug = $request->input('slug');
        $categories->description = $request->input('description');
        $categories->status = $request->input('status')  == True ? '1': '0';
        $categories->popular = $request->input('popular') == True ? '1': '0';
        $categories->meta_title = $request->input('meta_title');
        $categories->meta_descrip = $request->input('meta_descrip');
        $categories->meta_keywords = $request->input('meta_keywords');

            $categories->save();

        return redirect()->route('c_index')->with('success',"Category added successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::find($id);

        return view('backend.category.edit',compact('categories'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $categories = Category::find($id);
      

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categories = Category::find($id);
        $categories->delete();
         
        return redirect()->route('c_index')->with('success',"Successfully deleted Category");
    }
}
