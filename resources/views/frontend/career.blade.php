@extends('frontend.layouts.app')
@section('title','Career')

@section('content')
<!--CAREER-->
<section class="career section-padding">
    <div class="container">
        <h2 class="section-heading mb-5">career</h2>
        <div class="row">
            @foreach ($vacancies as $vacancy)
            <div class="col-lg-3 col-md-4">
                <div class="job-box">
                    <h2 class="job-title h5"><a href="{{route('career.detail',$vacancy->slug)}}">{{$vacancy->title}}</a></h2>
                    <p>No of Vacancies : <span class="vacancy">{{$vacancy->vacancy_no}}</span></p>
                </div>
            </div>
            @endforeach
            
        </div>
    </div>
</section>
@endsection