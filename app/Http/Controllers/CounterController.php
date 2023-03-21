<?php

namespace App\Http\Controllers;

use App\Models\Counter;
use Illuminate\Http\Request;

class CounterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $counter=Counter::get();
        return view('admin.counter.index',compact('counter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.counter.create');
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
            'title'=>'required|max:50',
            'icon'=>'required|image|mimes:jpeg,png,jpg,gif,WebP,BMP',
            'stat_counter'=>'required|numeric'
        ]);
        $counter=new Counter();
        $counter->title=$request->title;
        $counter->stat_counter=$request->stat_counter;
        if ($request->hasFile('icon')) {
            $iconName = date('YmdHis') . "." .$request->icon->getClientOriginalName();  
     
            $request->icon->move(public_path('uploads/counter/'), $iconName);
            $counter->icon= $iconName;
        }
        $counter->save();
        return redirect()->route('counter.index')->with('message','Saved Successfully');
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
        $counter=Counter::find($id);
        return view('admin.counter.edit',compact('counter'));
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
            'title'=>'required|max:50',
            'icon'=>'nullable|image|mimes:jpeg,png,jpg,gif,WebP,BMP',
            'stat_counter'=>'required|numeric'
        ]);
        $counter=Counter::find($id);
        $counter->title=$request->title;
        $counter->stat_counter=$request->stat_counter;
        if ($icon = $request->file('icon')) {
            if($counter->icon!=null){
                $icon_path = public_path('uploads/counter/' . $counter->icon);
                
                if(file_exists($icon_path)){
                    unlink($icon_path);
                }
            }
            $destinationPath = 'uploads/counter/';
            $profileicon = date('YmdHis') . "." .$icon->getClientOriginalName();
            $icon->move($destinationPath, $profileicon);
            $counter->icon = "$profileicon";
            
        }else{
            unset($counter->icon);
        }
        $counter->update();
        return redirect()->route('counter.index')->with('message','Saved Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $counter=Counter::find($id);
        $image_path = public_path('uploads/counters/' . $counter->image);    
            if(file_exists($image_path)){
                unlink($image_path);
            }else{
                
            }
        $counter->delete();
        return back()->with('message','Deleted Successfully');
    }
}
