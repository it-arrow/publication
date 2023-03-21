@extends('frontend.layouts.app')
@section('title',$vacancy->title)

@section('content')
<section class="section-padding career-single">
    <div class="container">
        <h2 class="section-heading mb-2">{{$vacancy->title}}</h2>
        {!! $vacancy->description !!}
    </div>
</section>
@endsection