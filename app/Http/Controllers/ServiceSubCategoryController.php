<?php

namespace App\Http\Controllers;

use App\Models\ServiceCategory;
use App\Models\ServiceSubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;
class ServiceSubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories=ServiceSubCategory::all();
        return view('admin.services.subcategory.index',compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=ServiceCategory::all();
        return view('admin.services.subcategory.create',compact('categories'));
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
            'icon'=>'required|image|mimes:jpeg,png,jpg,gif,WebP,BMP',
            'category_id'=>'required'
        ]);
        $category=new ServiceSubCategory();
        $category->name=$request->name;
        $category->slug=Str::slug($request->name,'-');
        $category->category_id=$request->category_id;
        if($icon = $request->file('icon')){
            $iconName = time().'.'.$icon->extension();
        
            $destinationPath = public_path('uploads/services/subcategory');
            $img = Image::make($icon->path());
            
            $img->resize(512, 512, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$iconName);
            $category->icon=$iconName;
        }
        $category->save();
        return redirect()->route('subcategory.index')->with('message','Successfully Created');
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
        $sub_cat=ServiceSubCategory::find($id);
        return view('admin.services.subcategory.edit',compact('sub_cat','categories'));
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
            'icon'=>'nullable|image|mimes:jpeg,png,jpg,gif,WebP,BMP',
            'category_id'=>'required'
        ]);
        $category=ServiceSubCategory::find($id);
        $category->name=$request->name;
        $category->slug=Str::slug($request->name,'-');
        $category->category_id=$request->category_id;
        if ($icon = $request->file('icon')) {
            if($category->icon!=null){
                $icon_path = public_path('uploads/services/subcategory/' . $category->icon);
                
                if(file_exists($icon_path)){
                    unlink($icon_path);
                }
            }
            $iconName = time().'.'.$icon->extension();
            $destinationPath = public_path('uploads/services/subcategory');
            $img = Image::make($icon->path());
            
            $img->resize(512, 512, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$iconName);
            $category->icon=$iconName;
            
        }else{
            unset($category->icon);
        }
        $category->update();
        return redirect()->route('subcategory.index')->with('message','Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category=ServiceSubCategory::findOrFail($id);
        if($category->icon!=null){
            $image_path = public_path('uploads/services/subcategory/' . $category->icon);    
            if(file_exists($image_path)){
                unlink($image_path);
            }else{
                
            }
        }
        $category->delete();
        return back()->with('message','Deleted Successfully');
    }

    public function sub_cat_by_category(Request $request){
        $cat=ServiceCategory::find($request->category_id);
        $subcategories=$cat->serviceSubCategory;
        return $subcategories;
    }
}
