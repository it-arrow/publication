@extends('frontend.layouts.app')
@section('title','Portfolio')

@section('content')
<section class="section-padding">
    <div class="container">
        <div class="heading-all">
            <h2>TRAININGS</h2>
        </div>
        <div class="trainings">
            <div class="row">
                @if (count($trainings)>0)
                    @foreach ($trainings as $training)
                        <div class="col-lg-3">
                            <div class="training-single">
                                <div class="training-image">
                                    @if (!empty($training->image))
                                        @if(file_exists('uploads/trainings/'.$training->image))
                                            <img src="{{asset('uploads/trainings/'.$training->image)}}" class="img-fluid">
                                        @else
                                            <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                                        @endif
                                    @else
                                        <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                                    @endif
                                </div>
                                <div class="training-details">
                                    <div class="row align-items-center">
                                        <div class="col-5">
                                            <div class="training-date">
                                                <div><span>{{ date('d', strtotime($training->training_date)) }}</span></div>
                                                <div><span>{{ date('M', strtotime($training->training_date)) }}</span></div>
                                            </div>
                                        </div>
                                        <div class="col-7">
                                            <div class="training-topic">
                                               <a href="{{route('single-training',$training->slug)}}"><h5>{{$training->title}}</h5></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach
                @endif
                
            </div>
        </div>
    </div>
</section>

@endsection