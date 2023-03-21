
@extends('admin.includes.main')

@section('title'){{$career->name}} -  {{ config('app.name', 'Laravel') }} @endsection
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
                            <li class="breadcrumb-item"><a href="{{route('career.index')}}">Careers</a></li>
                            <li class="breadcrumb-item active">{{$career->name}}</li>

                        </ol>
                    </div>
                    <h4 class="page-title">Carrer</h4>
                </div>
            </div>
        </div>
        
        <div class="row mb-3">
            <div class="text-xl-end">
                <a href="{{route('career.index')}}" class="btn btn-success">View Careers</a>
            </div>
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
                                            <h4 class="mt-1 mb-1 text-white">Name: {{$career->name}}</h4>
                                            
                                            
                                            <p class="font-16 text-white mb-0"> Email: <a href="mailto:{{$career->email}}" class="text-white" target="_blank">{{$career->email}}</a></p>
                                            <p class="font-16 text-white mb-0"> Phone Number: <a href="tel:{{$career->phone}}" class="text-white" target="_blank">{{$career->phone}}</a></p>
                                            @if($career->position_id!=null)<p class="font-16 text-white mb-0"> Position: {{App\Models\CurrentDemand::find($career->position_id)->position}}</p>@endif
                                            @if($career->document!=null)<p class="font-16 text-white mb-0"> Document: <a href="{{ asset('uploads/carrer/'.$career->document) }}" class="text-light">{{ $career->document }}(click to download)</a></p>@endif
                                            <p class="font-16 text-white mb-0"> Subject: {{$career->subject}}</p>
                                            <p class="font-16 text-white mb-0"> Message: {{$career->message}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col-->

                        </div> <!-- end row -->

                    </div> <!-- end card-body/ profile-user-box-->
                </div><!--end profile/ card -->
            </div> <!-- end col-->
        </div>
        <!-- end row -->

    </div> <!-- container -->
</div> <!-- content -->

@endsection


