<?php

namespace App\Http\Controllers;

use App\Models\Trust;
use Illuminate\Http\Request;

class TrustController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trusts=Trust::get();
        return view('admin.trust-security.index',compact('trusts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.trust-security.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $trust = new Trust();
        $request->validate([
            'title'=>'required|max:50',
            'description'=>'required|max:200',
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif,WebP,BMP',
        ]);
        $trust->title=$request->title;
        $trust->description=$request->description;
        if ($request->hasFile('icon')) {
            $iconName = date('YmdHis') . "." .$request->icon->getClientOriginalName();  
     
            $request->icon->move(public_path('uploads/trusts/'), $iconName);
            $trust->icon= $iconName;
        }

        $trust->save();
        return redirect()->route('trust&security.index')->with('message','Successfully Added');
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
        $trust=Trust::find($id);
        return view('admin.trust-security.edit',compact('trust'));
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
        $trust = Trust::findOrFail($id);
        $request->validate([
            'title'=>'required|max:50',
            'description'=>'required|max:200',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,WebP,BMP'
        ]);
        $trust->title=$request->title;
        $trust->description=$request->description;
        if ($icon = $request->file('icon')) {
            $icon_path = public_path('uploads/trusts/' . $trust->icon);
            
            if(file_exists($icon_path)){
                unlink($icon_path);
            }
            $destinationPath = 'uploads/trusts/';
            $profileicon = date('YmdHis') . "." .$icon->getClientOriginalName();
            $icon->move($destinationPath, $profileicon);
            $trust->icon = "$profileicon";
            
        }else{
            unset($trust->icon);
        }
        $trust->update();
        return redirect()->route('trust&security.index')->with('message','Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trust=Trust::findOrFail($id);
        $icon_path = public_path('uploads/trusts/' . $trust->icon);    
            if(file_exists($icon_path)){
                unlink($icon_path);
            }else{
                
            }
        $trust->delete();
        return back()->with('message','Deleted Successfully');
    }
}
