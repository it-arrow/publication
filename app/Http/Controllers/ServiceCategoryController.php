<?php

namespace App\Http\Controllers;

use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;
class ServiceCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=ServiceCategory::latest()->get();
        return view('admin.services.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.services.category.create');
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
            'name'=>'required|string|max:100',
            // 'icon'=>'required|image|mimes:jpeg,png,jpg,gif,WebP,BMP'
        ]);
        $category=new ServiceCategory();
        $category->name=$request->name;
        $category->slug=Str::slug($request->name,'-');
        if($icon = $request->file('icon')){
            $iconName = time().'.'.$icon->extension();
        
            $destinationPath = public_path('uploads/services/category');
            $img = Image::make($icon->path());
            
            $img->resize(512, 512, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$iconName);
            $category->icon=$iconName;
        }
        $category->save();
        return redirect()->route('category.index')->with('message','Successfully Created');
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
        $category=ServiceCategory::find($id);
        return view('admin.services.category.edit',compact('category'));
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
            'name'=>'required|string|max:100',
            // 'icon'=>'nullable|image|mimes:jpeg,png,jpg,gif,WebP,BMP'
        ]);
        $category=ServiceCategory::find($id);
        $category->name=$request->name;
        $category->slug=Str::slug($request->name,'-');
        
        if ($icon = $request->file('icon')) {
            if($category->icon!=null){
                $icon_path = public_path('uploads/services/category/' . $category->icon);
                
                if(file_exists($icon_path)){
                    unlink($icon_path);
                }
            }
            $iconName = time().'.'.$icon->extension();
            $destinationPath = public_path('uploads/services/category');
            $img = Image::make($icon->path());
            
            $img->resize(512, 512, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$iconName);
            $category->icon=$iconName;
            
        }else{
            unset($category->icon);
        }
        $category->update();
        return redirect()->route('category.index')->with('message','Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category=ServiceCategory::findOrFail($id);
        if($category->icon!=null){
            $image_path = public_path('uploads/services/category/' . $category->icon);    
            if(file_exists($image_path)){
                unlink($image_path);
            }else{
                
            }
        }
        $category->delete();
        return back()->with('message','Deleted Successfully');
    }
    public function featured_status(Request $request)
    {
        $service = ServiceCategory::findOrFail($request->id);
        
        $service->featured = $request->status;
        
        $service->save();
    
        return response()->json(['message' => 'Updated successfully.']);
    }
}
