<?php

namespace App\Http\Controllers;

use App\Models\Backend\Testimonial;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tests = Testimonial::all();
        return view('backend.testimonial.index',compact('tests'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('backend.testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
           $test = new Testimonial();
          if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time().'.'.$extension;
            $file->move('assets/testimonial/', $fileName);
            $test->image = $fileName;
        }
        $test->name = $request->name;
        $test->profession = $request->profession;
        $test->message = $request->message;
        $test->save();
        return redirect()->route('index.testimonial')->with('success',"Successfully added testimonial");
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
        $test = Testimonial::find($id);
        return view('backend.testimonial.edit',compact('test'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request);
        $test= Testimonial::find($id);
        if($request->hasFile('image')){
            $path = 'assets/testimonial/'. $test->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time().'.'.$extension;
            $file->move('assets/testimonial/', $fileName);
            $test->image = $fileName;
        } 
        $test->name = $request->name;
        $test->profession = $request->profession;
        $test->message = $request->message;
        $test->update();
        return redirect()->route('index.testimonial')->with('success',"Successfully updated Testimonial");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $test = Testimonial::find($id);
        $test->delete();

       return redirect()->route('index.testimonial')->with('success',"Successfully deleted Testimonial");
    }
}
