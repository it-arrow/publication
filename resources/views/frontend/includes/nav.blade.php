@php
$setting=App\Models\SiteSetting::first();
$social=App\Models\SocialMedia::get();
$policies=App\Models\Policy::get();
@endphp
{{-- <div class="translation">
<div class="container">
    <div class="translation-inner">
        <div id='google_translate_element'></div>
        <div class="social-top-header">
            <ul>
                @if ($social!=null)
                @foreach ($social as $social_media)
                    <li><a href="{{$social_media->link}}"><i class="{{$social_media->icon}}"></i></a></li>
                @endforeach
                @endif
            </ul>
        </div>
    </div>
<script>
function googleTranslateElementInit() {
new google.translate.TranslateElement({
pageLanguage: 'en',
autoDisplay: 'true',
includedLanguages:'en,ne',
layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL
}, 'google_translate_element');
}
</script>
<script src='//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit'></script>
</div>
</div>
<section class="main-navbar header-wrapper">
    <div class="container-second-nav">
        <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <a class="navbar-brand text-light" href="{{route('home')}}">
                @if (!empty($setting->logo))
                    @if(file_exists('uploads/generalSetting/'.$setting->logo))
                        <img src="{{asset('uploads/generalSetting/'.$setting->logo)}}" alt="{{$setting->site_name}}" class="img-fluid navlogo">
                    @else
                        {{$setting->site_name}}
                    @endif
                @else
                    {{$setting->site_name}}
                @endif
                
            </a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('home')}}">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('about')}}">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('category')}}">Services</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('blogs')}}">Blogs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('portfolio')}}">Portfolio</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('training')}}">Trainings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('contact')}}">Contact Us</a>
                    </li>
                    
                    
                    
                </ul>
            </div>
            <div class="second-bg">
                <div class="container">
                    <div id="mySidenav" class="sidenav">
                        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                        <ul>
                            <li><a href="{{route('home')}}">Home</a></li>
                            <li><a href="{{route('about')}}">About Us</a></li>
                            <li>
                                <a class="service-btn" href="{{route('category')}}">Services
                                </a>
                                
                            </li>
                            <li><a href="{{route('blogs')}}">Blogs</a></li>
                            <li>
                                <a class="service-btn" href="{{route('portfolio')}}">Portfolio
                                </a>
                            </li>
                            <li><a href="{{route('training')}}">Trainings</a></li>
                            <li><a href="{{route('contact')}}">Contact Us</a></li>
                        </ul>
                    </div>
                    <span class="openNav" onclick="openNav()">&#9776; </span>
                </div>
            </div>
        </nav>
    </div>
