@extends('frontend.layouts.app')
@section('title','Apply Now')
@section('content')
<!--Page Title-->
<section class="page-title"
    style="background-image:linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.6)),url('{{asset("uploads/breadcrumb/".$setting->breadcrumb)}}');">
    <div class="auto-container">
        <h1>Apply Now</h1>
        <div class="title">Apply For Job</div>
    </div>
    <!--Page Info-->
    <div class="page-info">
        <div class="auto-container">
            <div class="inner-container">
                <ul class="bread-crumb">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Apply Now</li>
                </ul>
            </div>
        </div>
    </div>
    <!--End Page Info-->
</section>
<!--End Page Title-->
<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="about-job">
                    <div class="job-desc">
                        <h3>{{ $demand->position }}</h3>
                        {!! $demand->content !!}
                    </div>
                    
                </div>
            </div>
            <div class="col-md-4">
                <div class="apply-demand">
                    @if ($demand->image!=null)
                        <img src="{{ asset('uploads/demands/'.$demand->image) }}" alt="{{ $demand->position }}" class="img-fluid">
                    @else
                        <img src="{{ asset('placeholder.jpg') }}" alt="{{ $demand->position }}" class="img-fluid">
                    @endif
                </div>
                <div class="apply-now-form">
                    <h3>Apply Now</h3>
                    <form action="{{ route('career.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @include('admin.includes.message')
                        <div class="row">
                            <input type="hidden" name="position" value="{{ $demand->id }}">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="fname">Enter Your Name<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="name" placeholder="Enter Your Name"
                                name="name">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" id="email"
                                aria-describedby="email" placeholder="Enter email" name="email">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="pnum">Enter Phone Number<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="pnum" placeholder="Enter Phone Number"
                                name="phone">
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Upload Documents</label>
                                    <input type="file" class="form-control" id="exampleFormControlFile1" name="document">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button tye="submit" class="btn btn-primary">Apply Online</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection