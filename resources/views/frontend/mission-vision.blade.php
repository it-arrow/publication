@extends('frontend.layouts.app')
@section('title','Mission & Vision')
@section('content')
<!--Page Title-->
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
    Mission & Vision
    @endif
    
    @endslot

    @slot('sub_title')
    @if ($breadcrumb!=null)
    {{json_decode($breadcrumb->value)->sub_title}}
    @else
    Our Mission & Vision
    @endif
    
    @endslot

@endcomponent
<!--End Page Title-->

<!--Services Section Three-->
<section class="services-section-three grey-bg">
    <div class="auto-container">
        <div class="row clearfix">
            <!--Services Column-->
            <div class="services-column col-md-12 col-sm-12 col-xs-12">
                <div class="row clearfix">

                    <div class="content-column col-md-6 col-sm-6 col-xs-12">
                        <h2>Our Mission</h2>
                        <div class="separator"></div>
                        <div class="text">
                            {!! $mission->mission_description !!}
                        </div>
                    </div>
                    <div class="content-column col-md-6 col-sm-6 col-xs-12">
                        <h2>Our Vision</h2>
                        <div class="separator"></div>
                        <div class="text">
                            {!! $mission->vision_description !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Services Section Three-->
@endsection