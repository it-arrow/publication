@extends('frontend.layouts.app')
@section('title','Our Strength')

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
    Strength
    @endif
    
    @endslot

    @slot('sub_title')
    @if ($breadcrumb!=null)
    {{json_decode($breadcrumb->value)->sub_title}}
    @else
    Our Strength
    @endif
    
    @endslot

@endcomponent

<!--Services Section Three-->
<section class="section-padding">
    <div class="container">
        <div class="row">
            @if (count($strengths)>0)
            @foreach ($strengths as $strength)
            <div class="col-md-4">
                <div class="sub-page-topics">
                    <h3><a href="{{ route('strength.detail',$strength->slug) }}">{{ $strength->title }}</a></h3>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</section>
<!--End Services Section Three-->
@endsection