@extends('frontend.layouts.app')
@section('title',$setting->site_name)
@section('content')
<!-- Slider -->
@if (count($sliders)>0)
<section class="owl-carousel top-carousel owl-theme">
    @foreach ($sliders as $key => $slider)
    <div class="item">
        @if (!empty($slider->image))
            @if(file_exists('uploads/sliders/'.$slider->image))
                <img src="{{asset('uploads/sliders/'.$slider->image)}}" class="img-fluid">
            @endif
        @endif
        <div class="overlay"></div>
        <div class="carousel-search">
            <div class="row">
                <div class="col-lg-7 col-md-12">
                    <div class="carousel-left-text-overlay car-paragraph p-5">
                        <h2 class="panel-heading text-light text-left pl-0">{{$slider->title}}</h2>
                        <p class="top-caption text-light text-left">{{$slider->text}}</p>
                        <div class="browse-all text-left">
                            <a href="{{route('category')}}">Browse All Categories</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12">
                    <div class="home-callback">
                        <form action="{{route('callback')}}" method="POST">
                            <div class="modal-body">
                                @csrf
                                <div class="form-group">
                                    <label for="fname">Full Name<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="fname" name="name" placeholder="Enter Full Name" required>
                                </div>
                                <div class="form-group">
                                    <label for="mnumber">Mobile Number<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="mnumber" name="phone" placeholder="Enter Mobile Number"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address"
                                        >
                                </div>
                                <!-- <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="timefrom">Convinient Time From</label>
                                        <input type="time" class="form-control" id="timefrom" placeholder="Time From" name="time_from" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="timeto">Convinient Time To</label>
                                        <input type="time" class="form-control" id="timeto" placeholder="Time To" name="time_to" required>
                                    </div>
                                </div> -->                            
                            </div>
                            <div class="text-left">
                                <button type="submit" class="btn btn-primary home-modal-btn">Request A Callback</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>            
        </div>
    </div>
    @endforeach
</section>
@endif
<section class="section-padding">
    <div class="container">
    <div class="carousel-left-text-overlay">
                        <h2 class="panel-heading"><!-- {{$slider->title}} -->Find any home service you want.</h2>
                        <p class="top-caption"><!-- {{$slider->text}} -->Each and every service at your doorstep.</p>
                        <form class="form-inline book-now-home" action="{{route('search')}}" method="GET">
                            {{-- <div class="form-group">
                                <div class="input-group">
                                    <select class="js-example-basic-single form-control" name="service" required>
                                        <option selected disabled>Select Service</option>
                                        @foreach ($services as $service)
                                            <option value="{{$service->id}}">{{$service->name}}</option>
                                        @endforeach
                                    </select>
                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group location-code">
                                    <input type="text" class="form-control zipcode" id="zipcode" name="address" placeholder="Address" required/>
                                </div>
                            </div> --}}
                            <input type="text" class="form-control zipcode" id="search" name="search" placeholder="What service do you need?" required/>
                            <button type="submit" class="btn btn-primary booknow btn-skin">Search</button>
                        </form>
                    </div>
    </div>
</section>
<!-- Slider Ends-->
<!--OUR SERVICES STARTS-->
@if (count($categories)>0)
<section class="section-padding" id="services">
    <div class="container">
        <div class="heading-all">
            <h2>OUR SERVICES</h2>
        </div>
        <div class="row">
            @foreach ($categories as $key => $category)
            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="service-box">
                    <a href="{{route('services',$category->slug)}}">
                        <div class="service-image">
                            @if (!empty($category->icon))
                                @if(file_exists('uploads/services/category/'.$category->icon))

                                    <img src="{{asset('uploads/services/category/'.$category->icon)}}" class="img-fluid">
                                @endif
                            @endif
                        </div>
                        <h6 class="text-center">{{$category->name}}</h6>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center view-all-services">
            <a href="{{route('category')}}">View All</a>
        </div>
    </div>
</section>

@endif

