@extends('frontend.layouts.app')
@section('title','Calendar')
@section('content')
<!--Page Title-->
<section class="page-title"
    style="background-image:linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.6)),url('uploads/breadcrumb/{{$setting->breadcrumb}}');">
    <div class="auto-container">
        <h1>Calendar</h1>
    </div>
    <!--Page Info-->
    <div class="page-info">
        <div class="auto-container">
            <div class="inner-container">
                <ul class="bread-crumb">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Calendar</li>
                </ul>
            </div>
        </div>
    </div>
    <!--End Page Info-->
</section>

<!--End Page Title-->
<div id="calendar" class="section-padding">
    <div id="calendar_header"><i class="icon-chevron-left"></i>          <h1></h1><i class="icon-chevron-right"></i>         </div>
    <div id="calendar_weekdays"></div>
    <div id="calendar_content"></div>
</div>

@endsection