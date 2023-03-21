@extends('admin.includes.main')

@section('title')Cost Details -  {{ config('app.name', 'Laravel') }} @endsection
@section('content')
<div class="content">
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Cost Details</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Cost Details</h4>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="text-xl-end">
                <a href="{{route('customers-order.index')}}" class="btn btn-success ">View Customer Orders</a>
            </div>
        </div>
        <form action="{{route('add-cost.store',$task->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                @include('admin.includes.message')
                <div class="col-lg-4">
                    <!-- project card -->
                    <div class="card d-block h-500">
                        <h5 class="card-title bg-primary p-3 text-light text-center">Add Extra Amount</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="mb-3">
                                    <label for="additional_amount">Extra Amount</label>
                                    <input type="number" class="form-control" name="additional_amount" id="additional_amount" value="{{old('additional_amount')}}">
                                </div>
                            
                                <div class="mb-3">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" name="description" id="description" rows="5">{{old('description')}}</textarea>
                                </div>  
                                
                            </div>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                    
                </div>
                <div class="col-lg-4" >
                    <!-- project card -->
                    <div class="card d-block h-500">
                        <h5 class="card-title bg-primary p-3 text-light text-center">Customer Pricing</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="mb-3">
                                    <label for="due_amount">Total Cost</label>
                                    <input type="text" class="form-control" name="due_amount" value="Rs. {{$task->due_amount}}" id="due_amount" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="">Total Amount Paid</label>
                                    <input type="text" class="form-control" name="" value="Rs. {{$task->paid_amount}}" id="" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="paid_amount">Payment Amount</label>
                                    <span class="text-danger"> (exclude previous paid amount)</span>
                                    <input type="number" class="form-control" name="paid_amount" value="{{old('paid_amount')}}" id="paid_amount" placeholder="Enter Payment Amount">
                                </div>
                            </div>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div>
                <div class="col-lg-4" >
                    <!-- project card -->
                    <div class="card d-block h-500">
                        <h5 class="card-title bg-primary p-3 text-light text-center">Manpower Pricing</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="mb-3">
                                    <label for="manpower_cost">Total Cost</label>
                                    <input type="text" class="form-control" name="manpower_cost" value="Rs. {{$task->manpower_cost}}" id="manpower_cost" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="">Total Amount Paid</label>
                                    <input type="text" class="form-control" name="" value="Rs. {{$task->manpower_paid_amount}}" id="" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="manpower_paid_amount">Payment Amount</label>
                                    <span class="text-danger"> (exclude previous paid amount)</span>
                                    <input type="number" class="form-control" name="manpower_paid_amount" value="{{old('manpower_paid_amount')}}" id="manpower_paid_amount" placeholder="Enter Payment Amount">
                                </div>
                            </div>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div>
            </div>
            <div class="text-xl-end">
                <button type="submit" class="btn btn-success">Save</button> 
            </div>
        </form>
        
    </div>
</div>
@endsection
