<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Carrer;
use Illuminate\Http\Request;

class CarrerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carrers=Carrer::latest()->get();
        return view('admin.carrer.index',compact('carrers'));
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
            'name'=>'required|max:50',
            'email'=>'nullable|email',
            'phone'=>'required|numeric|digits:10|regex:/[9][6-9]\d{8}/',
            'subject'=>'nullable|max:100',
            'message'=>'nullable|max:500',
            'document'=>'nullable|mimes:pdf,doc,docx'
        ]);
        $carrer=new Carrer();
        $carrer->name=$request->name;
        $carrer->position_id=$request->position;
        $carrer->email=$request->email;
        $carrer->phone=$request->phone;
        $carrer->subject=$request->subject;
        $carrer->message=$request->message;
        if ($document = $request->file('document')) {
            if($carrer->document!=null){
                $document_path = public_path('uploads/carrer/' . $carrer->document);
                
                if(file_exists($document_path)){
                    unlink($document_path);
                }
            }
            $destinationPath = 'uploads/carrer/';
            $profiledocument = $document->getClientOriginalName();
            $document->move($destinationPath, $profiledocument);
            $carrer->document = "$profiledocument";
            
        }
        $carrer->save();
        return back()->with('message','Applied Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $career=Carrer::find($id);
        return view('admin.carrer.show',compact('career'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $carrer=Carrer::find($id);
        if($carrer->document!=null){
            $image_path = public_path('uploads/carrer/' . $carrer->documents);
            if(file_exists($image_path)){
                unlink($image_path);
            }
        }
        $carrer->delete();
        return back()->with('message','Deleted Successfully');
    }
}
