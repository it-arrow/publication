@extends('admin.includes.main')
@section('title')Add Photo -  {{ config('app.name', 'Laravel') }} @endsection
<style>
    a.active{
        background: black;
        padding:5px;
    }
</style>
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
                            <li class="breadcrumb-item active">Add Photo</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Add Photo</h4>
                </div>
            </div>
        </div>
        
        <div class="col-12 mb-3">
            <div class="text-xl-end">
                <a href="{{route('photo.index')}}" class="btn btn-success">View Photos</a>
            </div>
            {{-- @include('admin.includes.message') --}}
        </div>
        <div class="card">
            <div class="card-body pt-0">
                @include('admin.includes.message')
                    @if (Route::is('photo.create'))
                        <div class="panel">
                            <div class="panel-body">
                                <form action="{{route('upload_photo')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mt-2">
                                        <div class="col-md-12">
                                            <input type="file" name="photos[]" multiple>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success mt-2">Save</button>
                                </form>
                            </div>
                        </div>
                    @endif
            </div> 
        </div>  
        
        <!-- end row-->

    </div> <!-- container -->
</div>
    {{-- <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            @if (Route::is('photo.create'))
                                <h3 class="card-title">Add Photos</h3>
                                <a href="{{route('photo.index')}}" class="btn btn-success btn-sm float-right">View Photo Gallery</a>
                            @endif
                        </div>
                        <div class="card-body pt-0">
                            @include('admin.includes.message')
                                @if (Route::is('photo.create'))
                                    <div class="panel">
                                        <div class="panel-body">
                                            <form action="{{route('upload_photo')}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row mt-2">
                                                    <div class="col-md-12">
                                                        <input type="file" name="photos[]" multiple>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-success mt-2">Save</button>
                                            </form>
                                        </div>
                                    </div>
                                @endif
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </section>
</div> --}}
@endsection


