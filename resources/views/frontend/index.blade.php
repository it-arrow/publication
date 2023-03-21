@extends('frontend.layouts.app')
@section('title',$setting->site_name)
@section('content')
<!--Main Slider-->
@if (count($sliders)>0)
<section class="main-slider">
    <div class="rev_slider_wrapper fullwidthbanner-container" id="rev_slider_one_wrapper" data-source="gallery">
        <div class="rev_slider fullwidthabanner" id="rev_slider_one" data-version="5.4.1">
            <ul>
                
                @foreach ($sliders as $key => $slider)
                    @if($key==0)
                    <li data-description="Slide Description" data-easein="default" data-easeout="default"
                        data-fsmasterspeed="1500" data-fsslotamount="7" data-fstransition="fade" data-hideafterloop="0"
                        data-hideslideonmobile="off" data-index="rs-1687" data-masterspeed="default" data-param1=""
                        data-param10="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6=""
                        data-param7="" data-param8="" data-param9="" data-rotate="0" data-saveperformance="off"
                        data-slotamount="default" data-thumb="{{ asset('uploads/sliders/'.$slider->image) }}"
                        data-title="Slide Title" data-transition="parallaxvertical" class="slide-list">
                        <img alt="" class="rev-slidebg" data-bgfit="cover" data-bgparallax="10"
                            data-bgposition="center center" data-bgrepeat="no-repeat" data-no-retina=""
                            src="{{ asset('uploads/sliders/'.$slider->image) }}">
                        <div class="overlay-upper"></div>

                        <div class="tp-caption" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingtop="[0,0,0,0]" data-responsive_offset="on"
                            data-type="text" data-height="none" data-width="['650','650','550','420']"
                            data-whitespace="normal" data-hoffset="['15','15','15','15']"
                            data-voffset="['-60','-100','-100','-85']" data-x="['left','left','left','left']"
                            data-y="['middle','middle','middle','middle']" data-textalign="['top','top','top','top']"
                            data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'
                            style="z-index: 7; white-space: nowrap;text-transform:left;">
                            <h2>{!! $slider->title !!}</h2>
                        </div>

                        <div class="tp-caption" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingtop="[0,0,0,0]" data-responsive_offset="on"
                            data-type="text" data-height="none" data-width="['550','550','550','420']"
                            data-whitespace="normal" data-hoffset="['15','15','15','15']"
                            data-voffset="['80','35','25','10']" data-x="['left','left','left','left']"
                            data-y="['middle','middle','middle','middle']" data-textalign="['top','top','top','top']"
                            data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'
                            style="z-index: 7; white-space: nowrap;text-transform:left;">
                            <div class="text">{!! $slider->text !!}</div>
                        </div>

                        <div class="tp-caption tp-resizeme" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingtop="[0,0,0,0]" data-responsive_offset="on"
                            data-type="text" data-height="none" data-width="['550','550','550','420']"
                            data-whitespace="normal" data-hoffset="['15','15','15','15']"
                            data-voffset="['170','130','130','110']" data-x="['left','left','left','left']"
                            data-y="['middle','middle','middle','middle']" data-textalign="['top','top','top','top']"
                            data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'
                            style="z-index: 7; white-space: nowrap;text-transform:left;">
                            <div class="btns-box">
                                <a href="{{ route('about') }}" class="theme-btn btn-style-one">Read More</a> <a href="{{ route('category') }}"
                                    class="theme-btn btn-style-two">Our Services</a>
                            </div>
                        </div>

                    </li>
                    @endif
                    @if ($key==1)
                    <li data-description="Slide Description" data-easein="default" data-easeout="default"
                        data-fsmasterspeed="1500" data-fsslotamount="7" data-fstransition="fade" data-hideafterloop="0"
                        data-hideslideonmobile="off" data-index="rs-1688" data-masterspeed="default" data-param1=""
                        data-param10="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6=""
                        data-param7="" data-param8="" data-param9="" data-rotate="0" data-saveperformance="off"
                        data-slotamount="default" data-thumb="{{ asset('uploads/sliders/'.$slider->image) }}"
                        data-title="Slide Title" data-transition="parallaxvertical" class="slide-list">
                        <img alt="" class="rev-slidebg" data-bgfit="cover" data-bgparallax="10"
                            data-bgposition="center center" data-bgrepeat="no-repeat" data-no-retina=""
                            src="{{ asset('uploads/sliders/'.$slider->image) }}">
                        <div class="overlay-upper"></div>


                        <div class="tp-caption" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingtop="[0,0,0,0]" data-responsive_offset="on"
                            data-type="text" data-height="none" data-width="['550','650','550','420']"
                            data-whitespace="normal" data-hoffset="['15','15','15','15']"
                            data-voffset="['-60','-100','-100','-85']" data-x="['right','right','right','right']"
                            data-y="['middle','middle','middle','middle']" data-textalign="['top','top','top','top']"
                            data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'
                            style="z-index: 7; white-space: nowrap;text-transform:left;">
                            <h2>{!! $slider->title !!}</h2>
                        </div>

                        <div class="tp-caption" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingtop="[0,0,0,0]" data-responsive_offset="on"
                            data-type="text" data-height="none" data-width="['550','650','550','420']"
                            data-whitespace="normal" data-hoffset="['15','15','15','15']"
                            data-voffset="['80','35','25','10']" data-x="['right','right','right','right']"
                            data-y="['middle','middle','middle','middle']" data-textalign="['top','top','top','top']"
                            data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'
                            style="z-index: 7; white-space: nowrap;text-transform:left;">
                            <div class="text">{!! $slider->text !!}</div>
                        </div>

                        <div class="tp-caption tp-resizeme" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingtop="[0,0,0,0]" data-responsive_offset="on"
                            data-type="text" data-height="none" data-width="['550','650','550','420']"
                            data-whitespace="normal" data-hoffset="['15','15','15','15']"
                            data-voffset="['170','130','130','110']" data-x="['right','right','right','right']"
                            data-y="['middle','middle','middle','middle']" data-textalign="['top','top','top','top']"
                            data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'
                            style="z-index: 7; white-space: nowrap;text-transform:left;">
                            <div class="btns-box">
                                <a href="{{ route('about') }}" class="theme-btn btn-style-one">Read More</a> <a href="{{ route('contact') }}"
                                    class="theme-btn btn-style-two">Contact Us</a>
                            </div>
                        </div>

                    </li>
                    @endif
                    @if ($key==2)
                    <li data-description="Slide Description" data-easein="default" data-easeout="default"
                        data-fsmasterspeed="1500" data-fsslotamount="7" data-fstransition="fade" data-hideafterloop="0"
                        data-hideslideonmobile="off" data-index="rs-1689" data-masterspeed="default" data-param1=""
                        data-param10="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6=""
                        data-param7="" data-param8="" data-param9="" data-rotate="0" data-saveperformance="off"
                        data-slotamount="default" data-thumb="{{ asset('uploads/sliders/'.$slider->image) }}"
                        data-title="Slide Title" data-transition="parallaxvertical" class="slide-list">
                        <img alt="" class="rev-slidebg" data-bgfit="cover" data-bgparallax="10"
                            data-bgposition="center center" data-bgrepeat="no-repeat" data-no-retina=""
                            src="{{ asset('uploads/sliders/'.$slider->image) }}">
                        <div class="overlay-upper"></div>

                        <div class="tp-caption" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingtop="[0,0,0,0]" data-responsive_offset="on"
                            data-type="text" data-height="none" data-width="['750','720','650','420']"
                            data-whitespace="normal" data-hoffset="['15','15','15','15']"
                            data-voffset="['-60','-100','-100','-85']" data-x="['center','center','center','center']"
                            data-y="['middle','middle','middle','middle']" data-textalign="['top','top','top','top']"
                            data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'
                            style="z-index: 7; white-space: nowrap;text-transform:left;">
                            <h2 class="text-center">{!! $slider->title !!}</h2>
                        </div>

                        <div class="tp-caption" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingtop="[0,0,0,0]" data-responsive_offset="on"
                            data-type="text" data-height="none" data-width="['550','720','550','420']"
                            data-whitespace="normal" data-hoffset="['15','15','15','15']"
                            data-voffset="['80','35','25','10']" data-x="['center','center','center','center']"
                            data-y="['middle','middle','middle','middle']" data-textalign="['top','top','top','top']"
                            data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'
                            style="z-index: 7; white-space: nowrap;text-transform:left;">
                            <div class="text text-center">{!! $slider->text !!}</div>
                        </div>

                        <div class="tp-caption tp-resizeme" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingtop="[0,0,0,0]" data-responsive_offset="on"
                            data-type="text" data-height="none" data-width="['550','720','550','460']"
                            data-whitespace="normal" data-hoffset="['15','15','15','15']"
                            data-voffset="['170','130','130','110']" data-x="['center','center','center','center']"
                            data-y="['middle','middle','middle','middle']" data-textalign="['top','top','top','top']"
                            data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'
                            style="z-index: 7; white-space: nowrap;text-transform:left;">
                            <div class="btns-box text-center">
                                <a href="{{ route('about') }}" class="theme-btn btn-style-one">Read More</a> <a href="{{ route('category') }}"
                                    class="theme-btn btn-style-two">Our Services</a>
                            </div>
                        </div>

                    </li>
                    @endif
                @endforeach

            </ul>
        </div>
    </div>
