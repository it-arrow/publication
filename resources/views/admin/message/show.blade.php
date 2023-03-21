
@extends('admin.includes.main')

@section('title'){{$message->name}} -  {{ config('app.name', 'Laravel') }} @endsection
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
                            <li class="breadcrumb-item"><a href="{{route('messages.index')}}">Message</a></li>
                            <li class="breadcrumb-item active">{{$message->name}}</li>

                        </ol>
                    </div>
                    <h4 class="page-title">Message</h4>
                </div>
            </div>
        </div>
        
        <div class="row mb-3">
            <div class="text-xl-end">
                <a href="{{route('messages.index')}}" class="btn btn-success">View Messages</a>
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
                                            <h4 class="mt-1 mb-1 text-white">Name: {{$message->name}}</h4>
                                            
                                            
                                            <p class="font-16 text-white mb-0"> Email: <a href="mailto:{{$message->email}}" class="text-white" target="_blank">{{$message->email}}</a></p>
                                            <p class="font-16 text-white mb-0"> Phone Number: <a href="tel:{{$message->phone}}" class="text-white" target="_blank">{{$message->phone}}</a></p>
                                            <p class="font-16 text-white mb-0"> Subject: {{$message->subject}}</p>
                                            <p class="font-16 text-white mb-0"> Message: {{$message->message}}</p>
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


