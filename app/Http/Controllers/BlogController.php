<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::all();
        return view('admin.blog.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('admin.blog.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|unique:blogs|max:255',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,WebP,BMP',
        ]);

        $blog=new Blog();
        $blog->title=$request->title;
        $blog->slug=Str::slug($request->title,'-');
        $blog->description=$request->description;
        $blog->status=$request->status;
        // $blog->category_id=$request->category_id;
        
        // $blog->tags=implode('|', $request->tags);
        $blog->tags=implode('|', $request->tags);
        // if ($request->hasFile('image')) {
        //     $imageName = time().'.'.$request->image->extension();  
     
        //     $request->image->move(public_path('uploads/blogs/'), $imageName);
        //     $blog->image= $imageName;
        // }
        if($image = $request->file('image')){
            $imageName = time().'.'.$image->extension();
        
            $destinationPath = public_path('uploads/blogs');
            $img = Image::make($image->path());
            
            $img->resize(1200, 700, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$imageName);
            $blog->image=$imageName;
        }
        if($blog->save()){
            return redirect()->route('blogs.index')->with('message','Blog added successfully');
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
        $blog=Blog::findOrFail($id);
        return view('admin.blog.show',compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $blog=Blog::findOrFail($id);
        $categories=Category::all();

        return view('admin.blog.edit',compact('blog','categories'));
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
            'title' => 'required|max:255|unique:blogs,title,'.$id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,WebP,BMP',
            
        ]);

        $blog = Blog::findOrFail($id);
        $blog->title=$request->title;
        $blog->slug=Str::slug($request->title,'-');
        $blog->description=$request->description;
        $blog->status=$request->status;
        // $blog->category_id=$request->category_id;
        $blog->tags=implode('|', $request->tags);
        
        if ($image = $request->file('image')) {
            if($blog->image!=null){
                $image_path = public_path('uploads/blogs/' . $blog->image);
                
                if(file_exists($image_path)){
                    unlink($image_path);
                }
            }
            $imageName = time().'.'.$image->extension();
            $destinationPath = public_path('uploads/blogs');
            $img = Image::make($image->path());
            
            $img->resize(1200, 700, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$imageName);
            $blog->image=$imageName;
            
        }else{
            unset($blog->image);
        }
        $blog->save();
        return redirect()->route('blogs.index')->with('message','Blog updated successfully');
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog=Blog::findOrFail($id);
        $image_path = public_path('uploads/blogs/' . $blog->image);    
            if(file_exists($image_path)){
                unlink($image_path);
            }else{
                
            }
        $blog->delete();
        return back()->with('message','Blog deleted successfully');
    }

    public function update_status(Request $request)
    {
        $blog = Blog::findOrFail($request->id);
        
        $blog->status = $request->status;
        
        $blog->save();
    
        return response()->json(['message' => 'Status updated successfully.']);
    }
}
