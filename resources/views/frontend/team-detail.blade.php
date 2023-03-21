@extends('frontend.layouts.app')
@section('content')
<!-- Breadcrumbs -->
<section id="breadcrumb-wrapper" class="position-relative">
    <div class="image">
        <img src="{{asset('frontend/assets/images/product-images/1.jpg')}}" alt="breadcrumb-image" class="img-fluid">
    </div>
    <div class="overlay position-absolute">
        <div class="title p-4">Team Detail</div>
    </div>
</section>
<!-- Breadcrumbs Ends -->
    <!-- Our Team  -->
    <section id="team-detail" class="default-padding">
        <div class="container">
            <!-- Team member -->
            <div class="row justify-content-center align-items-center organization mb-4">
                <div class="col-lg-6 col-12 pl-lg-0 p-auto text-center">
                    <div class="team-single-img">
                        @if (!empty($team->image))
                            @if(file_exists('uploads/teams/'.$team->image))
                                <img src="{{asset('uploads/teams/'.$team->image)}}" class="img-fluid">
                            @else
                                <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                            @endif
                        @else
                            <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                        @endif
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="team-detail-men">
                        <div class="row pt-4 pb-4">
                            <div class="col-md-12 mb-md-4 mb-0">
                                <div class="team-name mb-2">
                                    <h4 class="mb-1">{{$team->name}}

                                    </h4>
                                    <span>{{$team->designation}}
                                    </span>
                                </div>
                                <div class="team-name mb-2">
                                    <p>{{$team->details}}</p>
                                </div>
                                <ul class="team-single-info">
                                    <li class="mb-1"><strong>Phone:</strong><span>{{$team->contact}}
                                        </span></li>
                                    {{-- <li><strong>Email:</strong><span> example@example.com</span></li> --}}
                                </ul>
                                <ul class="team-social-list list-inline mt-2">
                                    <li class="list-inline-item"><a href="{{$team->twitter}}" class=""><i class="fa fa-twitter"
                                                aria-hidden="true"></i></a></li>
                                    <li class="list-inline-item"><a href="{{$team->facebook}}" class=""><i class="fa fa-facebook"
                                                aria-hidden="true"></i></a></li>
                                    <li class="list-inline-item"><a href="{{$team->instagram}}" class=""><i class="fa fa-instagram"
                                                aria-hidden="true"></i></a></li>
                                    <li class="list-inline-item"><a href="{{$team->linkedin}}" class=""><i class="fa fa-linkedin"
                                                aria-hidden="true"></i></a></li>

                                </ul>
                            </div>
                            <!-- <div class="col-12">
                                <div class="team-single-text">

                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet eum, at libero
                                        assumenda magnam reiciendis alias totam pariatur fuga soluta corporis saepe?
                                        Fuga at similique dolores quod dicta facilis porro.</p>


                                </div>
                            </div> -->
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <!-- ./Team member -->
    </section>
    <!-- Our Team  Ends -->

@include('frontend.includes.donate')

@endsection