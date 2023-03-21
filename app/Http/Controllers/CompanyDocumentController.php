<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CompanyDocument;
use Illuminate\Http\Request;
use Image;
class CompanyDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents=CompanyDocument::all();
        return view('admin.company-document.index',compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.company-document.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $document = new CompanyDocument();
        $request->validate([
            'name' => 'required|max:100',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,WebP,BMP',
        ]);
        $document->name=$request->name;
        if ($image = $request->file('image')) {
            $imageName = time().'.'.$image->extension();  
            
            if (!is_dir(public_path('uploads/documents'))) {
                mkdir(public_path('uploads/documents'));
            }
            $destinationPath = public_path('uploads/documents');
            $img = Image::make($image->path());
            
            $img->resize(null, 520, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$imageName);
            $document->image= $imageName;
        }

        $document->save();
        return redirect()->route('company-document.index')->with('message','Added successfully');
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
        $document=CompanyDocument::find($id);
        return view('admin.company-document.edit',compact('document'));
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
        $document = CompanyDocument::findOrFail($id);
        $request->validate([
            'name' =>'required|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,WebP,BMP'
        ]);
        $document->name=$request->name;
        if ($image = $request->file('image')) {
            if($document->image!=null){
                $image_path = public_path('uploads/documents/' . $document->image);
            
                if(file_exists($image_path)){
                    unlink($image_path);
                }
            }
            
            $destinationPath = 'uploads/documents';
            $profileImage = date('YmdHis') . "." .$image->getClientOriginalName();
            $img = Image::make($image->path());
            
            $img->resize(null, 520, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$profileImage);
            $document->image = "$profileImage";
            
        }else{
            unset($document->image);
        }
        
        $document->update();
        return redirect()->route('company-document.index')->with('message','Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $document=CompanyDocument::findOrFail($id);
        $image_path = public_path('uploads/documents/' . $document->image);    
            if(file_exists($image_path)){
                unlink($image_path);
            }else{
                
            }
        $document->delete();
        return back()->with('message','Deleted successfully');
    }
}
