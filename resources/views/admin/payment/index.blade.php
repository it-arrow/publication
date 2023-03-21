@extends('admin.includes.main')
@section('title')Payment -  {{ config('app.name', 'Laravel') }} @endsection
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
                            <li class="breadcrumb-item active">Payment</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Payment</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row mb-2">
            <div class="col-sm-4">
                <a href="{{route('payment.create')}}" class="btn btn-danger rounded-pill mb-3"><i class="mdi mdi-plus"></i> Add Payment Partner</a>
            </div>
            
        </div> 
        <!-- end row-->
        @if ($payments!=null)
        <div class="row">
            @foreach ($payments as $payment)
            <div class="col-md-6 col-xxl-3">
                <!-- project card -->
                <div class="card d-block">
                    <div class="card-body">
                        <div class="dropdown card-widgets">
                            <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="ri-more-fill"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a href="{{route('payment.edit',$payment->id)}}" class="dropdown-item"><i class="mdi mdi-pencil me-1"></i>Edit</a>
                                <!-- item-->
                                <form action="{{route('payment.destroy',$payment->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                <button type="submit" class="dropdown-item"><i class="mdi mdi-delete me-1"></i>Delete</button>
                                </form>
                                
                            </div>
                        </div>
                        <div id="tooltip-container" class="text-center mb-3">
                            
                            <img src="{{asset('uploads/payment/'.$payment->image)}}" class="rounded-circle" width="60px" height="60px">
                            

                        </div>
                        <!-- project title-->
                        <h4 class="mt-0">
                            <b>Partner Name:</b>
                            <a href="javascript:0" class="text-title">{{$payment->name}}</a>
                        </h4>


                        <!-- project detail-->
                        <p class="mb-1">
                            <span class="pe-2 text-nowrap mb-2 d-inline-block">
                                <b>A/C NO.:</b>
                                <b>{{$payment->account_no}}</b> 
                            </span>
                            
                        </p>
                        <p class="mb-1">
                            <span class="pe-2 text-nowrap mb-2 d-inline-block">
                                <b>A/C Name:</b>
                                <b>{{$payment->account_name}}</b> 
                            </span>
                        </p>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col -->
            @endforeach
        </div>
        <!-- end row-->
        @endif

       
        
    </div> <!-- container -->

</div> <!-- content -->

@endsection
