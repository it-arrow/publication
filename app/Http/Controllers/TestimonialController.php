<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Image;
class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials=Testimonial::all();
        return view('admin.testimonial.index',compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:50',
            'message'=>'required|string|max:300',
            'designation'=>'required|string|max:50',
            'image'=>'image|mimes:jpeg,png,jpg,gif,WebP,BMP',
        ]);
        $testimonial = new Testimonial();
        $testimonial->name=$request->name;
        $testimonial->designation=$request->designation;
        $testimonial->message=$request->message;
        if($image = $request->file('image')){
            $imageName = time().'.'.$image->extension();
            if (!is_dir(public_path('uploads/testimonials'))) {
                mkdir(public_path('uploads/testimonials'));
            }
            $destinationPath = public_path('uploads/testimonials');
            $img = Image::make($image->path());
            
            $img->resize(900, 600, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$imageName);
            $testimonial->image=$imageName;
        }

        $testimonial->save();
        return redirect()->route('testimonials.index')->with('message','Testimonial added successfully');
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $testimonial=Testimonial::findOrFail($id);
        return view('admin.testimonial.edit',compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required|string|max:50',
            'message'=>'required|string|max:300',
            'designation'=>'required|string|max:50',
            'image'=>'nullable|image|mimes:jpeg,png,jpg,gif,WebP,BMP',
        ]);
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->name=$request->name;
        $testimonial->designation=$request->designation;
        $testimonial->message=$request->message;

        if ($image = $request->file('image')) {
            if (!is_dir(public_path('uploads/testimonials'))) {
                mkdir(public_path('uploads/testimonials'));
            }
            if($testimonial->image!=null){
                $image_path = public_path('uploads/testimonials/' . $testimonial->image);
                
                if(file_exists($image_path)){
                    unlink($image_path);
                }
            }
            $imageName = time().'.'.$image->extension();

            $destinationPath = public_path('uploads/testimonials');
            $img = Image::make($image->path());
            
            $img->resize(900, 600, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$imageName);
            $testimonial->image=$imageName;
            
        }else{
            unset($testimonial->image);
        }
        $testimonial->save();
        return redirect()->route('testimonials.index')->with('message','Testimonial updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimonial=Testimonial::findOrFail($id);
        $image_path = public_path('uploads/testimonials/' . $testimonial->image);    
            if(file_exists($image_path)){
                unlink($image_path);
            }else{
                
            }
        $testimonial->delete();
        return back()->with('message','Testimonial deleted successfully');
    }
}
