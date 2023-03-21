<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;

class SchoolController extends Controller
{
    //
    function index(){
        $schools = School::get();
        return view('admin.school.index',compact('schools'));
    }
    function create(){
        return view('admin.school.create');
    }
    function store(Request $request){
        $request->validate([
            'name'=>'required|unique:schools,name',
            'address'=>'required',
            'number'=>'required|digits:10',
            'email'=>'required|email',
            'principal_name'=>'required',
        ]);
        $school = new School();
        $school->name = $request->name;
        $school->address = $request->address;
        $school->number = $request->number;
        $school->email = $request->email;
        $school->principal_name = $request->principal_name;
        $school->save();
        return redirect()->route('schools.index')->with('message','New School Aded');
    }

    function edit($id){
        $school = School::findOrFail($id);
        return view('admin.school.edit',compact('school'));
    }
    function update(Request $request, $id){
        // dd('dd');
        $request->validate([
            'name'=>'required|unique:schools,name,' . $id,
            'address'=>'required',
            'number'=>'required|digits:10',
            'email'=>'required|email',
            'principal_name'=>'required',
        ]);
        $school = School::findOrFail($id);
        $school->name = $request->name;
        $school->address = $request->address;
        $school->number = $request->number;
        $school->email = $request->email;
        $school->principal_name = $request->principal_name;
        $school->update();
        return redirect()->route('schools.index')->with('message','School Updated');
    }
    function destroy($id){
        $school = School::findOrFail($id);
        $school->delete();
        return back()->with('message','School Deleted');
    }
    function show($id){

    }
}
