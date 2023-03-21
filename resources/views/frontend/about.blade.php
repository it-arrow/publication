@extends('frontend.layouts.app')
@section('title','About Us')

@section('content')
@component('components.breadcrumb')    

    @slot('image_path')
    @if ($breadcrumb!=null)
        @if (json_decode($breadcrumb->value)->breadcrumb_image)
        uploads/breadcrumb/{{json_decode($breadcrumb->value)->breadcrumb_image}}
        @else
        uploads/breadcrumb/{{$setting->breadcrumb}}
        @endif
    
    @else
    uploads/breadcrumb/{{$setting->breadcrumb}}
    @endif
    @endslot
    @slot('page_title')
    @if ($breadcrumb!=null)
    {{json_decode($breadcrumb->value)->page_title}}
    @else
    About Us
    @endif
    
    @endslot

    @slot('sub_title')
    @if ($breadcrumb!=null)
    {{json_decode($breadcrumb->value)->sub_title}}
    @else
    Know Who We Are
    @endif
    
    @endslot

@endcomponent

<!--About Section-->
<div class="about-section style-two">
    <div class="auto-container">
        <div class="row clearfix">
            <!--Carousel Column-->
            <div class="carousel-column col-md-6 col-sm-12 col-xs-12">
                <div class="image">
                    @if ($about->about_image!=null)
                        @if (file_exists('uploads/about/'.$about->about_image))
                            <img src="{{ asset('uploads/about/'.$about->about_image) }}" alt="{{ $setting->site_name }}" />
                        @else
                            <img src="{{ asset('placeholder.jpg') }}" alt="{{ $setting->site_name }}" />
                        @endif
                    @else
                        <img src="{{ asset('placeholder.jpg') }}" alt="{{ $setting->site_name }}" />
                    @endif
                </div>
                <div class="about-the-company">
                    <!--INFO BLOCK-->
                    <div class="company-info">
                        <div class="about-heading">
                            <h4>Name of The Company</h4>
                        </div>
                        <div class="sub-heading">
                            <p>{{ $setting->site_name }}</p>
                        </div>
                    </div>
                    <!--INFO BLOCK-->
                    <div class="company-info">
                        <div class="about-heading">
                            <h4>Certification & Registration Company Registration No.</h4>
                        </div>
                        <div class="sub-heading">
                            <p>{!! $about->registration !!}</p>
                        </div>
                    </div>
                    <div class="company-info">
                        <div class="about-heading">
                            <h4>Ministry of Labour Department of Foreign Employment License No.</h4>
                        </div>
                        <div class="sub-heading">
                            {!! $about->labour_department !!}​​​​​​​
                        </div>
                    </div>
                    <div class="company-info">
                        <div class="about-heading">
                            <h4>Chairman</h4>
                        </div>
                        <div class="sub-heading">
                            <p>{{ $about->chairman }}​</p>
                        </div>
                    </div>
                    <div class="company-info">
                        <div class="about-heading">
                            <h4>Member</h4>
                        </div>
                        <div class="sub-heading">
                            {!! $about->member !!}
                        </div>
                    </div>
                    <div class="company-info">
                        <div class="about-heading">
                            <h4>Capital Structure</h4>
                        </div>
                        <div class="sub-heading">
                            {!! $about->capital !!}
                        </div>
                    </div>
                </div>
            </div>
            <!--Content Column-->
            <div class="content-column col-md-6 col-sm-12 col-xs-12">
                <div class="inner-column">
                    <h3>{!! $about->title !!}</h3>
                    <div class="text">{!! $about->about_content !!}</div>
                </div>
            </div>
        </div>
        
    </div>
</div>
<!--End About Section-->
@endsection