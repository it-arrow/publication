<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Strength;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StrengthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $strengths=Strength::all();
        return view('admin.strength.index',compact('strengths'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.strength.create');
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
            'title'=>'required|max:50|unique:strengths,title',
            'content'=>'required'
        ]);
        $strength=new Strength();
        $strength->title=$request->title;
        $strength->slug=Str::slug($request->title,'-');
        $strength->content=$request->content;
        $strength->save();
        return redirect()->route('strength.index')->with('message','Successfully Added');
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
        $strength=Strength::find($id);
        return view('admin.strength.edit',compact('strength'));
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
            'title'=>'required|max:50|unique:strengths,title,'.$id,
            'content'=>'required'
        ]);
        $strength=Strength::find($id);
        $strength->title=$request->title;
        $strength->slug=Str::slug($request->title,'-');
        $strength->content=$request->content;
        $strength->update();
        return redirect()->route('strength.index')->with('message','Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $strength=Strength::find($id);
        $strength->delete();
        return back()->with('message','Deleted Successfully');
    }
}
