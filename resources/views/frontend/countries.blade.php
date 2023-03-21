@extends('frontend.layouts.app')
@section('title','Countries We Serve')
@section('content')
<!--Page Title-->
<section class="page-title"
    style="background-image:linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.6)),url('uploads/breadcrumb/{{$setting->breadcrumb}}');">
    <div class="auto-container">
        <h1>Countries</h1>
        <div class="title">Countries We Serve</div>
    </div>
    <!--Page Info-->
    <div class="page-info">
        <div class="auto-container">
            <div class="inner-container">
                <ul class="bread-crumb">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Countries</li>
                </ul>
            </div>
        </div>
    </div>
    <!--End Page Info-->
</section>
<!--End Page Title-->
@if (count($countries)>0)
<section class="services-section">
    <div class="auto-container">
        <!--Sec Title-->
        <div class="sec-title centered">
            <h2>Countries We Serve</h2>
            <div class="title">What We Do For You</div>
            <div class="separator"></div>
        </div>
        <div class="row clearfix">
            @foreach ($countries as $key => $country)
                <!--Services Block-->
                <div class="services-block col-md-4 col-sm-6 col-xs-12">
                    <div class="inner-box">
                        <div class="image">
                            @if (file_exists('uploads/country/'.$country->image))
                                <img src="{{ asset('uploads/country/'.$country->image) }}" alt="{{ $country->name }}" />
                            @else
                                <img src="{{ asset('placeholder.jpg') }}" alt="{{ $country->name }}" />
                            @endif
                            <div class="overlay-color"></div>
                        </div>
                        <div class="lower-box">
                            <div class="content">
                                <div class="number">0{{ $key+1 }}</div>
                                <h3>{{ $country->name }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            

        </div>

        {{-- <div class="text-center">
            <a href="javascript:" class="theme-btn btn-style-three">View All Countries</a>
        </div> --}}

    </div>
</section>
@endif
@endsection