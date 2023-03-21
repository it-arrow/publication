<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\HomePage;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enquiry=HomePage::where('section','enquiry')->first();
        if($enquiry==null){
            $enquiry=new HomePage();
            $enquiry->section="enquiry";
            $enquiry->value=json_encode([
                'title'=>'',
                'text'=>'',
            ]);
            $enquiry->save();
        }
        return view('admin.enquiry.index',compact('enquiry'));
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
        //
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
            'title'=>'nullable|max:150',
            'text'=>'nullable|max:150'
        ]);
        $section=HomePage::where('section','enquiry')->first();
        $section->section=$request->section;
        
        $section->value=json_encode([
            'title'=>$request->title,
            'text'=>$request->text,
        ]);
        $section->update();
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
