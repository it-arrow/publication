@extends('frontend.layouts.app')
@section('title','Awards')
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
    Award
    @endif
    
    @endslot

    @slot('sub_title')
    @if ($breadcrumb!=null)
    {{json_decode($breadcrumb->value)->sub_title}}
    @else
    Our Achievement
    @endif
    
    @endslot

@endcomponent
<!--End Page Title-->
<!--Certificate Section-->
<section class="certificate-section grey-bg">
    <div class="auto-container">
        <div class="sec-title centered">
            <h2>Our Awards</h2>
            <div class="title">What We Achived</div>
            <div class="separator"></div>
        </div>
        <div class="row clearfix">
            @foreach ($awards as $award)
            <!--Cerficate Block-->
            <div class="cerficate-block col-md-4 col-sm-6 col-xs-12">
                <div class="inner-box">
                    <div class="image award-image">
                        @if ($award->image!=null)
                            @if (file_exists('uploads/award/'.$award->image))
                                <img src="{{ asset('uploads/award/'.$award->image) }}" alt="our achievement" />
                            @else
                                <img src="{{ asset('placeholder.jpg') }}" alt="our achievement" />
                            @endif
                        @else
                            <img src="{{ asset('placeholder.jpg') }}" alt="our achievement" />
                        @endif
                    </div>
                    {{-- <div class="lower-box">
                        <h3>International Organization for Standardization</h3>
                    </div> --}}
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!--End Certificate Section-->
@endsection