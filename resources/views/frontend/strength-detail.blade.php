@extends('frontend.layouts.app')
@section('title',$strength->title)
@section('content')
<!--Page Title-->
<section class="page-title" style="background-image:url('{{ asset('uploads/breadcrumb/'.$setting->breadcrumb) }}');">
    <div class="auto-container">
        <h1>{{ $strength->title }}</h1>
        <div class="title">{{ $strength->title }}</div>
    </div>
    <!--Page Info-->
    <div class="page-info">
        <div class="auto-container">
            <div class="inner-container">
                <ul class="bread-crumb">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>{{ $strength->title }}</li>
                </ul>
            </div>
        </div>
    </div>
    <!--End Page Info-->
</section>
<!--End Page Title-->

<section class="section-padding">
    <div class="container">
        <div class="text-section">
            {!! $strength->content !!}
        </div>
    </div>
</section>
@endsection