<!--OUR SERVICES ENDS-->
<!--WHY US STARTS-->
@if ($whyus!=null)
<section class="why-us section-padding">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="why-us-left">
                    <h2>{{$whyus->title}}</h2>
                    <p>{!! $whyus->description !!}</p>
                    
                </div>
            </div>
            <div class="col-lg-6">
                <div class="why-us-right">
                    @if (file_exists('uploads/whyus/'.$whyus->image))
                        <img src="{{asset('uploads/whyus/'.$whyus->image)}}" alt="Left Image" class="img-fluid">
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endif
<!--WHY US ENDS-->
<!--TRUST AND SECURITY STARTS-->
@if ($trusts!=null)
<section id="trust-security" class="section-padding">
    <div class="container text-center">
        <h2 class="panel-heading-small text-center">Your Trust and Security</h2>
        <div class="row text-left">
            @foreach ($trusts as $trust)
                <div class="col-lg-4 col-md-6">
                    <div class="icon_box_one">
                        <div class="icons">
                            @if ($trust->icon!=null)
                                <img src="{{asset('uploads/trusts/'.$trust->icon)}}" alt="{{$trust->title}}" />
                            @endif
                        </div>
                        <div class="box_content line-clamp-4">
                            <h4>{{$trust->title}}</h4>
                            <p>{{$trust->description}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif
<!--TRUST AND SECURITY ENDS-->

<!--BLOGS STARTS-->
@if (count($blogs)>0)
<div class="section-padding blogs">
    <div class="container">
        <div class="heading-all">
            <h2>OUR BLOGS</h2>
        </div>
        <div class="row">
            @foreach ($blogs as $blog)
            <div class="col-lg-4 col-md-6">
                <div class="blog-post-area">
                    <div class="blog-image">
                        <a href="{{route('blog.detail',$blog->slug)}}">
                            @if (!empty($blog->image))
                                @if(file_exists('uploads/blogs/'.$blog->image))
                                    <img src="{{asset('uploads/blogs/'.$blog->image)}}" class="img-fluid">
                                @else
                                    <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                                @endif
                            @else
                                <img src="{{asset('placeholder.jpg')}}" class="img-fluid">
                            @endif
                        </a>
                    </div>
                    <div class="blog-details line-clamp-4">
                        <h5>{{$blog->title}}</h5>
                        <div class="blog-time">
                            <span><i class="fa-solid fa-clock"></i></span><span> {{$blog->updated_at->format('d F Y')}}</span>
                        </div>
                        <p>
                            {!! Str::words($blog->description , 15, ' ...') !!}
                        </p>
                        <a href="{{route('blog.detail',$blog->slug)}}">Read More</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="view-all-button text-center">
            <a href="{{route('blogs')}}">View All</a>
        </div>
    </div>
</div>
@endif
<!--BLOGS ENDSS-->
<!--TESTIMONIAL STARTS-->
@if (count($testimonials)>0)
<div class="section-padding" id="testimonial">
    <div class="container">
    <div class="heading-all">
            <h2>WHAT OUR CLIENT HAS TO SAY</h2>
        </div>
    <div class="row">
      <div class="col-md-12">
        <div id="testimonial-slider" class="owl-carousel">
            @foreach($testimonials as $testimonial)
                <div class="testimonial">
                    <div class="pic">
                        @if (!empty($testimonial->image))
                            @if(file_exists('uploads/testimonials/'.$testimonial->image))
                                <img src="{{asset('uploads/testimonials/'.$testimonial->image)}}">
                            @else
                                <img src="{{asset('category/no-image.png')}}">
                            @endif
                        @else
                            <img src="{{asset('category/no-image.png')}}">
                        @endif
                    </div>
                    <p class="description">
                      {{$testimonial->message}}
                    </p>
                    <h3 class="title">{{$testimonial->name}}</h3>
                    <small class="post">{{$testimonial->designation}}</small>
                </div>
            @endforeach
        </div>
      </div>
    </div>
  </div>
</div>
@endif
  <!--TESTIMONIAL ENDS-->
<!--OUR PARTNERS STARTS-->
@if (count($clients)>0)

<section class="section-padding carousel-partner">
    <div class="container">
        <div class="heading-all">
            <h2>OUR CLIENTS</h2>
        </div>
        <div class="owl-carousel owl-theme owl-partner">
            @foreach ($clients as $client)
            @if (!empty($client->image))
                @if(file_exists('uploads/clients/'.$client->image))
                    <div class="item">
                        <div class="partner-image">
                            <a href="{{$client->url}}" target="_blank">
                                <img src="{{asset('uploads/clients/'.$client->image)}}" alt="{{$client->name}}" class="img-fluid">
                            </a>
                        </div>
                    </div>
                @endif
            @endif
            @endforeach
            
        </div>
    </div>
</section>
@endif

<!--OUR PARTNERS ENDS-->
<!--EXPERIENCE STARTS-->
@if (count($counters)>0)
<section id="numbers" class="section-padding">
    <div class="container text-center">
        <div class="row">
            @foreach ($counters as $counter)
            <div class="col-lg-3 col-md-6 col-sm-6">
                <!--COUNTER BOX-->
                <div class="counter_box text-center">
                    <div class="counter_icon">
                        <img src="{{asset('uploads/counter/'.$counter->icon)}}" alt="">
                        {{-- <i class="fa-solid fa-thumbs-up"></i> --}}
                    </div>
                    <div class="counter_number counter">
                        <span class="stat-count">{{$counter->stat_counter}}</span>
                    </div>
                    <h4 class="counter_name">{{$counter->title}}</h4>
                </div>
                <!--COUNTER BOX ENDS-->
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
<!--EXPERIENCE ENDS-->
@if ($setting->popup_status==1)
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body text-center">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                @if ($setting->popup!=null)
                <img src="{{asset('uploads/popup/'.$setting->popup)}}"  />
                @endif
                {{-- <img src="https://images.unsplash.com/photo-1433086966358-54859d0ed716?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" alt="Test" class="" img-fluid "> --}}
            </div>
        </div>

    </div>
</div>
@endif
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
@endsection