</section>
@endif
<!--End Main Slider-->

<!--Services Section-->
@if (count($countries)>0)
<section class="services-section">
    <div class="auto-container">
        <!--Sec Title-->
        <div class="sec-title centered">
            <h2>Countries We Serve</h2>
            <div class="title">What We Do For You</div>
            <div class="separator"></div>
        </div>
        <div class="row clearfix">
            @foreach ($countries as $key => $country)
                <!--Services Block-->
                <div class="services-block col-md-4 col-sm-6 col-xs-12">
                    <div class="inner-box">
                        <div class="image match-height">
                            @if (file_exists('uploads/country/'.$country->image))
                                <img src="{{ asset('uploads/country/'.$country->image) }}" alt="{{ $country->name }}" />
                            @else
                                <img src="{{ asset('placeholder.jpg') }}" alt="{{ $country->name }}" />
                            @endif
                            <div class="overlay-color"></div>
                        </div>
                        <div class="lower-box">
                            <div class="content">
                                <div class="number">0{{ $key+1 }}</div>
                                <h3>{{ $country->name }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            

        </div>

        <div class="text-center">
            <a href="{{ route('countries') }}" class="theme-btn btn-style-three">View All Countries</a>
        </div>

    </div>
</section>
@endif
<!--End Services Section-->

<!--Services Section Two-->
@if ($trusts!=null)
<section class="services-section-two grey-bg">
    <div class="auto-container">
        <div class="clearfix">
            <!--Services Block Two-->
            @foreach ($trusts as $trust)
            <div class="services-block-two col-md-4 col-sm-6 col-xs-12">
                <div class="inner-box match-height">
                    <div class="icon-box">
                        @if ($trust->icon!=null)
                            @if (file_exists('uploads/trusts/'.$trust->icon))
                                <img src="{{asset('uploads/trusts/'.$trust->icon)}}" alt="{{$trust->title}}" />
                            @else
                                <img src="{{asset('placeholder.jpg')}}" alt="{{$trust->title}}" />
                            @endif
                        @else  
                            <img src="{{asset('placeholder.jpg')}}" alt="{{$trust->title}}" />
                        @endif
                        {{-- <span class="icon flaticon-telemarketer"></span> --}}
                    </div>
                    <h3><a href="javascript:">{{ $trust->title }}</a></h3>
                    {{-- <div class="designation">Consultant</div> --}}
                    <div class="text">{{$trust->description}}</div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
@endif
<!--End Services Section Two-->

<!--Clients Section-->
@if (count($clients)>0)
@php
    $client_section=App\Models\HomePage::where('section','client_section')->first();
    $section=json_decode($client_section->value);
@endphp

<section class="clients-section" style="background-image:url('uploads/clients/bg/{{$section->image}}') ">
    <div class="auto-container">
        <h2>{!! $section->title !!}</h2>
        <div class="text">{!! $section->text !!}</div>
        <!--our Box-->
        <div class="our-box">
            <div class="our-outer">
                <!--our Carousel-->
                <ul class="our-carousel owl-carousel owl-theme">
                    @foreach ($clients as $client)
                        <li class="slide-item">
                            <figure class="image-box">
                                <a href="{{ $client->link }}">
                                    @if (!empty($client->image))
                                        @if(file_exists('uploads/clients/'.$client->image))
                                            <img src="{{asset('uploads/clients/'.$client->image)}}" alt="{{$client->name}}">
                                        @endif
                                    @endif
                                </a>
                            </figure>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

    </div>
</section>
@endif
<!--End Clients Section-->

<!--About Section-->
@if ($whyus!=null)
<div class="about-section">
    <div class="auto-container">
        <!--Sec Title-->
        <div class="sec-title centered">
            <h2>About Our Company</h2>
            <div class="title">{{ $whyus->title }}</div>
            <div class="separator"></div>
        </div>
        <div class="inner-container clearfix">
            <!--Carousel Column-->
            <div class="carousel-column col-md-6 col-sm-12 col-xs-12">
                <div class="image text-center">
                    @if ($whyus->image!=null)
                        @if (file_exists('uploads/whyus/'.$whyus->image))
                            <img src="{{ asset('uploads/whyus/'.$whyus->image) }}" alt="{{ $whyus->title }}" />
                        @else
                            <img src="{{ asset('frontend/assets/images/resource/about.jpeg') }}" alt="{{ $whyus->title }}" />
                        @endif
                    @else
                        <img src="{{ asset('frontend/assets/images/resource/about.jpeg') }}" alt="{{ $whyus->title }}" />
                    @endif
                    
                </div>
            </div>
            <!--Content Column-->
            <div class="content-column col-md-6 col-sm-12 col-xs-12">
                <div class="inner-column">
                    {!! $whyus->description !!}
                    <a href="{{ route('about') }}" class="theme-btn btn-style-three">More About Us</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<!--End About Section-->

<!--Project Section-->
@if (count($categories)>0)
<section class="project-section">
    <!--Porfolio Tabs-->
    <div class="project-tab">
        <div class="auto-container">
            <!--Sec Title-->
            <div class="sec-title clearfix">
                <div class="pull-left">
                    <h2>Service Categories</h2>
                    <div class="title">Our Service Sectors</div>
                    <div class="separator"></div>
                </div>
                <div class="tab-btns-box pull-right">
                    <!--Tabs Header-->
                    <div class="tabs-header">
                        <ul class="product-tab-btns clearfix">
                            <li class="p-tab-btn active-btn" data-tab="#p-tab-0">View All</li>
                            @foreach ($categories as $key => $category)
                                <li class="p-tab-btn" data-tab="#p-tab-{{ $key+1 }}">{{ $category->name }}</li>
                            @endforeach
                            {{-- <li class="p-tab-btn" data-tab="#p-tab-3">Semi-Skilled</li>
                            <li class="p-tab-btn" data-tab="#p-tab-4">Skilled</li> --}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!--Tabs Content-->
        <div class="p-tabs-content">
            <div class="p-tab active-tab" id="p-tab-0">
                <div class="project-carousel owl-theme owl-carousel">
                    @foreach (\App\Models\Service::all() as $service)
                        
                    
                    <div class="gallery-block">
                        <div class="inner-box">
                            <div class="image match-height">
                                @if ($service->image!=null)
                                    @if (file_exists('uploads/services/image/'.$service->image))
                                        <img src="{{ asset('uploads/services/image/'.$service->image) }}" alt="{{ $service->name }}" />
                                    @else
                                        <img src="{{ asset('placeholder.jpg') }}" alt="{{ $service->name }}" />
                                    @endif
                                @else
                                    <img src="{{ asset('placeholder.jpg') }}" alt="{{ $service->name }}" />
                                @endif
                                
                                <div class="overlay-box">
                                    <a href="javascript:" class="link-box"><span class="fa fa-link"></span></a>
                                </div>
                                <div class="lower-box">
                                    <div class="designation">{{ $service->name }}</div>
                                    {{--<h3><a href="javascript:">Developing a stategy and roadmap.</a></h3>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    

                </div>
            </div>
            @foreach ($categories as $key => $category)
            <!--Portfolio Tab / Active Tab-->
            <div class="p-tab" id="p-tab-{{ $key+1 }}">
                <div class="project-carousel owl-theme owl-carousel">
                    @foreach ($category->services as $service)
                        
                    
                    <div class="gallery-block">
                        <div class="inner-box">
                            <div class="image match-height">
                                @if ($service->image!=null)
                                    @if (file_exists('uploads/services/image/'.$service->image))
                                        <img src="{{ asset('uploads/services/image/'.$service->image) }}" alt="{{ $service->name }}" />
                                    @else
                                        <img src="{{ asset('placeholder.jpg') }}" alt="{{ $service->name }}" />
                                    @endif
                                @else
                                    <img src="{{ asset('placeholder.jpg') }}" alt="{{ $service->name }}" />
                                @endif
                                
                                <div class="overlay-box">
                                    <a href="javascript:" class="link-box"><span class="fa fa-link"></span></a>
                                </div>
                                <div class="lower-box">
                                    <div class="designation">{{ $service->name }}</div>
                                    {{--<h3><a href="javascript:">Developing a stategy and roadmap.</a></h3>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    

                </div>
            </div>
            @endforeach

        </div>

    </div>
</section>
@endif
<!--End Project Section-->

<!--Testimonial Section-->
@if (count($testimonials)>0)
<section class="testimonial-section">
    <div class="auto-container">
        <div class="sec-title light centered">
            <h2>Customer Testimonials</h2>
            <div class="title">What Customers Say</div>
            <div class="separator"></div>
        </div>
        <div class="outer-container two-item-carousel owl-carousel owl-theme">
            @foreach($testimonials as $testimonial)
            <!--Testimonial Block-->
            <div class="testimonial-block">
                <div class="inner-box">
                    <div class="author-image">
                        @if ($testimonial->image!=null)
                            @if (file_exists('uploads/testimonials/'.$testimonial->image))
                                <img src="{{ asset('uploads/testimonials/'.$testimonial->image) }}" alt="{{ $testimonial->name }}" />
                            @else
                                <img src="{{ asset('placeholder.jpg') }}" alt="{{ $testimonial->name }}" />
                            @endif
                        @else
                            <img src="{{ asset('placeholder.jpg') }}" alt="{{ $testimonial->name }}" />
                        @endif
                        
                    </div>
                    <h3>{{ $testimonial->name }}</h3>
                    <div class="designation">{{$testimonial->designation}}</div>
                    <div class="text">{{$testimonial->message}}</div>
                    {{-- <div class="client-icon">
                        <img src="assets/images/clients/7.png" alt="" />
                    </div> --}}
                </div>
            </div>
            @endforeach
            

        </div>
    </div>
</section>
@endif
<!--End Testimonial Section-->
<!--About Section-->
<div class="about-section">
    <div class="auto-container">
        <!--Sec Title-->
        <div class="sec-title centered">
            <h2>{!! $banner->parallax_text !!}</h2>
            <div class="title">{!! $banner->sub_title !!}</div>
            <div class="separator"></div>
        </div>
        <div class="process-large">
            @if ($banner->image!=null)
                @if (file_exists('uploads/banners/'.$banner->image))
                    <img src="{{ asset('uploads/banners/'.$banner->image) }}" class="img-fluid" alt="" />
                @else
                    <img src="{{ asset('placeholder.jpg') }}" class="img-fluid" alt="" />
                @endif
            @else
                <img src="{{ asset('placeholder.jpg') }}" class="img-fluid" alt="" />
            @endif
            {{-- <img src="{{ asset('frontend/assets/images/resource/process.jpg') }}" alt="Process" class="img-fluid"> --}}
        </div>
        <div class="process-small">
          @if ($banner->m_image!=null)
                @if (file_exists('uploads/banners/'.$banner->m_image))
                    <img src="{{ asset('uploads/banners/'.$banner->m_image) }}" class="img-fluid" alt="" />
                @else
                    <img src="{{ asset('placeholder.jpg') }}" class="img-fluid" alt="" />
                @endif
            @else
                <img src="{{ asset('placeholder.jpg') }}" class="img-fluid" alt="" />
            @endif
        </div>
    </div>
</div>
<!--End About Section-->

<!--News Section-->
@if (count($blogs)>0)
<section class="news-section">
    <div class="auto-container">
        <div class="sec-title">
            <div class="clearfix">
                <div class="pull-left">
                    <h2>Latest From Blog</h2>
                    {{-- <div class="title">News & Press Release</div> --}}
                    <div class="separator"></div>
                </div>
                <div class="pull-right">
                    <a href="{{route('blogs')}}" class="theme-btn btn-style-four">More News</a>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            @foreach ($blogs as $blog)
            <!--News Block-->
            <div class="news-block col-md-4 col-sm-6 col-xs-12 match-height">
                <div class="inner-box">
                    <div class="upper-box">
                        <div class="title">Post Info</div>
                        <ul>
                            <li>{{$blog->updated_at->format('d M Y')}}</li>
                            <li>{{ $blog->tags }}</li>
                        </ul>
                    </div>
                    <div class="middle-box">
                        <h3><a href="{{route('blog.detail',$blog->slug)}}">{{ $blog->title }}</a></h3>
                        <div class="text line-clamp">{!! $blog->description !!}</div>
                    </div>
                    <div class="lower-box">
                        <div class="image">
                            @if ($blog->image!=null)
                                @if (file_exists('uploads/blogs/'.$blog->image))
                                    <img src="{{ asset('uploads/blogs/'.$blog->image) }}" alt="{{ $blog->title }}" />
                                @else
                                    <img src="{{ asset('placeholder.jpg') }}" alt="{{ $blog->title }}" />
                                @endif
                            @else
                                <img src="{{ asset('placeholder.jpg') }}" alt="{{ $blog->title }}" />
                            @endif
                            <div class="overlay-box">
                                <div class="overlay-inner">
                                    <a class="read-more" href="{{route('blog.detail',$blog->slug)}}"><span
                                            class="icon flaticon-arrow-pointing-to-right"></span> Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
@endif
<!--End News Section-->
<!--Fluid Section One-->
<section class="fluid-section-one">
    <div class="outer-container clearfix">
        <div class="left-box" style="background-image: url('{{ asset('uploads/about/'.$about->about_image) }}')"></div>
        <div class="right-box"></div>
        <!--Image Column-->
        <div class="image-column">
            <div class="inner-column clearfix">
                <div class="content">
                    @php
                        $enquiry=App\Models\HomePage::where('section','enquiry')->first();
                    @endphp
                    <div class="row clearfix">
                        <div class="column col-md-6 col-sm-6 col-xs-12">
                            <h2><span class="since">{!! json_decode($enquiry->value)->title !!}</h2>
                        </div>
                        <div class="column col-md-6 col-sm-6 col-xs-12">
                            <div class="text">{!! json_decode($enquiry->value)->text!!}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Content Column-->
        <div class="content-column">
            <div class="inner-column">
                <h2>Make an Enquiry</h2>
                <div class="title">For Any Enquiry</div>
                <div class="separator"></div>

                <!-- Appointment Form -->
                <div class="apointment-form">
                    <!--Call Back Form-->
                    <form method="post" action="{{route('callback')}}">
                        @csrf
                        <div class="row clearfix">
                            
                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="fname" name="name" value="{{ old('name') }}" placeholder="Enter Full Name" required>
                            </div>

                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="mnumber" name="phone" value="{{ old('phone') }}" placeholder="Enter Mobile Number"
                                    required>
                            </div>

                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <input type="text" id="address" name="address" value="{{ old('address') }}" placeholder="Enter Address"
                                    >
                            </div>
                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <textarea name="message" id="message" placeholder="Enter Message" rows="3" >{{ old('message') }}</textarea>
                            </div>
                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <button class="theme-btn btn-style-one" type="submit" name="submit-form">Submit
                                    Here</button>
                            </div>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</section>
<!--End Fluid Section One-->

<!--Default Section-->
<section class="default-section">
    <div class="auto-container">
        <div class="row clearfix">
            <!--Accordian Column-->
            <div class="accordian-column col-md-6 col-sm-12 col-xs-12">

                <!--Accordian Box-->
                <ul class="accordion-box">

                    <!--Block-->
                    @if (count($faqs)>0)
                        
                    
                    @foreach ($faqs as $faq)
                        
                    
                    <li class="accordion block">
                        <div class="acc-btn">
                            <div class="icon-outer"><span class="icon icon-plus fa fa-arrow-down"></span></div>{{$faq->question}}
                        </div>
                        <div class="acc-content">
                            <div class="content">
                                <div class="text">{{$faq->answer}}</div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                    @endif

                </ul>
            </div>
            <!--Counter Column-->
            <div class="counter-column col-md-6 col-sm-12 col-xs-12">
                <div class="inner-column">
                    <div class="text">There is some reason behind why people choose us past 20 years for foreign employment.
                    </div>

                    <!--Fact Counter-->
                    <div class="fact-counter">
                        <div class="row clearfix">
                            @if (count($counters)>0)
                            @foreach ($counters as $counter)
                            <!--Column-->
                            <div class="column counter-column col-md-6 col-sm-6 col-xs-12">
                                <div class="inner">
                                    @if ($counter->icon!=null)
                                        @if (file_exists('uploads/counter/'.$counter->icon))
                                            <img src="{{asset('uploads/counter/'.$counter->icon)}}" alt="{{$counter->title}}" />
                                        @else
                                            <img src="{{asset('placeholder.jpg')}}" alt="{{$counter->title}}" />
                                        @endif
                                    @else  
                                        <img src="{{asset('placeholder.jpg')}}" alt="{{$counter->title}}" />
                                    @endif
                                    {{-- <span class="icon flaticon-idea"></span> --}}
                                    <div class="count-outer count-box">
                                        <span class="count-text" data-speed="4000" data-stop="{{ $counter->stat_counter }}">0</span>
                                    </div>
                                    <h4 class="counter-title">{{ $counter->title }}</h4>
                                </div>
                            </div>
                            @endforeach
                            @endif

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

@if ($setting->popup_status==1)
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body text-center">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                @if ($setting->popup!=null)
                <a href="{{ $setting->popup_url }}" target="_blank">
                    <img src="{{asset('uploads/popup/'.$setting->popup)}}" style="width: -webkit-fill-available;" />
                </a>
                @endif
                
            </div>
        </div>

    </div>
</div>
@endif

<!--End Default Section-->
@endsection
@section('script')
<script>
   $(document).ready(function(){       
		$('#myModal').modal('show');
	});
</script>
@endsection