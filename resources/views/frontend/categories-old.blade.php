@extends('frontend.layouts.app')
@section('title','Categories')

@section('content')
<section class="section-padding bg-white" id="services">
    <div class="container">
      <div class="row">
        @if (count($categories)>0)
            @foreach ($categories as $category)
                <div class="col-md-2">
                <div class="service-box">
                    <a href="{{route('services',$category->slug)}}">
                    <div class="service-image">
                        @if (!empty($category->icon))
                            @if(file_exists('uploads/services/category/'.$category->icon))
                                <img src="{{asset('uploads/services/category/'.$category->icon)}}" class="img-fluid">
                            @else
                                <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                            @endif
                        @else
                            <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                        @endif
                    </div>
                    <h6 class="text-center">{{$category->name}}</h6>
                    </a>
                </div>
                </div>
            @endforeach
        @else
        <h1>Service Unavailable</h1>
        @endif
        
      </div>
      <div class="row justify-content-center mt-3">
        {{$categories->links()}}
      </div>
    </div>
</section>
@endsection