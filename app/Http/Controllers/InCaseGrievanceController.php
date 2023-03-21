<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\InCaseGrievance;
use Google\Service\Script\Content;
use Illuminate\Http\Request;

class InCaseGrievanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grievance=InCaseGrievance::first();
        return view('admin.incase-grievance.index',compact('grievance'));
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
            'title'=>'required|max:50',
            'email'=>'email',
            'content'=>'required|max:350',
        ]);
        $grievance=new InCaseGrievance();
        $grievance->title=$request->title;
        $grievance->content=$request->content;
        $grievance->email=$request->email;
        $grievance->phone=implode('|', $request->phone);
        $grievance->save();
        return back()->with('message','Successfully added');
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
        //
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
            'email'=>'email',
            'content'=>'required|max:350',
        ]);
        $grievance=InCaseGrievance::first();
        $grievance->title=$request->title;
        $grievance->content=$request->content;
        $grievance->email=$request->email;
        $grievance->phone=implode('|', $request->phone);
        $grievance->update();
        return back()->with('message','Successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
