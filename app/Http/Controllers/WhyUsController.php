<?php

namespace App\Http\Controllers;

use App\Models\WhyUs;
use Illuminate\Http\Request;

class WhyUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $whyus=WhyUs::first();
        return view('admin.whyus.index',compact('whyus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $whyus = new WhyUs();
        $request->validate([
            'title' => 'required|max:50',
            'description'=>'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,WebP,BMP',
        ]);
        $whyus->title = $request->title;
        $whyus->description = $request->description;

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();  
        
            $request->image->move(public_path('uploads/whyus/'), $imageName);
            $whyus->image= $imageName;
        }

        $whyus->save();

        return redirect()->route('why-us.index')->with('message','Saved successfully');
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
        //
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
        $whyus = WhyUs::first();
        $request->validate([
            'title' => 'required|max:50',
            'description'=>'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,WebP,BMP',
        ]);
        $whyus->title = $request->title;
        $whyus->description = $request->description;

        if ($image = $request->file('image')) {
            if($whyus->image!=null){
                $image_path = public_path('uploads/whyus/' . $whyus->image);
                
                if(file_exists($image_path)){
                    unlink($image_path);
                }
            }
            $destinationPath = 'uploads/whyus/';
            $profileImage = date('YmdHis') . "." .$image->getClientOriginalName();
            $image->move($destinationPath, $profileImage);
            $whyus->image = "$profileImage";
            
        }else{
            unset($whyus->image);
        }

        $whyus->update();

        return redirect()->route('why-us.index')->with('message','Saved successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
