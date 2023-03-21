@extends('frontend.layouts.app')
@section('title','Hiring Process')
@section('content')
<!--Page Title-->
<section class="page-title"
    style="background-image:linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.6)),url('uploads/breadcrumb/{{$setting->breadcrumb}}');">
    <div class="auto-container">
        <h1>Hiring Process</h1>
        <div class="title">Hiring Process</div>
    </div>
    <!--Page Info-->
    <div class="page-info">
        <div class="auto-container">
            <div class="inner-container">
                <ul class="bread-crumb">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Hiring Process</li>
                </ul>
            </div>
        </div>
    </div>
    <!--End Page Info-->
</section>
@php
$section=App\Models\HomePage::where('section','hiring_image')->first();
@endphp
@if (count($hirings)>0)
<section class="section-padding">
    <div class="container">
    <div class="hiring-image">
      <img src="{{asset('uploads/step/'.$section->value)}}" alt="Hiring Process Image" class="img-fluid">
      </div>
        <div class="hiring-process">
            <div class="row">
                @foreach ($hirings as $hiring)
                    
                
                <div class="col-md-6">
                    <div class="hiring-process-inner match-height">
                        <h2>{{ $hiring->title }}</h2>
                        {!! $hiring->text !!}
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif
@endsection