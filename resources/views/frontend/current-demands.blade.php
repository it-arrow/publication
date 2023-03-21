@extends('frontend.layouts.app')
@section('title','Current Demands')
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
    Current Demands
    @endif
    
    @endslot

    @slot('sub_title')
    @if ($breadcrumb!=null)
    {{json_decode($breadcrumb->value)->sub_title}}
    @else
    Current Demands
    @endif
    
    @endslot

@endcomponent
<!--End Page Title-->
<section class="section-padding">
    <div class="container">
        <div class="current-demands">
            <div class="row">
                @if (count($demands)>0)
                    @foreach ($demands as $demand)
                    <div class="col-md-3">
                        <div class="jobs">
                            <a href="{{ route('apply-demands',$demand->slug) }}">
                                @if ($demand->image!=null)
                                    @if (file_exists('uploads/demands/'.$demand->image))
                                        <img src="{{ asset('uploads/demands/'.$demand->image) }}" alt="{{ $demand->position }}" class="img-fluid">
                                    @else
                                        <img src="{{ asset('placeholder.jpg') }}" alt="{{ $demand->position }}" class="img-fluid">
                                    @endif
                                @else
                                    <img src="{{ asset('placeholder.jpg') }}" alt="{{ $demand->position }}" class="img-fluid">
                                @endif
                                
                                <ul>
                                    <li><span>Position: </span> {{ $demand->position }}</li>
                                    <li><span>Post Date: </span> {{ $demand->updated_at }}</li>
                                    <li><span>Expiry: </span> {{ $demand->expiry }}</li>
                                    <li><span>Total Demand: </span> {{ $demand->total_demands }}</li>
                                </ul>
                            </a>
                        </div>
                    </div>
                    @endforeach
                @endif
                
                
            </div>
        </div>
    </div>
</section>
@endsection