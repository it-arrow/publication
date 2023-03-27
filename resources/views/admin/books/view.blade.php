
@extends('admin.includes.main')

@section('title'){{$book->name}} -  {{ config('app.name', 'Laravel') }} @endsection
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
                            <li class="breadcrumb-item"><a href="{{route('books.index')}}">Books</a></li>
                            <li class="breadcrumb-item active">{{$book->name}}</li>

                        </ol>
                    </div>
                    <h4 class="page-title">Book</h4>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="text-xl-end">
                <a href="{{route('books.index')}}" class="btn btn-success">View Books</a>
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
                                            <h4 class="mt-1 mb-1 text-white">Name: {{$book->name}}</h4>


                                            <p class="font-16 text-white mb-0"> Category: @if($book->category != null) {{ $book->get_category->name }} @endif</p>
                                            <p class="font-16 text-white mb-0"> Grade: @if($book->grade != null) {{ $book->get_grade->name }} @endif</p>
                                            <p class="font-16 text-white mb-0"> Author: {{ $book->author }}</p>
                                            <p class="font-16 text-white mb-0"> Year: {{ $book->year }}</p>
                                            <p class="font-16 text-white mb-0"> PDF File: {{ $book->pdf }}</p>
                                            <p class="font-16 text-white mb-0"> Access Code Required: {{ $book->access_code=='1' ? 'Required' : 'Not Required' }}</p>
                                            <p class="font-16 text-white mb-0"> Downloadable: {{ $book->downloadable=='1' ? 'Downloadable' : 'Not Downloadable' }}</p>


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


