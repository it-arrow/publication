<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\HomePage;
use Illuminate\Http\Request;
use Image;
class BreadCrumbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $request->validate([
            'page_title'=>'required|max:30',
            'sub_title'=>'required|max:50',
            'breadcrumb_image'=>'nullable|image|mimes:mimes:jpeg,png,jpg,gif,WebP,BMP'
        ]);
        $breadcrumb=new HomePage();
        $breadcrumb->section=$request->section;
        if ($image = $request->file('breadcrumb_image')) {
            if (!is_dir(public_path('uploads/breadcrumb'))) {
                mkdir(public_path('uploads/breadcrumb'));
            }
            $destinationPath = 'uploads/breadcrumb';
            $profileImage = date('YmdHis') . "$request->section." .$image->getClientOriginalName();
            $img = Image::make($image->path());
            
            $img->resize(1349, 500, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$profileImage);
            
        }else{
            $profileImage='';
        }
        $breadcrumb->value=json_encode([
            'page_title'=>$request->page_title,
            'sub_title'=>$request->sub_title,
            'breadcrumb_image'=>$profileImage,
        ]);
        $breadcrumb->save();
        return back()->with('message','Successfully saved');
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
        $request->validate([
            'page_title'=>'required|max:30',
            'sub_title'=>'required|max:50',
            'breadcrumb_image'=>'nullable|image|mimes:mimes:jpeg,png,jpg,gif,WebP,BMP'
        ]);
        $breadcrumb=HomePage::where('section',$request->section)->first();
        $breadcrumb->section=$request->section;
        if ($image = $request->file('breadcrumb_image')) {
            if(json_decode($breadcrumb->value)->breadcrumb_image!=null){
                $image_path = public_path('uploads/breadcrumb/' . json_decode($breadcrumb->value)->breadcrumb_image);
            
                if(file_exists($image_path)){
                    unlink($image_path);
                }
            }
            if (!is_dir(public_path('uploads/breadcrumb'))) {
                mkdir(public_path('uploads/breadcrumb'));
            }
            $destinationPath = 'uploads/breadcrumb';
            $profileImage = date('YmdHis') . "$request->section." .$image->getClientOriginalName();
            $img = Image::make($image->path());
            
            $img->resize(1349, 500, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$profileImage);
            
        }else{
            if(json_decode($breadcrumb->value)->breadcrumb_image!=null){
                $image_path = public_path('uploads/breadcrumb/' . json_decode($breadcrumb->value)->breadcrumb_image);
            
                if(file_exists($image_path)){
                    $profileImage=json_decode($breadcrumb->value)->breadcrumb_image;
                }
            }
            
            unset(json_decode($breadcrumb->value)->breadcrumb_image);
        }
        $breadcrumb->value=json_encode([
            'page_title'=>$request->page_title,
            'sub_title'=>$request->sub_title,
            'breadcrumb_image'=>$profileImage,
        ]);
        $breadcrumb->update();
        return back()->with('message','Successfully updated');
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
