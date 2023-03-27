<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grade;
class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grades=Grade::all();
        return view('admin.grades.index',compact('grades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'grade'=>'required|max:100'
        ]);
        $grade=new Grade;
        $grade->name=$request->grade;
        // dd(\Str::slug($request->grade));
        $grade->slug = \Str::slug($request->grade);
        $grade->save();
        return back()->with('message','Added Successfully');
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
        $grade=Grade::find($id);
        return view('admin.grades.edit',compact('grade'));
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
            'grade'=>'required|max:100'
        ]);
        $grade=Grade::find($id);
        $grade->name=$request->grade;
        $grade->slug = \Str::slug($request->grade);
        $grade->update();
        return redirect()->route('grades.index')->with('message','Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $grade=Grade::find($id);
        $grade->delete();
        return back()->with('message','Deleted Successfully');
    }
}
