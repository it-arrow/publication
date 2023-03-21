<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DemandDocument;
use Illuminate\Http\Request;
use Image;
class DemandDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents=DemandDocument::all();
        return view('admin.demand-document.index',compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.demand-document.create');
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
            'title'=>'required|max:255',
            'content'=>'required',
            'image'=>'nullable|image|mimes:jpeg,png,jpg,gif,WebP,BMP'
        ]);
        $document=new DemandDocument();
        $document->title=$request->title;
        $document->content=$request->content;
        if ($image = $request->file('image')) {
            $imageName = time().'.'.$image->extension();  
            
            if (!is_dir(public_path('uploads/documents/demand'))) {
                mkdir(public_path('uploads/documents/demand'));
            }
            $destinationPath = public_path('uploads/documents/demand');
            $img = Image::make($image->path());
            
            $img->resize(520, 520, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$imageName);
            $document->image= $imageName;
        }
        $document->save();
        return redirect()->route('demand-document.index')->with('message','Added successfully');

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
        $document=DemandDocument::find($id);
        return view('admin.demand-document.edit',compact('document'));
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
        $document = DemandDocument::findOrFail($id);
        $request->validate([
            'title'=>'required|max:255',
            'content'=>'required',
            'image'=>'nullable|image|mimes:jpeg,png,jpg,gif,WebP,BMP'
        ]);
        $document->title=$request->title;
        $document->content=$request->content;
        if ($image = $request->file('image')) {
            if($document->image!=null){
                $image_path = public_path('uploads/documents/demand/' . $document->image);
            
                if(file_exists($image_path)){
                    unlink($image_path);
                }
            }
            
            $destinationPath = 'uploads/documents/demand';
            $profileImage = date('YmdHis') . "." .$image->getClientOriginalName();
            $img = Image::make($image->path());
            
            $img->resize(370, 225, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$profileImage);
            $document->image = "$profileImage";
            
        }else{
            unset($document->image);
        }
        
        $document->update();
        return redirect()->route('demand-document.index')->with('message','Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $document=DemandDocument::findOrFail($id);
        if($document->image!=null){
            $image_path = public_path('uploads/documents/demand/' . $document->image);    
            if(file_exists($image_path)){
                unlink($image_path);
            }else{
                
            }
        }
        $document->delete();
        return back()->with('message','Deleted successfully');
    }
}
