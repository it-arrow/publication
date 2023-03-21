<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Policy;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;

class PolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $policies=Policy::all();
        return view('admin.policy.index',compact('policies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.policy.create');
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
            'policy_name'=>'required|max:50|unique:policies,policy_name',
            'content'=>'required',
            'image'=>'nullable|image|mimes:jpeg,png,jpg,gif,WebP,BMP'
        ]);
        $policy=new Policy();
        $policy->policy_name=$request->policy_name;
        $policy->slug=Str::slug($request->policy_name,'-');
        $policy->content=$request->content;
        if ($image = $request->file('image')) {
            $imageName = time().'.'.$image->extension();  
            
            if (!is_dir(public_path('uploads/policy'))) {
                mkdir(public_path('uploads/policy'));
            }
            $destinationPath = public_path('uploads/policy');
            $img = Image::make($image->path());
            
            $img->resize(370, 225, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$imageName);
            $policy->image= $imageName;
        }
        $policy->save();
        return redirect()->route('policy.index')->with('message','Added Successfully');
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
        $policy=Policy::find($id);
        return view('admin.policy.edit',compact('policy'));
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
            'policy_name'=>'required|max:50|unique:policies,policy_name,'.$id,
            'content'=>'required',
            'image'=>'nullable|image|mimes:jpeg,png,jpg,gif,WebP,BMP'
        ]);
        $policy=Policy::find($id);
        $policy->policy_name=$request->policy_name;
        $policy->slug=Str::slug($request->policy_name,'-');
        $policy->content=$request->content;
        if ($image = $request->file('image')) {
            if($policy->image!=null){
                $image_path = public_path('uploads/policy/' . $policy->image);
            
                if(file_exists($image_path)){
                    unlink($image_path);
                }
            }
            if (!is_dir(public_path('uploads/policy'))) {
                mkdir(public_path('uploads/policy'));
            }
            $destinationPath = 'uploads/policy';
            $profileImage = date('YmdHis') . "." .$image->getClientOriginalName();
            $img = Image::make($image->path());
            
            $img->resize(null, 520, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$profileImage);
            $policy->image = "$profileImage";
            
        }else{
            unset($policy->image);
        }
        $policy->update();
        return redirect()->route('policy.index')->with('message','Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $policy=Policy::findOrFail($id);
        if ($policy->image!=null) {
            $image_path = public_path('uploads/policy/' . $policy->image);    
            if(file_exists($image_path)){
                unlink($image_path);
            }else{
                
            }
        }
        $policy->delete();
        return back()->with('message','Deleted successfully');
    }
}
