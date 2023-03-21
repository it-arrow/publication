@extends('frontend.layouts.app')
@section('title','Company Documents')
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
    Company Documents
    @endif
    
    @endslot

    @slot('sub_title')
    @if ($breadcrumb!=null)
    {{json_decode($breadcrumb->value)->sub_title}}
    @else
    Company Documents
    @endif
    
    @endslot

@endcomponent
<!--Certificate Section-->
<section class="certificate-section grey-bg">
    <div class="auto-container">
        <div class="sec-title centered">
            <h2>Company Documents</h2>
            <div class="title">Our Legal Papers</div>
            <div class="separator"></div>
        </div>
        <div class="row clearfix">
            <!--Cerficate Block-->
            @if (count($documents)>0)
                @foreach ($documents as $document)
                    <div class="cerficate-block col-md-4 col-sm-6 col-xs-12">
                        <div class="inner-box">
                            <div class="image award-image">
                                @if ($document->image!=null)
                                    @if (file_exists('uploads/documents/'.$document->image))
                                        <img src="{{ asset('uploads/documents/'.$document->image) }}" alt="{{ $document->name }}" />
                                    @else
                                        <img src="{{ asset('placeholder.jpg') }}" alt="{{ $document->name }}" />
                                    @endif
                                @else
                                    <img src="{{ asset('placeholder.jpg') }}" alt="{{ $document->name }}" />
                                @endif
                            </div>
                            <div class="lower-box">
                                <h3>{{ $document->name }}</h3>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
            


        </div>
    </div>
</section>
<!--End Certificate Section-->
@endsection