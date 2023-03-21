<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders=Slider::all();
        return view('admin.slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slider = new Slider();
        $request->validate([
            'status' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,WebP,BMP',
            'title'=> 'max:60',
            'text'=> 'max:150'
        ]);

        $slider->text=$request->text;
        $slider->status=$request->status;
        $slider->title=$request->title;
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();  
     
            $request->image->move(public_path('uploads/sliders/'), $imageName);
            $slider->image= $imageName;
        }

        $slider->save();
        return redirect()->route('sliders.index')->with('message','Slider added successfully');
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
        $slider = Slider::findOrFail($id);
        return view('admin.slider.edit',compact('slider'));
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
        $slider = Slider::findOrFail($id);
        $request->validate([
            'status' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,WebP,BMP',
            'title'=> 'max:40',
            'text'=> 'max:150'
        ]);
        $slider->text=$request->text;
        $slider->status=$request->status;
        $slider->title=$request->title;


        if ($image = $request->file('image')) {
            $image_path = public_path('uploads/sliders/' . $slider->image);
            
            if(file_exists($image_path)){
                unlink($image_path);
            }
                $destinationPath = 'uploads/sliders/';
                $profileImage = date('YmdHis') . "." .$image->getClientOriginalName();
                $image->move($destinationPath, $profileImage);
                $slider->image = "$profileImage";
            
        }else{
            unset($slider->image);
        }
        $slider->save();
        return redirect()->route('sliders.index')->with('message','Slider updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sliders=Slider::findOrFail($id);
        $image_path = public_path('uploads/sliderss/' . $sliders->image);    
            if(file_exists($image_path)){
                unlink($image_path);
            }else{
                
            }
        $sliders->delete();
        return back()->with('message','Slider deleted successfully');
    }

    public function update_status(Request $request)
    {
        $slider = Slider::findOrFail($request->id);
        
        $slider->status = $request->status;
        
        $slider->save();
    
        return response()->json(['message' => 'Status updated successfully.']);
    }
}
