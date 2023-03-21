@extends('admin.includes.main')
@section('title')Manpower -  {{ config('app.name', 'Laravel') }} @endsection
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
                            <li class="breadcrumb-item"><a href="{{route('manpowers.index')}}">Manpowers</a></li>
                            <li class="breadcrumb-item active">{{$manpower->name}}</li>

                        </ol>
                    </div>
                    <h4 class="page-title">Manpower</h4>
                </div>
            </div>
        </div>
        
        <div class="row mb-3">
            <div class="text-xl-end">
                <a href="{{route('manpowers.index')}}" class="btn btn-success">View Manpower</a>
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
                                            <h4 class="mt-1 mb-1 text-white">Name: {{$manpower->name}}</h4>
                                            <h4 class="mt-1 mb-1 text-white">Citizenship No.: {{$manpower->citizenship_no}}</h4>
                                            <h4 class="mt-1 mb-1 text-white">Pan No.: {{$manpower->pan_no}}</h4>
                                            
                                            <h4 class="mt-1 mb-1 text-white">Contact Info:</h4>
                                            <p class="font-16 text-white mb-0"> Email: <a href="mailto:{{$manpower->email}}" class="text-white" target="_blank">{{$manpower->email}}</a></p>
                                            <p class="font-16 text-white mb-0"> Primary Mobile: <a href="tel:{{$manpower->primary_phone}}" class="text-white" target="_blank">{{$manpower->primary_phone}}</a></p>
                                            @if ($manpower->secondary_phone!=null)
                                            <p class="font-16 text-white mb-0"> Secondary Mobile: <a href="tel:{{$manpower->secondary_phone}}" class="text-white" target="_blank">{{$manpower->secondary_phone}}</a></p>
                                            @endif
                                            @if ($manpower->landline_no!=null)
                                            <p class="font-16 text-white mb-0"> Landline: <a href="tel:{{$manpower->landline_no}}" class="text-white" target="_blank">{{$manpower->landline_no}}</a></p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col-->

                            <div class="col-sm-4">
                                <div class="text-center mt-sm-0 mt-3 text-sm-end">
                                    <a href="{{route('manpowers.edit',$manpower->id)}}" class="btn btn-light">
                                        <i class="mdi mdi-account-edit me-1"></i> Edit Profile
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
            <div class="col-lg-4">
                <!-- Personal-Information -->
                <div class="card h-500">
                    <div class="card-body">
                        <h4 class="header-title mt-0 mb-3">Skill</h4>

                        <div class="text-start">
                            <p class="text-muted"><strong>Category :</strong> <span class="ms-2">{{$manpower->categoryName->name}}</span></p>
                            @if ($manpower->sub_category!=null)
                                <p class="text-muted"><strong>Sub Category :</strong><span class="ms-2">{{$manpower->sub_category->name}}</span></p>
                            @endif
                            <p class="text-muted"><strong>Skill :</strong> <span class="ms-2">{{$manpower->skill}}</span></p>

                        </div>
                    </div>
                </div>
                <!-- Personal-Information -->

            </div> <!-- end col-->

            <div class="col-lg-4">

                <!-- Chart-->
                <div class="card h-500">
                    <div class="card-body">
                        <h4 class="header-title mb-3">Permanent Address</h4>
                        <div class="text-start">
                            <p class="text-muted"><strong>District :</strong> <span class="ms-2">{{$manpower->p_district_detail->name}}</span></p>

                            <p class="text-muted"><strong>City :</strong><span class="ms-2">{{$manpower->p_city_detail->name}}</span></p>

                            <p class="text-muted"><strong>Street Address :</strong> <span class="ms-2">{{$manpower->p_address}}</span></p>

                        </div>
                        <h4 class="header-title mb-3">Temporary Address</h4>
                        <div class="text-start">
                            <p class="text-muted"><strong>District :</strong> <span class="ms-2">{{$manpower->district_detail->name}}</span></p>

                            <p class="text-muted"><strong>City :</strong><span class="ms-2">{{$manpower->city_detail->name}}</span></p>

                            <p class="text-muted"><strong>Street Address :</strong> <span class="ms-2">{{$manpower->address}}</span></p>

                        </div>    
                    </div>
                </div>
                <!-- End Chart-->

                


            </div>
            <!-- end col -->
            <div class="col-lg-4">

                <!-- Chart-->
                <div class="card h-500">
                    <div class="card-body">
                        <h4 class="header-title mb-3">Project Info</h4>
                        <div class="text-start">
                            <p class="text-muted"><strong>Total Projects :</strong> <span class="ms-2">{{count($manpower->task)}}</span></p>

                            <p class="text-muted"><strong>Completed :</strong><span class="ms-2">{{count($manpower->task->where('status','Completed'))}}</span></p>

                            <p class="text-muted"><strong>Work In Progress :</strong> <span class="ms-2">{{count($manpower->task->where('status','In Progress'))}}</span></p>

                            <p class="text-muted"><strong>Assigned :</strong> <span class="ms-2">{{count($manpower->task->where('status','Assigned'))}}</span></p>

                            <p class="text-muted"><strong>Pending :</strong> <span class="ms-2">{{count($manpower->task->where('status','Pending'))}}</span></p>

                        </div>    
                    </div>
                </div>
                <!-- End Chart-->

                


            </div>

        </div>
        <table id="basic-datatable" class="table nowrap w-100">
            <thead>
                <tr>
                    <th> # </th>
                    <th>Service</th>
                    <th>Cost</th>
                    <th>Customer</th>
                    <th>Status</th>
                </tr>
            </thead>
        
            <tbody>
                @if(count($manpower->task)>0)
                @foreach ($manpower->task as $order) 
                <tr>
                    <td> {{$loop->iteration}} </td>
                    <td>{{$order->service->name}}</td>
                    <td>Rs. {{$order->manpower_cost}}</td>
                    <td>{{$order->customer->name}}</td>
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
    </div> <!-- container -->
</div> <!-- content -->

@endsection
