@extends('frontend.layouts.app')
@section('title','Services')

@section('content')
@if(Route::is('services'))
<section class="header-second-bg" style="background:url('../uploads/breadcrumb/{{$setting->breadcrumb}}')">
    <div class="breadcrumb-area text-center">
        <h4>Services</h4>
        <p><a href="{{route('home')}}">Home</a> > {{$category->name}}</p>
    </div>
</section>
@endif
<section class="section-padding bg-white" id="services">
    <div class="container">
      <div class="row">
        @if (count($services)>0)
            @foreach ($services as $service)
                <div class="col-md-2">
                <div class="service-box">
                    <a href="{{route('service.detail',$service->slug)}}">
                    <div class="service-image">
                        @if (!empty($service->icon))
                            @if(file_exists('uploads/services/icon/'.$service->icon))
                                <img src="{{asset('uploads/services/icon/'.$service->icon)}}" class="img-fluid">
                            @else
                                <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                            @endif
                        @else
                            <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                        @endif
                    </div>
                    <h6 class="text-center">{{$service->name}}</h6>
                    </a>
                </div>
                </div>
            @endforeach
        @else
        <h1>Service Unavailable</h1>
        @endif
        
      </div>
      <div class="row justify-content-center mt-3">
        {{-- {{$services->links()}} --}}
      </div>
    </div>
</section>
@endsection