<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments=Payment::all();
        return view('admin.payment.index',compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.payment.create');

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
            'account_no'=>'required|max:200',
            'account_name'=>'required|max:200|string',
            'image'=>'image|mimes:jpeg,png,jpg,gif,WebP,BMP'
        ]);
        $payment=new Payment();
        $payment->name=$request->name;
        $payment->account_no=$request->account_no;
        $payment->account_name=$request->account_name;
        if ($request->hasFile('image')) {
            $imageName = date('YmdHis') . "." .$request->image->getClientOriginalName();  
     
            $request->image->move(public_path('uploads/payment/'), $imageName);
            $payment->image= $imageName;
        }
        $payment->save();
        return redirect()->route('payment.index')->with('message','Added Successfully');
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
        $payment=Payment::find($id);
        return view('admin.payment.edit',compact('payment'));
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
            'account_no'=>'required|max:200',
            'account_name'=>'required|max:200|string',
            'image'=>'image|mimes:jpeg,png,jpg,gif,WebP,BMP'
        ]);
        $payment=Payment::find($id);
        $payment->name=$request->name;
        $payment->account_no=$request->account_no;
        $payment->account_name=$request->account_name;
        if ($image = $request->file('image')) {
            if($payment->image!=null){
                $image_path = public_path('uploads/payment/' . $payment->image);
                
                if(file_exists($image_path)){
                    unlink($image_path);
                }
            }
            $destinationPath = 'uploads/payment/';
            $profileimage = date('YmdHis') . "." .$image->getClientOriginalName();
            $image->move($destinationPath, $profileimage);
            $payment->image = "$profileimage";
            
        }else{
            unset($payment->image);
        }
        $payment->update();
        return redirect()->route('payment.index')->with('message','Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $payment=Payment::find($id);
        $image_path = public_path('uploads/payment/' . $payment->image);    
            if(file_exists($image_path)){
                unlink($image_path);
            }else{
                
            }
        $payment->delete();
        return back()->with('error','Deleted Successfully');
    }
}
