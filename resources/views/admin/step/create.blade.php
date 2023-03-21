@extends('admin.includes.main')

@section('title')Hiring Process -  {{ config('app.name', 'Laravel') }} @endsection
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
                            <li class="breadcrumb-item active">Add Process</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Add Process</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="text-xl-end">
                            <a href="{{route('steps.index')}}" class="btn btn-success ">View Hiring Process</a>
                        </div>
                    </div>
                    <div class="card-body">
                        @include('admin.includes.message')
                        <form action="{{route('steps.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            {{-- <div class="row">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label>Icon</label>
                                        <input type="file" class="form-control" name="icon">
                                    </div>
                                </div>
                            </div> --}}
                            <div class="row">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" class="form-control" name="title" value="{{old('title')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3">
                                    <label>Description</label>
                                    <textarea name="text" class="form-control" rows="5">{{old('text')}}</textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success btn-sm float-right mt-3">Save</button> 
                        </form>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection


