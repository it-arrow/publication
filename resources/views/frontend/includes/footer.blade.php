@php
$pages=App\Models\Page::all();
$social=App\Models\SocialMedia::get();
$setting=App\Models\SiteSetting::first();
$about=App\Models\About::first();
$grievance=App\Models\InCaseGrievance::first();
$blogs=App\Models\Blog::latest()->take(2)->get();
@endphp

<!--Grievance Section-->
<section class="pt-4">
    <div class="row no-gutters">
        <div class="col-md-6">
            <div class="quick-contact-side">
                <h2>In case of Grievance</h2>
                <p>{!! $grievance->content  !!}</p>
                <ul>
                    <li><i class="fa-solid fa-phone"></i>
                        
                        @foreach (explode(',',$grievance->phone) as $key => $phone)
                            
                        <a href="tel:{{ $phone }}">@if ($key!=0), @endif {{ $phone }}</a>
                        @endforeach
                    </li>
                    <li><a href="mailto:{{ $grievance->email }}"><i class="fa-solid fa-envelope"></i>
                            {{ $grievance->email }}</a></li>
                </ul>
                @php
                    $grievance=App\Models\Policy::where('slug','compliance-grievance')->first();
                @endphp
                @if ($grievance!=null)
                    <a href="{{ route('policy',$grievance->slug) }}" class="more">More About Grievance</a>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="quick-map-side">
                {!! $setting->iframe !!}
            </div>
        </div>
    </div>
</section>
<!--Grievance Section Ends-->
    <!--Main Footer-->
    <footer class="main-footer">
    	<div class="auto-container">
        	<!--Widgets Section-->
            <div class="widgets-section">
            	<div class="row clearfix">
					<!--Footer Column-->
                    <div class="footer-column col-md-5 col-sm-12 col-xs-12">
                    	<div class="footer-widget logo-widget">
                            <div class="footer-logo">
                            	<div class="logo" style="width:40%"><a href="{{ route('home') }}">
                                    @if (!empty($setting->footer_logo))
                                        @if(file_exists('uploads/generalSetting/'.$setting->footer_logo))
                                            <img src="{{asset('uploads/generalSetting/'.$setting->footer_logo)}}" alt="{{$setting->site_name}}">
                                        @else
                                            <img src="{{asset('uploads/generalSetting/'.$setting->logo)}}" alt="{{$setting->site_name}}">
                                        @endif
                                    @else
                                        <img src="{{asset('uploads/generalSetting/'.$setting->logo)}}" alt="{{$setting->site_name}}">
                                    @endif
                                
                                </a></div>
                            </div>
                            <div class="widget-content">
                                <div class="text line-clamp">{!! $about->about_content !!}</div><a href="{{ route('about') }}">Read More</a>
                                <h3>Contact:</h3>
                                <div class="row clearfix">
                                	<div class="inner-column col-md-6 col-sm-6 col-xs-12">
                                    	<div class="info-text">{{ $setting->primary_address }}</div>
                                    </div>
                                    <div class="inner-column col-md-6 col-sm-6 col-xs-12">
                                    	<ul>
                                        	<li><span>Ph:</span> {{ $setting->primary_phone }}</a>
                                                @if ($setting->secondary_phone != null)
                                                , {{ $setting->secondary_phone }}
                                                @endif</li>
                                            <li><span>Email:</span> {{ $setting->primary_email }}
                                                @if ($setting->secondary_email != null)
                                                ,{{ $setting->secondary_email }}
                                                @endif</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Footer Column-->
                    <div class="footer-column col-md-7 col-sm-12 col-xs-12">
                    	<div class="row clearfix">
                        
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            	<div class="news-widget">
                                	<h2>Latest News</h2>
                                    <div class="widget-content">
                                        @if (count($blogs)>0)
                                        @foreach ($blogs as $blog)
                                        <article class="post">
                                            <figure class="post-thumb">
                                            	<a href="{{route('blog.detail',$blog->slug)}}">
                                                    @if (!empty($blog->image))
                                                        @if(file_exists('uploads/blogs/'.$blog->image))
                                                            <img src="{{asset('uploads/blogs/'.$blog->image)}}">
                                                        @else
                                                            <img src="{{asset('placeholder.jpg')}}">
                                                        @endif
                                                    @else
                                                        <img src="{{asset('placeholder.jpg')}}">
                                                    @endif
                                                </a>
                                                <a class="overlay"><span class="fa fa-link"></span></a>
                                            </figure>
                                            <div class="content">
                                                <div class="text line-clamp"><a href="{{route('blog.detail',$blog->slug)}}">{{ $blog->title }}</a></div>
                                                <div class="post-info">{{$blog->updated_at->format('F d, Y')}}</div>
                                            </div>
                                        </article>
                                        @endforeach
                                        @endif
                                        
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            	<div class="links-widget">
                                	<h2>Usefull Links</h2>
                                    <div class="widget-content">
                                    	<ul class="links">
                                        	<li><a href="{{ route('about') }}">About Us</a></li>
                                            <li><a href="{{ route('current-demands') }}">Current Demands</a></li>
                                            @foreach ($pages as $page)
                                            <li><a href="{{ route('custom_page',$page->slug) }}">{{ $page->title }}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <!--Footer Bottom-->
        <div class="footer-bottom">
        	<div class="auto-container">
            	<div class="row clearfix">
                	<div class="copyright-column col-md-5 col-sm-12 col-xs-12">
                    	<div class="copyright">Copyrights © {{ date('Y') }} All Rights Reserved by <a href="{{ route('home') }}">{{ $setting->site_name }}</a></div>
                    </div>
                    <div class="nav-column col-md-7 col-sm-12 col-xs-12">
                    <div class="copyright text-right">Designed & Developed by <a href="https://itarrow.com">IT Arrow Pvt. Ltd.</a></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--End Main Footer-->
    
</div>
<!--End pagewrapper-->

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="icon fa fa-arrow-up"></span></div>
