@extends('frontend.layouts.app')
@section('title','Categories')
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
    Our Services
    @endif
    
    @endslot

    @slot('sub_title')
    @if ($breadcrumb!=null)
    {{json_decode($breadcrumb->value)->sub_title}}
    @else
    What We Do For You
    @endif
    
    @endslot

@endcomponent

<!--Services Section-->
@if (count($categories)>0)
@foreach ($categories as $category)
    
@if (count($category->services)>0)
<section class="services-section">
    <div class="auto-container">
        <h3>{{ $category->name }}</h3>
        <div class="row clearfix">
            @foreach ($category->services as $key => $service)
            <!--Services Block-->
            <div class="services-block col-md-4 col-sm-6 col-xs-12">
                <div class="inner-box">
                    <div class="image">
                        @if ($service->image!=null)
                            @if (file_exists('uploads/services/image/'.$service->image))
                                <img src="{{ asset('uploads/services/image/'.$service->image) }}" alt="{{ $service->name }}" />
                            @else
                                <img src="{{ asset('placeholder.jpg') }}" alt="{{ $service->name }}" />
                            @endif
                        @else
                            <img src="{{ asset('placeholder.jpg') }}" alt="{{ $service->name }}" />
                        @endif
                        <div class="overlay-color"></div>
                    </div>
                    <div class="lower-box">
                        <div class="content">
                            <div class="number">0{{ $key+1 }}</div>
                            <h3><a href="javascript:">{{ $service->name }}</a></h3>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
@endforeach
@endif
<!--End Services Section-->
@endsection