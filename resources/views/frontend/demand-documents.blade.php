@extends('frontend.layouts.app')
@section('title','Demand Documents')
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
    Demand Documents
    @endif
    
    @endslot

    @slot('sub_title')
    @if ($breadcrumb!=null)
    {{json_decode($breadcrumb->value)->sub_title}}
    @else
    Demand Documents
    @endif
    
    @endslot

@endcomponent
<section class="section-padding">
    <div class="container">
        <div class="row">
            @foreach ($documents as $document)
            <div class="col-md-6">
                <div class="documents-required-section">
                    <h4>{{ $document->title }}</h4>
                    {!! $document->content !!}
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection