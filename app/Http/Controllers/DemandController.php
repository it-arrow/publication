<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CurrentDemand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;
class DemandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $demands=CurrentDemand::latest()->get();
        return view('admin.demand.index',compact('demands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.demand.create');
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
            'position'=>'required|max:255',
            'total_demands'=>'numeric',
            'content'=>'required',
            'image'=>'nullable|image|mimes:jpeg,png,jpg,gif,WebP,BMP',
        ]);
        $demand=new CurrentDemand();
        $demand->position=$request->position;
        $demand->slug=Str::slug($request->position,'-');
        $demand->total_demands=$request->total_demands;
        $demand->content=$request->content;
        $demand->expiry=$request->expiry;
        if ($image = $request->file('image')) {
            $imageName = time().'.'.$image->extension();  
            
            if (!is_dir(public_path('uploads/demands'))) {
                mkdir(public_path('uploads/demands'));
            }
            $destinationPath = public_path('uploads/demands');
            $img = Image::make($image->path());
            
            $img->resize(370, 225, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$imageName);
            $demand->image= $imageName;
        }
        $demand->save();
        return redirect()->route('demand.index')->with('message','Successfully Added');
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
        $demand=CurrentDemand::find($id);
        return view('admin.demand.edit',compact('demand'));
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
            'position'=>'required|max:255',
            'total_demands'=>'numeric',
            'content'=>'required',
            'image'=>'nullable|image|mimes:jpeg,png,jpg,gif,WebP,BMP',
        ]);
        $demand=CurrentDemand::find($id);
        $demand->position=$request->position;
        $demand->slug=Str::slug($request->position,'-');
        $demand->total_demands=$request->total_demands;
        $demand->content=$request->content;
        $demand->expiry=$request->expiry;
        if ($image = $request->file('image')) {
            if($demand->image!=null){
                $image_path = public_path('uploads/demands/' . $demand->image);
            
                if(file_exists($image_path)){
                    unlink($image_path);
                }
            }
            
            $destinationPath = 'uploads/demands';
            $profileImage = date('YmdHis') . "." .$image->getClientOriginalName();
            $img = Image::make($image->path());
            
            $img->resize(370, 225, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$profileImage);
            $demand->image = "$profileImage";
            
        }else{
            unset($demand->image);
        }
        $demand->update();
        return redirect()->route('demand.index')->with('message','Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $demand=CurrentDemand::findOrFail($id);
        $image_path = public_path('uploads/demands/' . $demand->image);    
            if(file_exists($image_path)){
                unlink($image_path);
            }else{
                
            }
        $demand->delete();
        return back()->with('message','Deleted successfully');
    }
}
