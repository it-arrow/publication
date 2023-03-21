@extends('admin.includes.main')

@section('title')Enquiry Section -  {{ config('app.name', 'Laravel') }} @endsection
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
                            <li class="breadcrumb-item active">Enquiry Section</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Enquiry Section</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    
                    <div class="card-body">
                        @include('admin.includes.message')
                        <form action="{{route('enquiry.update',$enquiry->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <input type="hidden" value="enquiry" name="section">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control" name="title" value="{{old('title',json_decode($enquiry->value)->title)}}" >
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="text">Text</label>
                                        <input type="text" class="form-control" name="text" value="{{old('text',json_decode($enquiry->value)->text)}}">
                                    </div>
                                </div>
                            </div>
                            
                             
                            <div class="text-xl-end">
                                <button type="submit" class="btn btn-success">Save</button> 
                            </div>
                        </form>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



