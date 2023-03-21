<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Award;
use Illuminate\Http\Request;
use Image;
class AwardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $awards=Award::all();
        return view('admin.awards.index',compact('awards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.awards.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $award = new Award();
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,WebP,BMP',
        ]);
        if ($image = $request->file('image')) {
            $imageName = time().'.'.$image->extension();  
            
            if (!is_dir(public_path('uploads/award'))) {
                mkdir(public_path('uploads/award'));
            }
            $destinationPath = public_path('uploads/award');
            $img = Image::make($image->path());
            $img->orientate();
            $img->resize(null, 520, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$imageName);
            $award->image= $imageName;
        }

        $award->save();
        return redirect()->route('awards.index')->with('message','Award added successfully');
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
        $award=Award::find($id);
        return view('admin.awards.edit',compact('award'));
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
        $award = Award::findOrFail($id);
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,WebP,BMP'
        ]);
        if ($image = $request->file('image')) {
            if($award->image!=null){
                $image_path = public_path('uploads/award/' . $award->image);
            
                if(file_exists($image_path)){
                    unlink($image_path);
                }
            }
            
            $destinationPath = 'uploads/award';
            $profileImage = date('YmdHis') . "." .$image->getClientOriginalName();
            $img = Image::make($image->path());
             $img->orientate();
            $img->resize(null, 520, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$profileImage);
            $award->image = "$profileImage";
            
        }else{
            unset($award->image);
        }
        
        $award->update();
        return redirect()->route('awards.index')->with('message','Award updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $award=Award::findOrFail($id);
        $image_path = public_path('uploads/award/' . $award->image);    
            if(file_exists($image_path)){
                unlink($image_path);
            }else{
                
            }
        $award->delete();
        return back()->with('message','Award deleted successfully');
    }
}
