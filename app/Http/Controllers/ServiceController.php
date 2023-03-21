<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\ServiceSubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services=Service::latest()->get();
        return view('admin.services.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=ServiceCategory::all();
        return view ('admin.services.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'name' => 'required|unique:services|max:50',
            'description'=>'nullable',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,WebP,BMP',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,WebP,BMP',
            'tags'=>'max:255',
            'category_id'=>'required',
            // 'subcategory_id'=>'required'
        ]);

        $service=new Service();
        $service->name=$request->name;
        $service->slug=Str::slug($request->name,'-');
        $service->description=$request->description;
        // if($request->featured=="on"){
        //     $service->featured=1;
        // }else{
        //     $service->featured=0;
        // }
        $service->category_id=$request->category_id;
        // $service->subcategory_id=$request->subcategory_id;
        $service->tags=implode('|', $request->tags);
        
        if($icon = $request->file('icon')){
            $iconName = time().'.'.$icon->extension();
        
            $destinationPath = public_path('uploads/services/icon');
            $img = Image::make($icon->path());
            
            $img->resize(512, 512, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$iconName);
            $service->icon=$iconName;
        }
        if($image = $request->file('image')){
            $imageName = time().'.'.$image->extension();
        
            $destinationPath = public_path('uploads/services/image');
            $img = Image::make($image->path());
            
            $img->resize(1200, 700, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$imageName);
            $service->image=$imageName;
        }
        if($service->save()){
            return redirect()->route('services.index')->with('message','Service added successfully');
        }
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
        $categories=ServiceCategory::all();
        $service=Service::find($id);
        return view('admin.services.edit',compact('service','categories'));
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
        $validated = $request->validate([
            'name' => 'required|max:50|unique:services,name,'.$id,
            'description'=>'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,WebP,BMP',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,WebP,BMP',
            'tags'=>'max:255',
            'category_id'=>'required',
            // 'subcategory_id'=>'required'
        ]);

        $service = Service::findOrFail($id);
        $service->name=$request->name;
        $service->slug=Str::slug($request->name,'-');
        $service->description=$request->description;
        // if($request->featured=="on"){
        //     $service->featured=1;
        // }else{
        //     $service->featured=0;
        // }
        $service->category_id=$request->category_id;
        // $service->subcategory_id=$request->subcategory_id;
        $service->tags=implode('|', $request->tags);

        // if ($image = $request->file('image')) {
        //     $image_path = public_path('uploads/services/image/' . $service->image);
            
        //     if(file_exists($image_path)){
        //         unlink($image_path);
        //     }
        //         $destinationPath = 'uploads/services/image/';
        //         $profileImage = date('YmdHis') . "." .$image->getClientOriginalName();
        //         $image->move($destinationPath, $profileImage);
        //         $service->image = "$profileImage";
            
        // }else{
        //     unset($service->image);
        // }
        if ($image = $request->file('image')) {
            if($service->image!=null){
                $image_path = public_path('uploads/services/image/' . $service->image);
                
                if(file_exists($image_path)){
                    unlink($image_path);
                }
            }
            $imageName = time().'.'.$image->extension();
            $destinationPath = public_path('uploads/services/image');
            $img = Image::make($image->path());
            
            $img->resize(1200, 700, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$imageName);
            $service->image=$imageName;
            
        }else{
            unset($service->image);
        }
        // if ($icon = $request->file('icon')) {
        //     $image_path = public_path('uploads/services/icon/' . $service->icon);
            
        //     if(file_exists($image_path)){
        //         unlink($image_path);
        //     }
        //         $destinationPath = 'uploads/services/icon/';
        //         $profileImage = date('YmdHis') . "." .$icon->getClientOriginalName();
        //         $icon->move($destinationPath, $profileImage);
        //         $service->icon = "$profileImage";
            
        // }else{
        //     unset($service->icon);
        // }
        if ($icon = $request->file('icon')) {
            if($service->icon!=null){
                $icon_path = public_path('uploads/services/icon/' . $service->icon);
                
                if(file_exists($icon_path)){
                    unlink($icon_path);
                }
            }
            $iconName = time().'.'.$icon->extension();
            $destinationPath = public_path('uploads/services/icon');
            $img = Image::make($icon->path());
            
            $img->resize(512, 512, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$iconName);
            $service->icon=$iconName;
            
        }else{
            unset($service->icon);
        }
        $service->update();
        return redirect()->route('services.index')->with('message','Service updated successfully');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service=Service::findOrFail($id);
        $image_path = public_path('uploads/services/image/' . $service->image);    
        if(file_exists($image_path)){
            unlink($image_path);
        }else{
            
        }
        $icon_path = public_path('uploads/services/icon/' . $service->icon);    
        if(file_exists($icon_path)){
            unlink($icon_path);
        }else{
            
        }
        $service->delete();
        return back()->with('message','Service deleted successfully');
    }

    
}
