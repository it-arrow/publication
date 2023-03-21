<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner = Banner::first();
        return view('admin.banner.index',compact('banner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $banner = new Banner();
        $request->validate([
            'parallax_text'=>'required|max:255',
            'sub_title'=>'nullable|max:255',
            'image' => 'required|image'
        ]);
        $banner->parallax_text=$request->parallax_text;
        $banner->sub_title=$request->sub_title;
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();  
     
            $request->image->move(public_path('uploads/banners/'), $imageName);
            $banner->image= $imageName;
        }

        $banner->save();
        return redirect()->route('banners.index')->with('message','Banner added successfully');
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
        $banner = Banner::first();
        $request->validate([
            'parallax_text'=>'required|max:255',
            'sub_title'=>'nullable|max:255',
            'image' => 'nullable|image'
        ]);
        $banner->parallax_text=$request->parallax_text;
        $banner->sub_title=$request->sub_title;
        if ($image = $request->file('image')) {
            if($banner->image!=null){
                $image_path = public_path('uploads/banners/' . $banner->image);
            
                if(file_exists($image_path)){
                    unlink($image_path);
                }
            }
            
            $destinationPath = 'uploads/banners/';
            $profileImage = date('YmdHis') . "." .$image->getClientOriginalName();
            $image->move($destinationPath, $profileImage);
            $banner->image = "$profileImage";
            
        }else{
            unset($banner->image);
        }
        $banner->update();
        return redirect()->route('banners.index')->with('message','Banner updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }

    
}
