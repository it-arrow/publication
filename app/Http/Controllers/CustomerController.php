<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use App\Models\District;
use App\Models\Manpower;
use App\Models\Service;
use App\Models\Task;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers=Customer::all();
        $categories=Category::all();
        return view('admin.customer.index',compact('customers','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services=Service::all();
        $districts=District::all();
        return view('admin.customer.create',compact('services','districts'));
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
            'email'=>'nullable|string|email|max:255|unique:customers',
            'mobile_no'=>'required|numeric|digits:10|unique:customers|regex:/[9][6-9]\d{8}/',
            'landline_no'=>'nullable|numeric|digits:9|regex:/[0][1]\d{7}/',
            'district'=>'required',
            'city'=>'required',
            'address'=>'required|string|max:255',
            // 'service_id'=>'required',
            // 'date'=>'required',
            // 'due_amount'=>'required|numeric',
            // 'paid_amount'=>'numeric',
        ]);
        $customer=new Customer();
        $customer->name=$request->name;
        $customer->email=$request->email;
        $customer->mobile_no=$request->mobile_no;
        $customer->landline_no=$request->landline_no;
        $customer->district_id=$request->district;
        $customer->city_id=$request->city;
        $customer->address=$request->address;
        // $customer->service_id=$request->service_id;
        // $customer->date=$request->date;
        // $customer->due_amount=$request->due_amount;
        // $customer->paid_amount=$request->paid_amount;

        $customer->save();
        return redirect()->route('customers.index')->with('message','Saved Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer=Customer::find($id);
        return view('admin.customer.show',compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer=Customer::find($id);
        $districts=District::all();
        return view('admin.customer.edit',compact('customer','districts'));
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
            'email'=>'nullable|string|email|max:255|unique:customers',
            'mobile_no'=>'required|numeric|digits:10|regex:/[9][6-9]\d{8}/|unique:customers,mobile_no,'.$id,
            'landline_no'=>'nullable|numeric|digits:9|regex:/[0][1]\d{7}/',
            'district'=>'required',
            'city'=>'required',
            'address'=>'required|string|max:255',
        ]);
        $customer=Customer::find($id);
        $customer->name=$request->name;
        $customer->email=$request->email;
        $customer->mobile_no=$request->mobile_no;
        $customer->landline_no=$request->landline_no;
        $customer->district_id=$request->district;
        $customer->city_id=$request->city;
        $customer->address=$request->address;

        $customer->update();
        return redirect()->route('customers.index')->with('message','Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Customer::find($id)->delete();
        return back()->with('error','Deleted Successfully');
    }

    public function payment_history($id){
        $customer=Customer::find($id);
        return view('admin.customer.payment_history',compact('customer'));
    }
}
