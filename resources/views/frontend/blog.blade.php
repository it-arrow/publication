@extends('frontend.layouts.app')
@section('title','Blogs')

@section('content')
@component('components.breadcrumb')    

    @slot('image_path')
    @if ($breadcrumb!=null)
        @if (json_decode($breadcrumb->value)->breadcrumb_image)
        uploads/breadcrumb/{{json_decode($breadcrumb->value)->breadcrumb_image}}
        @else
        uploads/breadcrumb/{{$setting->breadcrumb}}
        @endif
    
    @else
    uploads/breadcrumb/{{$setting->breadcrumb}}
    @endif
    @endslot
    @slot('page_title')
    @if ($breadcrumb!=null)
    {{json_decode($breadcrumb->value)->page_title}}
    @else
    Blog
    @endif
    
    @endslot

    @slot('sub_title')
    @if ($breadcrumb!=null)
    {{json_decode($breadcrumb->value)->sub_title}}
    @else
    All Blogs
    @endif
    
    @endslot

@endcomponent
<section class="section-padding">
    <div class="container">
        <div class="blogs">
            <div class="row">
                @if (count($blogs)>0)
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
                            <h5 class="match-height"><a href="{{route('blog.detail',$blog->slug)}}">{{$blog->title}}</a></h5>
                            <div class="blog-time">
                                <span><i class="fa-solid fa-clock"></i></span><span> {{$blog->updated_at->format('d F Y')}}</span>
                            </div>
                            <p class="match-height">{!! Str::words($blog->description , 15, ' ...') !!}
                            </p>
                            <a href="{{route('blog.detail',$blog->slug)}}">Read More</a>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
                <div class="paginate-photo">
                    {{$blogs->links()}}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection