@extends('frontend.layouts.app')
@section('title','Organization Chart')

@section('content')
>

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
    Organization's Chart
    @endif
    
    @endslot

    @slot('sub_title')
    @if ($breadcrumb!=null)
    {{json_decode($breadcrumb->value)->sub_title}}
    @else
    Know About The Organization
    @endif
    
    @endslot

@endcomponent
<section class="section-padding">
    <div class="container">
        <div class="organization-chart-image">
            @if ($chart->organization_chart!=null)
                @if (file_exists('uploads/about/chart/'.$chart->organization_chart))
                    <img src="{{ asset('uploads/about/chart/'.$chart->organization_chart) }}" class="img-fluid" alt="Organization Chart" />
                @else
                    <img src="{{ asset('placeholder.jpg') }}" class="img-fluid" alt="Organization Chart" />
                @endif
            @else
                <img src="{{ asset('placeholder.jpg') }}" class="img-fluid" alt="Organization Chart" />
            @endif
        </div>
    </div>
</section>
@endsection