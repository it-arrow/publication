<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\District;
use App\Models\Manpower;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Route;

class ManpowerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manpowers=Manpower::all();
        if(Route::is('manpowers.index')){
            return view('admin.manpower.index',compact('manpowers'));
        }elseif(Route::is('manpower_payment.index')){
            return view('admin.manpower.payment',compact('manpowers'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        $districts=District::all();
        return view('admin.manpower.create',compact('categories','districts'));
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
            'name'=>'required|string|max:200',
            'email'=>'nullable|string|email|max:255|unique:manpowers',
            'primary_phone'=>'required|numeric|digits:10|unique:manpowers|regex:/[9][6-9]\d{8}/',
            'secondary_phone'=>'nullable|numeric|digits:10|regex:/[9][6-9]\d{8}/',
            'landline_no'=>'nullable|numeric|digits:9|regex:/[0][1]\d{7}/',
            'p_district'=>'required',
            'p_city'=>'required',
            'p_address'=>'required|string|max:255',
            'district'=>'required',
            'city'=>'required',
            'address'=>'required|string|max:255',
            'category'=>'required',
            'skill'=>'required|max:255',
            'citizenship_no'=>'required|string|unique:manpowers,citizenship_no',
            'pan_no'=>'required|string|unique:manpowers,pan_no'
        ]);
        $manpower=new Manpower();
        $manpower->name=$request->name;
        $manpower->email=$request->email;
        $manpower->primary_phone=$request->primary_phone;
        $manpower->secondary_phone=$request->secondary_phone;
        $manpower->landline_no=$request->landline_no;
        $manpower->citizenship_no=$request->citizenship_no;
        $manpower->pan_no=$request->pan_no;
        $manpower->p_district=$request->p_district;
        $manpower->p_city=$request->p_city;
        $manpower->p_address=$request->p_address;
        $manpower->district=$request->district;
        $manpower->city=$request->city;
        $manpower->address=$request->address;
        $manpower->category=$request->category;
        $manpower->subcategory=$request->subcategory;
        $manpower->skill=implode('|', $request->skill);
        $manpower->save();
        return redirect()->route('manpowers.index')->with('message','Saved Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $manpower=Manpower::find($id);
        return view('admin.manpower.show',compact('manpower'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $manpower=Manpower::find($id);
        $categories=Category::all();
        $districts=District::all();
        return view('admin.manpower.edit',compact('manpower','categories','districts'));
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
            'name'=>'required|string|max:200',
            'email'=>'nullable|string|email|max:255|unique:manpowers,email,'.$id,
            'primary_phone'=>'required|numeric|digits:10|regex:/[9][6-9]\d{8}/|unique:manpowers,primary_phone,'.$id,
            'secondary_phone'=>'nullable|numeric|digits:10|regex:/[9][6-9]\d{8}/',
            'landline_no'=>'nullable|numeric|digits:9|regex:/[00][1]\d{7}/',
            'p_district'=>'required',
            'p_city'=>'required',
            'p_address'=>'required|string|max:255',
            'district'=>'required',
            'city'=>'required',
            'address'=>'required|string|max:255',
            'category'=>'required',
            'skill'=>'required|max:255',
            'citizenship_no'=>'required|string|unique:manpowers,citizenship_no,'.$id,
            'pan_no'=>'required|string|unique:manpowers,pan_no,'.$id
        ]);
        $manpower=Manpower::find($id);
        $manpower->name=$request->name;
        $manpower->email=$request->email;
        $manpower->primary_phone=$request->primary_phone;
        $manpower->secondary_phone=$request->secondary_phone;
        $manpower->landline_no=$request->landline_no;
        $manpower->citizenship_no=$request->citizenship_no;
        $manpower->pan_no=$request->pan_no;
        $manpower->p_district=$request->p_district;
        $manpower->p_city=$request->p_city;
        $manpower->p_address=$request->p_address;
        $manpower->district=$request->district;
        $manpower->city=$request->city;
        $manpower->address=$request->address;
        $manpower->category=$request->category;
        $manpower->subcategory=$request->subcategory;
        $manpower->skill=implode('|', $request->skill);
        $manpower->update();
        return redirect()->route('manpowers.index')->with('message','Saved Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Manpower::find($id)->delete();
        return back()->with('error','Deleted Successfully');
    }
    public function manpower_by_category(Request $request){
        $manpower = Manpower::where('category', $request->category_id)->get();
        return $manpower;
    }
    public function manpower_by_subcategory(Request $request){
        $manpower = Manpower::where('subcategory', $request->subcategory_id)->get();
        return $manpower;
    }

    public function payment_edit(Request $request){
        $manpower=Manpower::find($request->id);
        return view('admin.manpower.payment_edit',compact('manpower'));
    }
    public function payment_update(Request $request,$id){
        $request->validate([
            'total_amount'=>'required|numeric',
            'paid_amount'=>'nullable|numeric'
        ]);
        $manpower=Manpower::find($id);

        $manpower->total_amount=$request->total_amount;
        $manpower->paid_amount=$request->paid_amount;
        $manpower->due_amount=$request->total_amount-$request->paid_amount;
        $manpower->update();
        return back()->with('message','Successfully Saved');
    }
    public function payment_history($id){
        $manpower=Manpower::find($id);
        return view('admin.manpower.payment_history',compact('manpower'));
    }
}