</section> --}}
{{-- {{ dd($setting) }} --}}
<!-- Main Header-->
<header class="main-header">

    <!--Header Top-->
    <div class="header-top">
        <div class="auto-container">
            <div class="clearfix">
                <div class="top-left">
                    <ul class="clearfix">
                        
                        <li><span class="icon fa fa-phone"></span>
                            <a href="tel:{{ $setting->primary_phone }}">{{ $setting->primary_phone }}</a>
                            @if ($setting->secondary_phone != null)
                            , <a href="tel:{{ $setting->secondary_phone }}"> {{ $setting->secondary_phone }}</a>
                            @endif
                        </li>
                        <li><span class="icon fa fa-envelope"></span>
                            <a href="mailto:{{ $setting->primary_email }}">{{ $setting->primary_email }}</a>
                            @if ($setting->secondary_email != null)
                            , <a href="mailto:{{ $setting->secondary_email }}"> {{ $setting->secondary_email }}</a>
                            @endif
                        </li>
                        <li><a href="#">English</a></li>
                                <li><a href="#">Nepali</a></li>
                    </ul>
                </div>
                <div class="top-right clearfix">
                    <ul class="clearfix">
                        <li class="nav-calendar"><a href="{{ route('calendar') }}">{{ date('d-m-Y') }}</a></li>
                        <li>
                            <div class="social-links">
                                @if ($social!=null)
                                    @foreach ($social as $social_media)
                                        <a href="{{$social_media->link}}"><span class="{{$social_media->icon}}"></span></a>
                                    @endforeach
                                @endif
                            </div>
                        </li>
                        
                    </ul>
                    <a href="{{ $setting->brochure }}" download class="stay-connect"><i class="fa-solid fa-download"></i>
                        Profile</a>
                </div>
            </div>
        </div>
    </div>

    <!--Header-Upper-->
    <div class="header-upper d-md-none">
        <div class="auto-container clearfix">

            <div class="pull-left logo-outer">
                <div class="logo" style="width:70%">
                    <a href="{{ route('home') }}">
                        @if (!empty($setting->logo))
                            @if(file_exists('uploads/generalSetting/'.$setting->logo))
                                <img src="{{asset('uploads/generalSetting/'.$setting->logo)}}" alt="{{$setting->site_name}}">
                            @else
                                {{$setting->site_name}}
                            @endif
                        @else
                            {{$setting->site_name}}
                        @endif
                    </a>
                </div>
            </div>

            <div class="pull-right upper-right clearfix">

                <div class="nav-outer clearfix">
                    <!-- Main Menu -->
                    <nav class="main-menu">
                        <div class="navbar-header">
                            <!-- Toggle Button -->
                            <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>

                        <div class="navbar-collapse collapse clearfix">
                            <ul class="navigation clearfix">
                                <li class="{{ Route::is('home') ? 'current' : ''}}"><a href="{{ route('home') }}">Home</a></li>
                                <li class="dropdown"><a href="#">About us</a>
                                    <ul>
                                        <li><a href="{{ route('about') }}">About Company</a></li>
                                        <li><a href="{{ route('awards') }}">Awards</a></li>
                                        <li><a href="{{ route('mission-vision') }}">Mission & Vision</a></li>
                                        <li><a href="{{ route('chairman-message') }}">Chairman's Message</a></li>
                                        <li><a href="{{ route('organization-chart') }}">Organization's Chart</a></li>
                                        <li><a href="{{ route('strength') }}">Our Strength</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{ route('category') }}">Service Categories</a></li>
                                <li class="dropdown"><a href="#">Our Policies</a>
                                    <ul>
                                        @foreach ($policies as $policy)
                                            <li><a href="{{ route('policy',$policy->slug) }}">{{ $policy->policy_name }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="#">Documents</a>
                                    <ul>
                                        <li><a href="{{ route('demand-documents') }}">Demand Documents</a></li>
                                        <li><a href="{{ route('company-documents') }}">Company Documents</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="#">Employer</a>
                                    <ul>
                                        @php
                                            $page=App\Models\Page::where('slug','documents-required')->first();
                                            if($page==null){
                                                App\Models\Page::create([
                                                    'title'=>'Documents Required',
                                                    'slug'=>'documents-required',
                                                    'content'=>'Your content goes here'
                                                ]);
                                            }
                                        @endphp
                                        <li><a href="{{ route('custom_page',$page->slug) }}">Documents Required</a></li>
                                        <li><a href="{{ route('carrer') }}">Apply Now</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="#">Other</a>
                                    <ul>
                                        <li><a href="{{ route('blogs') }}">Blogs</a></li>
                                        <li><a href="{{ route('current-demands') }}">Current Demands</a></li>
                                        <li><a href="{{route('photos')}}">Gallery</a></li>
                                        <li><a href="{{ route('hiring-process') }}">Hiring Process</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{ route('contact') }}">Contact Us</a></li>
                            </ul>
                        </div>
                    </nav>

                   
                </div>

            </div>

        </div>
    </div>
    <!--End Header Upper-->
    
    <!--MOBILE HEADER STARTS-->
    <div class="header-upper header-mobile-nav">
        <div class="auto-container navbar-mobile">
            <div class="logo-outer">
                <div class="logo" style="width:70%">
                    <a href="{{ route('home') }}">
                        @if (!empty($setting->logo))
                            @if(file_exists('uploads/generalSetting/'.$setting->logo))
                                <img src="{{asset('uploads/generalSetting/'.$setting->logo)}}" alt="{{$setting->site_name}}">
                            @else
                                {{$setting->site_name}}
                            @endif
                        @else
                            {{$setting->site_name}}
                        @endif
                    </a>
                </div>
            </div>
            <div class="upper-right clearfix">

                <div class="nav-outer clearfix">
                    <!-- Main Menu -->
                    <nav class="main-menu">
                        <div class="navbar-header">
                            <!-- Toggle Button -->
                            <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>

                        <div class="navbar-collapse collapse clearfix">
                            <ul class="navigation clearfix">
                                <li class="{{ Route::is('home') ? 'current' : ''}}"><a href="{{ route('home') }}">Home</a></li>
                                <li class="dropdown"><a href="#">About us</a>
                                    <ul>
                                        <li><a href="{{ route('about') }}">About Company</a></li>
                                        <li><a href="{{ route('awards') }}">Awards</a></li>
                                        <li><a href="{{ route('mission-vision') }}">Mission & Vision</a></li>
                                        <li><a href="{{ route('chairman-message') }}">Chairman's Message</a></li>
                                        <li><a href="{{ route('organization-chart') }}">Organization's Chart</a></li>
                                        <li><a href="{{ route('strength') }}">Our Strength</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{ route('category') }}">Service Categories</a></li>
                                
                                <li class="dropdown"><a href="#">Our Policies</a>
                                    <ul>
                                        @foreach ($policies as $policy)
                                            <li><a href="{{ route('policy',$policy->slug) }}">{{ $policy->policy_name }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="#">Documents</a>
                                    <ul>
                                        <li><a href="{{ route('demand-documents') }}">Demand Documents</a></li>
                                        <li><a href="{{ route('company-documents') }}">Company Documents</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="#">Employer</a>
                                    <ul>
                                        @php
                                            $page=App\Models\Page::where('slug','documents-required')->first();
                                            if($page==null){
                                                App\Models\Page::create([
                                                    'title'=>'Documents Required',
                                                    'slug'=>'documents-required',
                                                    'content'=>'Your content goes here'
                                                ]);
                                            }
                                        @endphp
                                        <li><a href="{{ route('custom_page',$page->slug) }}">Documents Required</a></li>
                                        <li><a href="{{ route('carrer') }}">Apply Now</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="#">Other</a>
                                    <ul>
                                        <li><a href="{{ route('current-demands') }}">Current Demands</a></li>
                                        <li><a href="{{route('photos')}}">Gallery</a></li>
                                        <li><a href="{{ route('hiring-process') }}">Hiring Process</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{ route('contact') }}">Contact Us</a></li>
                            </ul>
                        </div>
                    </nav>

                   
                </div>

            </div>
        </div>
    </div>
    <!--MOBILE HEADER ENDS-->

    <!--Sticky Header-->
    <div class="sticky-header">
        <div class="auto-container clearfix">
            <div class="logo pull-left" style="width:10%">
                <a href="{{ route('home') }}" class="img-responsive">
                @if (!empty($setting->sticky_logo))
                        @if(file_exists('uploads/generalSetting/'.$setting->sticky_logo))
                            <img src="{{asset('uploads/generalSetting/'.$setting->sticky_logo)}}" alt="{{$setting->site_name}}">
                        @else
                            <img src="{{asset('uploads/generalSetting/'.$setting->logo)}}" alt="{{$setting->site_name}}">
                        @endif
                    @else
                        <img src="{{asset('uploads/generalSetting/'.$setting->logo)}}" alt="{{$setting->site_name}}">
                    @endif    
                </a>
            </div>
            <div class="right-col pull-right">
                <nav class="main-menu">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="navbar-collapse collapse clearfix">
                        <ul class="navigation clearfix">
                            <li class="{{ Route::is('home') ? 'current' : ''}}"><a href="{{ route('home') }}">Home</a></li>
                            <li class="dropdown"><a href="#">About Us</a>
                                <ul>
                                    <li><a href="{{ route('about') }}">About Company</a></li>
                                    <li><a href="{{ route('awards') }}">Awards</a></li>
                                    <li><a href="{{ route('mission-vision') }}">Mission & Vision</a></li>
                                    <li><a href="{{ route('chairman-message') }}">Chairman's Message</a></li>
                                    <li><a href="{{ route('organization-chart') }}">Organization's Chart</a></li>
                                    <li><a href="{{ route('strength') }}">Our Strength</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ route('category') }}">Service Categories</a></li>
                            <li class="dropdown"><a href="#">Our Policies</a>
                                <ul>
                                    @foreach ($policies as $policy)
                                        <li><a href="{{ route('policy',$policy->slug) }}">{{ $policy->policy_name }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">Documents</a>
                                <ul>
                                    <li><a href="{{ route('demand-documents') }}">Demand Documents</a></li>
                                    <li><a href="{{ route('company-documents') }}">Company Documents</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">Employer</a>
                                <ul>
                                    <li><a href="{{ route('custom_page',$page->slug) }}">Documents Required</a></li>
                                    <li><a href="{{ route('carrer') }}">Apply Now</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">Other</a>
                                <ul>
                                    <li><a href="{{ route('blogs') }}">Blogs</a></li>
                                    <li><a href="{{ route('current-demands') }}">Current Demands</a></li>
                                    <li><a href="{{route('photos')}}">Gallery</a></li>
                                    <li><a href="{{ route('hiring-process') }}">Hiring Process</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ route('contact') }}">Contact Us</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>