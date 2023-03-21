<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;
use Image;
class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries=Country::all();
        return view('admin.serving-country.index',compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.serving-country.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $country = new Country();
        $request->validate([
            'name'=>'required|max:50',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,WebP,BMP',
        ]);
        $country->name=$request->name;
        if ($image = $request->file('image')) {
            $imageName = time().'.'.$image->extension();  
            
            if (!is_dir(public_path('uploads/country'))) {
                mkdir(public_path('uploads/country'));
            }
            $destinationPath = public_path('uploads/country');
            $img = Image::make($image->path());
            
            $img->resize(370, 225, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$imageName);
            $country->image= $imageName;
        }

        $country->save();
        return redirect()->route('countries.index')->with('message','Country added successfully');
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
        $country=Country::find($id);
        return view('admin.serving-country.edit',compact('country'));
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
        $country = Country::findOrFail($id);
        $request->validate([
            'name'=>'required|max:50',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,WebP,BMP'
        ]);
        $country->name=$request->name;
        if ($image = $request->file('image')) {
            if($country->image!=null){
                $image_path = public_path('uploads/country/' . $country->image);
            
                if(file_exists($image_path)){
                    unlink($image_path);
                }
            }
            
            $destinationPath = 'uploads/country';
            $profileImage = date('YmdHis') . "." .$image->getClientOriginalName();
            $img = Image::make($image->path());
            
            $img->resize(370, 225, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$profileImage);
            $country->image = "$profileImage";
            
        }else{
            unset($country->image);
        }
        
        $country->update();
        return redirect()->route('countries.index')->with('message','Country updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $country=Country::findOrFail($id);
        $image_path = public_path('uploads/country/' . $country->image);    
            if(file_exists($image_path)){
                unlink($image_path);
            }else{
                
            }
        $country->delete();
        return back()->with('message','Country deleted successfully');
    }
}
