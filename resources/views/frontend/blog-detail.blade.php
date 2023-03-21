@extends('frontend.layouts.app')
@section('content')
<!--Page Title-->
<section class="page-title"
    style="background-image:linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.6)),url('uploads/breadcrumb/{{$setting->breadcrumb}}');">
    <div class="auto-container">
        <h1>Blog</h1>
        <div class="title">{{ $blog->title }}</div>
    </div>
    <!--Page Info-->
    <div class="page-info">
        <div class="auto-container">
            <div class="inner-container">
                <ul class="bread-crumb">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>{{ $blog->title }}</li>
                </ul>
            </div>
        </div>
    </div>
    <!--End Page Info-->
</section>
<!--End Page Title-->
<!--Blog Page Start-->
<section id="blog-area" class="blog-with-sidebar-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="blog-post">
                    <!--Start single blog post-->
                    <div class="single-blog-post">
                        <div class="img-holder"> 
                            @if (!empty($blog->image))
                                @if(file_exists('uploads/blogs/'.$blog->image))
                                    <img src="{{asset('uploads/blogs/'.$blog->image)}}">
                                @else
                                    <img src="{{asset('placeholder.jpg')}}">
                                @endif
                            @else
                                <img src="{{asset('placeholder.jpg')}}">
                            @endif
                            <div class="date_more">
                                <div class="overlay-style-two"> {{$blog->updated_at->format('d')}}<br />
                                    {{$blog->updated_at->format('M')}} </div>
                                <div class="text-holder">
                                    <h3 class="blog-title">{{$blog->title}}</h3>
                                    <div class="meta-info clearfix">
                                        <ul class="post-info">
                                            {{-- <li><i class="fa fa-user" aria-hidden="true"></i><a href="#">Mano</a></li> 
                                            <li><i class="fa fa-eye" aria-hidden="true"></i><a href="#">95 Views</a>
                                            </li>
                                            <li><i class="fa fa-comment-o" aria-hidden="true"></i> <a href="#">5
                                                    Comments</a></li>--}}
                                            <li><i class="fa fa-tags" aria-hidden="true"></i><a href="#">{{$blog->tags}}</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="text">
                                {!!$blog->description!!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Blog Page End-->
@endsection