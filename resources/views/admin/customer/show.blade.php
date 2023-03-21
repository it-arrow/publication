@extends('admin.includes.main')
@section('title')Customer -  {{ config('app.name', 'Laravel') }} @endsection

@section('content')
<style>
    .dataTables_wrapper {
        overflow-x: scroll !important;
    }
</style>
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
                            <li class="breadcrumb-item"><a href="{{route('customers.index')}}">Customers</a></li>
                            <li class="breadcrumb-item active">{{$customer->name}}</li>

                        </ol>
                    </div>
                    <h4 class="page-title">Customer</h4>
                </div>
            </div>
        </div>
        
        <div class="row mb-3">
            <div class="text-xl-end">
                <a href="{{route('customers.index')}}" class="btn btn-success">View All Customer</a>
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
                                            <h4 class="mt-1 mb-1 text-white">Name: {{$customer->name}}</h4>
                                            
                                            <h4 class="mt-1 mb-1 text-white">Contact Info:</h4>
                                            <p class="font-16 text-white mb-0"> Email: <a href="mailto:{{$customer->email}}" class="text-white" target="_blank">{{$customer->email}}</a></p>
                                            <p class="font-16 text-white mb-0"> Mobile: <a href="tel:{{$customer->mobile_no}}" class="text-white" target="_blank">{{$customer->mobile_no}}</a></p>
                                            
                                            @if ($customer->landline_no!=null)
                                            <p class="font-16 text-white mb-0"> Landline: <a href="tel:{{$customer->landline_no}}" class="text-white" target="_blank">{{$customer->landline_no}}</a></p>
                                            @endif

                                            <p class="font-16 text-white mb-0"> Address: <a class="text-white">{{$customer->address}}, {{$customer->city->name}}, {{$customer->district->name}}</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col-->

                            <div class="col-sm-4">
                                <div class="text-center mt-sm-0 mt-3 text-sm-end">
                                    <a href="{{route('customers.edit',$customer->id)}}" class="btn btn-light">
                                        <i class="mdi mdi-account-edit me-1"></i> Edit Customer
                                    </a>
                                </div>
                            </div> <!-- end col-->
                        </div> <!-- end row -->

                    </div> <!-- end card-body/ profile-user-box-->
                </div><!--end profile/ card -->
            </div> <!-- end col-->
        </div>
        <!-- end row -->


        <div class="row">
            <div class="col-xl-3">
                <!-- Personal-Information -->
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mt-0 mb-3">Pricing</h4>

                        <div class="text-start">
                            <p class="text-muted"><strong>Total Amount :</strong> <span class="ms-2">Rs. {{$customer->due_amount}}</span></p>

                            {{-- <p class="text-muted"><strong>Additional Amount :</strong> <span class="ms-2">Rs. {{$customer->additional_amount}}</span></p> --}}

                            <p class="text-muted"><strong>Paid Amount :</strong> <span class="ms-2">Rs. {{$customer->paid_amount}}</span></p>

                            <p class="text-muted"><strong>Due Amount :</strong> <span class="ms-2">Rs. {{($customer->due_amount)-$customer->paid_amount}}</span></p>

                        </div>
                    </div>
                </div>
                <!-- Personal-Information -->

            </div> <!-- end col-->

            <div class="col-xl-9">

                <table id="basic-datatable" class="table nowrap w-100">
                    <thead>
                        <tr>
                            <th> # </th>
                            <th>Service</th>
                            <th>Cost</th>
                            <th>Manpower</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                
                    <tbody>
                        @if(count($customer->orders)>0)
                        @foreach ($customer->orders as $order) 
                        <tr>
                            <td> {{$loop->iteration}} </td>
                            <td>{{$order->service->name}}</td>
                            <td>Rs. {{$order->due_amount + $order->additional_amount}}</td>
                            <td>{{$order->manpower ? $order->manpower->name : 'Not Assigned'}}</td>
                            <td>
                                @if ($order->status=='Completed')
                                <span class="badge bg-success"> {{$order->status}}</span></td>
                                @elseif($order->status=='In Progress')
                                <span class="badge bg-warning"> {{$order->status}}</span></td>
                                @elseif($order->status=='Assigned')
                                <span class="badge bg-primary"> {{$order->status}}</span></td>
                                @else
                                <span class="badge bg-danger"> {{$order->status}}</span></td>
                                @endif
                            </td>
        
                        </tr>
                        
                        @endforeach
                    
                    @endif
                    </tbody>
                </table>
            </div>
            <!-- end col -->

        </div>
    </div> <!-- container -->
</div> <!-- content -->

@endsection
