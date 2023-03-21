@extends('frontend.layouts.app')
@section('content')
<section class="header-second-bg" style="background-image:url('../uploads/breadcrumb/{{$setting->breadcrumb}}')">
    <div class="breadcrumb-area text-center">
        <h4>Training</h4>
        <p><a href="{{route('home')}}">Home</a> > {{$training->title}}</p>
    </div>
</section>
<section class="section-padding">
    <div class="container">
        <div class="training-inner-page">
            <div class="training-inner-image mb-4">
                @if (!empty($training->image))
                    @if(file_exists('uploads/trainings/'.$training->image))
                        <img src="{{asset('uploads/trainings/'.$training->image)}}" alt="{{$training->title}}" class="img-fluid">
                    @endif
                @endif
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <h4>What will you learn?</h4>
                    {!! $training->description !!}
                </div>
                <div class="col-lg-6 col-md-12">
                    <h4>Training Agendas</h4>
                    {!! $training->agendas !!}
                </div>
                <div>
                    <h6>Duration:{{$training->duration}}</h6>  
                </div>
                
            </div>
        </div>
    </div>
</section>
@endsection