@extends('frontend.layouts.app')
@section('title',$policy->policy_name)
@section('content')
<!--Page Title-->
@component('components.breadcrumb')    

    @slot('image_path')
    @if ($breadcrumb!=null)
        @if (json_decode($breadcrumb->value)->breadcrumb_image)
        {{asset("uploads/breadcrumb/".json_decode($breadcrumb->value)->breadcrumb_image)}}
        @else
        {{asset("uploads/breadcrumb/".$setting->breadcrumb)}}
        @endif
    
    @else
    {{asset("uploads/breadcrumb/".$setting->breadcrumb)}}
    @endif
    @endslot
    @slot('page_title')
    @if ($breadcrumb!=null)
    {{json_decode($breadcrumb->value)->page_title}}
    @else
    Our Policy
    @endif
    
    @endslot

    @slot('sub_title')
    @if ($breadcrumb!=null)
    {{json_decode($breadcrumb->value)->sub_title}}
    @else
    {{$policy->policy_name}}
    @endif
    
    @endslot

@endcomponent

<section class="section-padding">
    <div class="container">
        <div class="text-section">
            {!! $policy->content !!}
        </div>
    </div>
</section>
@endsection