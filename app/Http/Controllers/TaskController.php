<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use App\Models\District;
use App\Models\Manpower;
use App\Models\PaymentHistory;
use App\Models\Service;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Route::is('customers-order.index')){
            $tasks=Task::orderBy('date','ASC')->get();
        }elseif(Route::is('customers-order.pending')){
            $tasks=Task::orderBy('date','ASC')->where('status','pending')->get();
        }elseif(Route::is('customers-order.assigned')){
            $tasks=Task::orderBy('date','ASC')->where('status','assigned')->get();
        }elseif(Route::is('customers-order.progress')){
            $tasks=Task::orderBy('date','ASC')->where('status','in progress')->get();
        }elseif(Route::is('customers-order.completed')){
            $tasks=Task::orderBy('date','ASC')->where('status','completed')->get();
        }
        $categories=Category::all();
        return view('admin.tasks.index',compact('tasks','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services=Service::all();
        $customers=Customer::all();
        $categories=Category::all();
        $districts=District::all();
        return view('admin.tasks.create',compact('services','categories','customers','districts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->choose_address==0){
            $request->validate([
                'customer_id'=>'required',
                'service_id'=>'required',
                'date'=>'required',
                // 'manpower_id'=>'required',
                'due_amount'=>'required|numeric',
                'paid_amout'=>'numeric',
                'additional_amout'=>'numeric',
            ]);
        }else{
            $request->validate([
                'customer_id'=>'required',
                'district_id'=>'required',
                'city_id'=>'required',
                'address'=>'required|string|max:255',
                'service_id'=>'required',
                'date'=>'required',
                // 'manpower_id'=>'required',
                'due_amount'=>'required|numeric',
                'paid_amout'=>'numeric',
                'additional_amout'=>'numeric',
            ]);
        }
        // dd($request->all());
        $task=new Task();
        

        $task->customer_id=$request->customer_id;
        if ($request->choose_address==0) {
            $customer=Customer::where('id',$request->customer_id)->first();
            $task->district_id=$customer->district_id;
            $task->city_id=$customer->city_id;
            $task->address=$customer->address;
        } else {
            $task->district_id=$request->district_id;
            $task->city_id=$request->city_id;
            $task->address=$request->address;
        }
        

        $task->service_id=$request->service_id;
        $task->date=$request->date;
        // $task->manpower_id=$request->manpower_id;
        $task->due_amount=$request->due_amount;
        $task->paid_amount=$request->paid_amount;
        $task->status='Pending';
        if($task->save()){
            $customer=Customer::where('id',$request->customer_id)->first();
            $customer->due_amount=$customer->due_amount+$request->due_amount;
            $customer->paid_amount=$customer->paid_amount+$request->paid_amount;
            $customer->update();
            if($request->paid_amount > 0){
                $payment=new PaymentHistory();
                $payment->customer_id=$request->customer_id;
                $payment->payment_amount=$request->paid_amount;
                $payment->task_id=$task->id;
                $payment->save();
            }
            return redirect()->route('customers-order.index')->with('message','Placed Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task=Task::find($id);
        return view('admin.tasks.show',compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task=Task::find($id);
        $services=Service::all();
        $customers=Customer::all();
        $categories=Category::all();
        $districts=District::all();
        return view('admin.tasks.edit',compact('task','customers','categories','districts','services'));
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
            'customer_id'=>'required',
            'district_id'=>'required',
            'city_id'=>'required',
            'address'=>'required|string|max:255',
            'service_id'=>'required',
            'date'=>'required',
            'manpower_id'=>'required',
            'due_amount'=>'required|numeric',
            'paid_amout'=>'numeric',
            'additional_amout'=>'numeric',

        ]);
        $task=Task::find($id);
        $task->customer_id=$request->customer_id;
        $task->district_id=$request->district_id;
        $task->city_id=$request->city_id;
        $task->address=$request->address;
        $task->service_id=$request->service_id;
        $task->date=$request->date;
        $task->manpower_id=$request->manpower_id;
        $task->due_amount=$request->due_amount+$request->additional_amount;
        $task->paid_amount=$request->paid_amount;
        $task->additional_amount=$request->additional_amount;
        if($task->update()){
            $customer=Customer::where('id',$request->customer_id)->first();
            $customer->due_amount=$customer->due_amount+$request->due_amount+$request->additional_amount;
            $customer->paid_amount=$customer->paid_amount+$request->paid_amount;
            $customer->update();
            return redirect()->route('customers-order.index')->with('message','Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Task::find($id)->delete();
        return back()->with('error','Deleted Successfully');
    }
    public function get_number_by_customer(Request $request)
    {
        // $customer=Customer::where('id',$request->customer_id)->select('mobile_no')->first();
        $customer=Customer::where('id',$request->customer_id)->first();

        // return $customer->mobile_no;
        return response([
            'mobile_no'=>$customer->mobile_no,
            'district'=>$customer->district->name,
            'city'=>$customer->city->name,
            'address'=>$customer->address
        ]);

    }
    public function add_extra_cost($id){
        $task=Task::find($id);
        return view('admin.tasks.add-cost',compact('task'));
    }
    public function store_extra_cost(Request $request,$id){
        
        $request->validate([
            'additional_amount'=>'nullable|numeric',
            'description'=>'nullable|string|max:255',
            'paid_amount'=>'nullable|numeric',
            'manpower_paid_amount'=>'nullable|numeric'
        ]);
        $order=Task::find($id);
        $order->additional_amount=$request->additional_amount;
        $order->description=$request->description;
        $order->due_amount=$order->due_amount + $request->additional_amount;
        $order->paid_amount=$order->paid_amount + $request->paid_amount;
        $order->manpower_paid_amount=$order->manpower_paid_amount + $request->manpower_paid_amount;
        if($order->update()){
            $customer=Customer::where('id',$order->customer_id)->first();
            $customer->due_amount=$customer->due_amount+$request->additional_amount;
            $customer->paid_amount=$customer->paid_amount+$request->paid_amount;
            $customer->update();
            $manpower=Manpower::where('id',$order->manpower_id)->first();
            $manpower->paid_amount += $request->manpower_paid_amount;
            $manpower->due_amount -= $request->manpower_paid_amount;
            $manpower->update();
            if($request->paid_amount > 0){
                $payment=new PaymentHistory();
                $payment->customer_id=$order->customer_id;
                $payment->payment_amount=$request->paid_amount;
                $payment->task_id=$order->id;
                $payment->save();
            }
            if($request->manpower_paid_amount > 0){
                $payment=new PaymentHistory();
                $payment->manpower_id=$order->manpower_id;
                $payment->payment_amount=$request->manpower_paid_amount;
                $payment->task_id=$order->id;
                $payment->save();
            }
            
            return redirect()->route('customers-order.index')->with('message','Added Successfully');
        }
    }
    public function assign_manpower_modal(Request $request){
        $task=Task::find($request->id);
        $categories=Category::all();
        return view('admin.tasks.assign-manpower',compact('task','categories'));
    }
    public function assign_manpower(Request $request,$id){
        $task=Task::find($id);
        $task->manpower_id=$request->manpower_id;
        $task->manpower_cost=$request->manpower_cost;
        $task->status='Assigned';
        if($task->update()){
            $manpower=Manpower::where('id',$request->manpower_id)->first();
            $manpower->total_amount=$manpower->total_amount + $request->manpower_cost;
            $manpower->due_amount=$manpower->due_amount + $request->manpower_cost;
            $manpower->update();
            return back()->with('message','Assigned Successfully');
        }
    }
    public function change_status(Request $request,$id){
        $task=Task::find($id);
        $task->status=$request->status;
        $task->update();
        return back()->with('message','Status Updated Successfully');
    }
}
