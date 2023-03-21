@extends('frontend.layouts.app')
@section('title',$page->title)
@section('content')
<!--Page Title-->
<section class="page-title"
    style="background-image:linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.6)),url('uploads/breadcrumb/{{$setting->breadcrumb}}');">
    <div class="auto-container">
        <h1>{{$page->title}}</h1>
        <div class="title">{{$page->title}}</div>
    </div>
    <!--Page Info-->
    <div class="page-info">
        <div class="auto-container">
            <div class="inner-container">
                <ul class="bread-crumb">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>{{$page->title}}</li>
                </ul>
            </div>
        </div>
    </div>
    <!--End Page Info-->
</section>
<!--End Page Title-->
<section class="section-padding">
    <div class="container">
        <div class="row">
            {!! $page->content !!}
        </div>
    </div>
</section>

@endsection