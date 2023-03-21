<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories=SubCategory::latest()->get();
        return view('admin.subcategory.index',compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('admin.subcategory.create',compact('categories'));
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
            'name'=>'required|max:150',
            'category_id'=>'required'
        ]);
        $sub_cat=new SubCategory();
        $sub_cat->name=$request->name;
        $sub_cat->category_id=$request->category_id;
        $sub_cat->save();
        return redirect()->route('subcategories.index')->with('message','Saved Successfully');
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
        $sub_cat=SubCategory::find($id);
        $categories=Category::all();
        return view('admin.subcategory.edit',compact('sub_cat','categories'));
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
            'name'=>'required|max:150',
            'category_id'=>'required'
        ]);
        $sub_cat=SubCategory::find($id);
        $sub_cat->name=$request->name;
        $sub_cat->category_id=$request->category_id;
        $sub_cat->update();
        return redirect()->route('subcategories.index')->with('message','Saved Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategory=SubCategory::find($id);
        
        $subcategory->delete();
        return back()->with('error','Deleted Successfully');
    }
    public function sub_cat_by_category(Request $request)
    {
        $subcat = SubCategory::where('category_id', $request->category_id)->get();
        return $subcat;
    }
}
