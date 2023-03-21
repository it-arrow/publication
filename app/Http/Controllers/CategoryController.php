<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $categories=Category::orderBy('updated_at','desc')->get();
        return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->category);
        $request->validate([
            'category' => 'required|unique:categories,name,',
        ]);
        $category=new Category();
        $category->name=$request->category;
        $category->slug=Str::slug($request->category,'-');
        $category->save();

        return redirect()->route('categories.index')->with(['message' => 'Category added successfully.']);

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
        // dd($id);

        $category=Category::where('slug',$id)->first();
        // dd($category);
        return view('admin.category.edit',compact('category'));
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
        $category=Category::where('slug',$id)->first();
        $validated = $request->validate([
            'category' => 'required|max:100|unique:categories,name,'.$category->id,
        ]);
        $category->name=$request->category;
        $category->slug=Str::slug($request->category,'-');
        $category->update();
        return redirect()->route('categories.index')->with('message','Category updated successfully');

    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category=Category::where('slug',$id)->first();
        
        $category->delete();
        return back()->with('error','Category deleted successfully');
    }
}
