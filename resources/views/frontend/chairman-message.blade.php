@extends('frontend.layouts.app')
@section('title','Message From Chairman')

@section('content')
<style>
    .chairman-message-text h3{  
        color: var(--secondary-color);
        font-weight: 600;
    }
    .chairman-message-text h5 {
        color: #2e2e2e;
        font-weight: 600;
    }
</style>
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
    Message From Chairman
    @endif
    
    @endslot

    @slot('sub_title')
    @if ($breadcrumb!=null)
    {{json_decode($breadcrumb->value)->sub_title}}
    @else
    What Our Chairman Has To Say
    @endif
    
    @endslot

@endcomponent

<!--End Page Title-->
<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="chairman-info-all">
                    <div class="chairman-image">
                        @if ($message->message_image!=null)
                        @if (file_exists('uploads/about/message/'.$message->message_image))
                            <img src="{{ asset('uploads/about/message/'.$message->message_image) }}" class="img-fluid" alt="Chairman" />
                        @else
                            <img src="{{ asset('placeholder.jpg') }}" class="img-fluid" alt="Chairman" />
                        @endif
                    @else
                        <img src="{{ asset('placeholder.jpg') }}" class="img-fluid" alt="Chairman" />
                    @endif
                    </div>
                    <div class="chairman-info">
                        <h3>{{ $message->chairman }}</h3>
                        <h5>Chairman, {{ $setting->site_name }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                @if($message->message_text!=null)
                <div class="chairman-quotation">
                    <h4>{!! $message->message_text !!}</h4>
                </div>
                @endif
            </div>
            
        </div>
        <div class="row">
        {!! $message->message_content !!}
        </div>
    </div>
</section>
@endsection