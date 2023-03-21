@extends('frontend.layouts.app')
@section('title','Contact Us')

@section('content')

{{-- <section id="Contact_form" class="section-padding">
    <div class="container">
        <div class="py-5">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="booking_form">
                        <form method="post" action="{{route('contact_us')}}">
                            @csrf
                            <h2>Contact Form</h2>
                            @include('admin.includes.message')
                            <div class="form-group">
                                <input class="form-control" id="name" name="name" placeholder="Full Name" type="text" value="{{old('name')}}" required/>
                            </div>
                            <div class="form-group">
                                <input class="form-control" id="Email" name="email" placeholder="Email" type="email" value="{{old('email')}}" />
                            </div>
                            <div class="form-group">
                                <input class="form-control" id="Subject" name="subject" placeholder="Subject*"
                                    type="text" value="{{old('subject')}}" required/>
                            </div>
                            <div class="form-group">
                                <input class="form-control" id="Phone_number" name="phone"
                                    placeholder="Phone Number" type="text" value="{{old('phone')}}" required/>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <textarea class="form-control" rows="6" placeholder="Message" name="message">{{old('message')}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn-main" name="submit" type="submit"> Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="about_info">
                        <h2>Contact info</h2>
                        <p><i class="fa fa-map-marker" aria-hidden="true"></i> {{$setting->primary_address}}</p>
                        <p><i class="fa fa-envelope" aria-hidden="true"></i> {{$setting->primary_email}}, {{$setting->secondary_email}}</p>
                        <p><i class="fa fa-phone" aria-hidden="true"></i> {{$setting->primary_phone}}, {{$setting->secondary_phone}}</p>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <div class="contacts_mape">
        {!! $setting->iframe !!}
    </div>
</section> --}}
<!--Page Title-->
<section class="page-title"
    style="background-image:linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.6)),url('uploads/breadcrumb/{{$setting->breadcrumb}}');">
    <div class="auto-container">
        <h1>Contact Us</h1>
        <div class="title">Get Touch With Us</div>
    </div>
    <!--Page Info-->
    <div class="page-info">
        <div class="auto-container">
            <div class="inner-container">
                <ul class="bread-crumb">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Contact</li>
                </ul>
            </div>
        </div>
    </div>
    <!--End Page Info-->
</section>
<!--End Page Title-->

<!--Contact Section-->
<section class="contact-section">
    <div class="auto-container">
        <div class="contact-banner" style="background-image:url({{ asset('frontend/assets/images/background/1.jpg') }});">
            <div class="banner-inner">
                <h2>Opportunity Just Ahead</h2>
                <div class="emailed">{{ $setting->primary_email }} @if ($setting->secondary_email!=null)
                    , {{ $setting->secondary_email }}
                @endif</div>
            </div>
        </div>
        <div class="form-lower-section clearfix">
            <!--Info Column-->
            <div class="info-column col-md-4 col-sm-12 col-xs-12">
                <div class="inner-column">
                    <div class="slide">
                        <h3>Corporate Office</h3>
                        <ul class="info-list">
                            <li><span class="icon flaticon-placeholder-filled-point"></span><strong>Address:</strong>
                                {{ $setting->primary_address }}</li>
                            <li><span class="icon flaticon-telephone-handle-silhouette"></span><strong>Call
                                    Us:</strong><a href="tel:{{ $setting->primary_phone }}">{{ $setting->primary_phone }}</a>
                                    @if ($setting->secondary_phone != null)
                                    , <a href="tel:{{ $setting->secondary_phone }}"> {{ $setting->secondary_phone }}</a>
                                    @endif</li>
                            <li><span class="icon fa fa-envelope"></span><strong>Mail Us:</strong><a href="mailto:{{ $setting->primary_email }}">{{ $setting->primary_email }}</a>
                                @if ($setting->secondary_email != null)
                                , <a href="mailto:{{ $setting->secondary_email }}"> {{ $setting->secondary_email }}</a>
                                @endif</li>
                            <li><span class="icon flaticon-clock-3"></span><strong>Office Hrs:</strong>{{$setting->office_hr}}</li>
                        </ul>
                        <ul class="social-icon-three">
                            @if ($social!=null)
                                @foreach ($social as $social_media)
                                    
                                    <li><a href="{{$social_media->link}}"><span class="{{$social_media->icon}}"></span></a></li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            <!--Form Column-->
            <div class="form-column col-md-8 col-sm-12 col-xs-12">
                <div class="inner-column">
                    <div class="row clearfix">
                        @include('admin.includes.message')
                        <div class="label-column col-md-4 col-sm-12 col-xs-12">
                            <ul class="labels-name">
                                <li>Name & Email Address:</li>
                                <li>Phone & Subject:</li>
                                <li>Enter Your Message:</li>
                            </ul>
                        </div>
                        <div class="form-inner-column col-md-8 col-sm-12 col-xs-12">

                            <!-- Contact Form -->
                            <div class="contact-form">
                                <!--Comment Form-->
                                <form method="post" action="{{route('contact_us')}}" id="contact-form">
                                    @csrf
                                    
                                    <div class="row clearfix">
                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                            <input id="name" name="name" placeholder="Full Name" type="text" value="{{old('name')}}" required/>
                                        </div>

                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                            <input id="Email" name="email" placeholder="Email" type="email" value="{{old('email')}}" />
                                        </div>

                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                            <input id="Phone_number" name="phone"
                                    placeholder="Phone Number" type="text" value="{{old('phone')}}" required/>
                                        </div>

                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                            <input id="Subject" name="subject" placeholder="Subject"
                                    type="text" value="{{old('subject')}}" required/>
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                                            <textarea placeholder="Message" name="message">{{old('message')}}</textarea>
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                                            <button class="theme-btn btn-style-one" type="submit"
                                                name="submit-form">Send message</button>
                                        </div>

                                    </div>
                                </form>

                            </div>
                            <!--End Contact Form -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Contact Section-->

<!--Map Section-->
<section class="map-section">
    <!--Map Outer Starts-->
    {!! $setting->iframe !!}
    <!--Map Outer Ends-->
</section>
<!--End Map Section-->
@endsection