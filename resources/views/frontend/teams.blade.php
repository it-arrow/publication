@extends('frontend.layouts.app')
@section('title','Our Team')

@section('content')
<div class="section-padding our-teams">
    <div class="container">
        <h2 class="section-heading mb-3">OUR TEAMS</h2>
        <div class="row">
            @if (count($teams)>0)
                @foreach ($teams as $team)
                    
                    <div class="col-lg-4 col-md-6">
                        <div class="card-cover">
                            <div class="imgBx">
                                @if (!empty($team->image))
                                    @if(file_exists('uploads/teams/'.$team->image))
                                        <img src="{{asset('uploads/teams/'.$team->image)}}">
                                    @else
                                        <img src="{{asset('placeholder.jpg')}}">
                                    @endif
                                @else
                                    <img src="{{asset('placeholder.jpg')}}">
                                @endif
                               
                            </div>
                            <div class="content-card">
                                <div class="contentBx">
                                    <h3>{{$team->name}} <br /><span>{{$team->designation}}</span></h3>
                                </div>
                                <ul class="sci">
                                    <li style="--i: 1">
                                        <a href="{{$team->facebook}}"><i class="fa-brands fa-facebook"></i></a>
                                    </li>
                                    <li style="--i: 2">
                                        <a href="{{$team->instagram}}"><i class="fa-brands fa-instagram"></i></a>
                                    </li>
                                    <li style="--i: 3">
                                        <a href="{{$team->twitter}}"><i class="fa-brands fa-twitter"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                Sorry, No Data Found....
            @endif
            
            
        </div>
    </div>
</div>
@endsection