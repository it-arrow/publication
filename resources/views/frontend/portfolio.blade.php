@extends('frontend.layouts.app')
@section('title','Portfolio')

@section('content')
<div class="section-padding">
    <div class="container">
        <div class="row">
            @if (count($portfolios)>0)
                @foreach ($portfolios as $portfolio)
                    <div class="col-lg-4 col-md-6">
                        <a href="{{$portfolio->url}}">
                            <div class="project-category-image">
                                @if (!empty($portfolio->image))
                                    @if(file_exists('uploads/clients//'.$portfolio->image))
                                        <img src="{{asset('uploads/clients//'.$portfolio->image)}}" class="img-fluid">
                                    @else
                                        <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                                    @endif
                                @else
                                    <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                                @endif
                                <h4>{{$portfolio->name}}</h4>
                            </div>
                        </a>
                    </div>
                @endforeach
            @endif
            
        </div>
    </div>
    <div class="row justify-content-center mt-3">
        {{$portfolios->links()}}
    </div>
</div>

@endsection