@extends('admin.includes.main')
@section('title')Customer Order -  {{ config('app.name', 'Laravel') }} @endsection
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
                            <li class="breadcrumb-item active"><a href="{{route('customers-order.index')}}">Customer Order</a></li>

                        </ol>
                    </div>
                    <h4 class="page-title">Customer Order</h4>
                </div>
            </div>
        </div>
        
        <div class="row mb-3">
            <div class="text-xl-end">
                <a href="{{route('customers-order.index')}}" class="btn btn-success">View All Customer Orders</a>
            </div>
            @include('admin.includes.message')
        </div>
        <div class="row">
            <div class="col-sm-12">
                <!-- Profile -->
                <div class="card bg-primary">
                    <div class="card-body profile-user-box">
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="row align-items-center">
                                    
                                    <div class="col">
                                        <div>
                                            <h4 class="mt-1 mb-1 text-white">Name: {{$task->customer->name}}</h4>
                                            
                                            <h4 class="mt-1 mb-1 text-white">Contact Info:</h4>
                                            <p class="font-16 text-white mb-0"> Email: <a href="mailto:{{$task->customer->email}}" class="text-white" target="_blank">{{$task->customer->email}}</a></p>
                                            <p class="font-16 text-white mb-0"> Mobile: <a href="tel:{{$task->customer->mobile_no}}" class="text-white" target="_blank">{{$task->customer->mobile_no}}</a></p>
                                            
                                            @if ($task->customer->landline_no!=null)
                                            <p class="font-16 text-white mb-0"> Landline: <a href="tel:{{$task->customer->landline_no}}" class="text-white" target="_blank">{{$task->customer->landline_no}}</a></p>
                                            @endif

                                            <p class="font-16 text-white mb-0"> Address: <a class="text-white">{{$task->address}}, {{$task->city->name}}, {{$task->district->name}}</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col-->

                            {{-- <div class="col-sm-4">
                                <div class="text-center mt-sm-0 mt-3 text-sm-end">
                                    <a href="{{route('tasks.edit',$task->id)}}" class="btn btn-light">
                                        <i class="mdi mdi-account-edit me-1"></i> Edit Customer Order
                                    </a>
                                </div>
                            </div> <!-- end col--> --}}
                        </div> <!-- end row -->

                    </div> <!-- end card-body/ profile-user-box-->
                </div><!--end profile/ card -->
            </div> <!-- end col-->
        </div>
        <!-- end row -->


        <div class="row">
            <div class="col-xl-4">
                <!-- Personal-Information -->
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mt-0 mb-3">Pricing</h4>

                        <div class="text-start">
                            <p class="text-muted"><strong>Total Amount :</strong> <span class="ms-2">Rs. {{$task->due_amount}}</span></p>

                            <p class="text-muted"><strong>Additional Amount :</strong> <span class="ms-2">Rs. {{$task->additional_amount}}</span></p> 
                            <p class="text-muted"><strong>Description:</strong> <span class="ms-2">{{$task->description}}</span></p> 
                            <hr>
                            <p class="text-muted"><strong>Grand Total :</strong> <span class="ms-2">Rs. {{$task->due_amount+$task->additional_amount}}</span></p>

                            <p class="text-muted"><strong>Paid Amount :</strong> <span class="ms-2">Rs. {{$task->paid_amount}}</span></p>

                            <p class="text-muted"><strong>Due Amount :</strong> <span class="ms-2">Rs. {{($task->due_amount+$task->additional_amount)-$task->paid_amount}}</span></p>

                        </div>
                    </div>
                </div>
                <!-- Personal-Information -->

            </div> <!-- end col-->

            <div class="col-xl-8">

                <!-- Chart-->
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-3">Service Info</h4>
                        <div class="text-start">
                            <p class="text-muted"><strong>Service Name:</strong> <span class="ms-2">{{$task->service->name}}</span></p>

                            <p class="text-muted"><strong>Date:</strong> <span class="ms-2">{{date('d F Y',strtotime($task->date))}}</span></p>

                            <p class="text-muted"><strong>Time:</strong> <span class="ms-2">{{date('h:i A',strtotime($task->date))}}</span></p>
                            <p class="text-muted"><strong>Status:</strong> <span class="ms-2">pending</span></p>
                        </div>    
                    </div>
                </div>
                <!-- End Chart-->

                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-3">Assigned Manpower Info</h4>
                        <div class="text-start">
                            @if ($task->manpower!=null)
                                <p class="text-muted"><strong>Category :</strong> <span class="ms-2">{{$task->manpower->categoryName->name}}</span></p>
                                <p class="text-muted"><strong>Sub Category :</strong> 
                                    @if ($task->manpower->sub_category!=null)
                                        
                                    <span class="ms-2">{{$task->manpower->sub_category->name}}</span>
                                    @endif
                                </p>
                                <p class="text-muted"><strong>Name :</strong> <span class="ms-2">{{$task->manpower->name}}</span></p>
                            @else
                                <p class="text-muted"><span class="ms-2">Not Assigned yet</span></p>
                            @endif
                        </div>    
                    </div>
                </div>


            </div>
            <!-- end col -->

        </div>
    </div> <!-- container -->
</div> <!-- content -->

@endsection
