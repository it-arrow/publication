@extends('frontend.layouts.app')
@section('title','Gallery')


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
    Gallery
    @endif
    
    @endslot

    @slot('sub_title')
    @if ($breadcrumb!=null)
    {{json_decode($breadcrumb->value)->sub_title}}
    @else
    Photo Gallery
    @endif
    
    @endslot

@endcomponent
@if ($photos!=null)
<section class="section-padding">
    <div class="container">
    <p><section class="img-gallery-magnific match-height">
        @foreach ($photos as $photo)
        <div class="magnific-img">
            @if (file_exists('uploads/gallery/photos/'.$photo->photos))
            <a class="image-popup-vertical-fit" href="{{ asset('uploads/gallery/photos/'.$photo->photos) }}" title="Photo Gallery">
                <img src="{{ asset('uploads/gallery/photos/'.$photo->photos) }}" alt="Photo Gallery" />
            </a>
            @endif
        </div>
        @endforeach
		</section>
		<div class="clear"></div>
		<div class="paginate-photo">
            {{ $photos->links() }}
        </div>
	</p>
    </div>
</section>
@endif
@endsection
<!--GALLERY-->
{{-- <section id="homeGallery" class="product-gallery mx-auto section-padding">
    <div class="container">
        <h2 class="section-heading mb-5">Gallery</h2>
        <div class="gallery-flex">
            <div class="row">
                @if (!empty($photos))
                @foreach (json_decode($photos->photos) as $photo)
                    @if (!empty($photo))
                        @if(file_exists('uploads/gallery/photos/'.$photo))
                            
                            <div class="col-lg-4 col-md-4">
                                <div class="gallery-image">
                                    <a href="{{asset('uploads/gallery/photos/'.$photo)}}" data-fancybox="gallery">
                                        <img src="{{asset('uploads/gallery/photos/'.$photo)}}" alt="Image">
                                    </a>
                                </div>
                            </div>
                        @else
                            <div class="col-lg-4 col-md-4">
                                <div class="gallery-image">
                                    <a href="javascript:" data-fancybox="gallery">
                                        <img src="{{asset('placeholder.jpg')}}" alt="Image">
                                    </a>
                                </div>
                            </div>
                            
                        @endif
                    @else
                    <div class="col-lg-4 col-md-4">
                        <div class="gallery-image">
                            <a href="javascript:" data-fancybox="gallery">
                                <img src="{{asset('placeholder.jpg')}}" alt="Image">
                            </a>
                        </div>
                    </div>
                    @endif
                @endforeach
            @else
                Sorry, No Photos Found...
            @endif
             
            </div>
        </div>
    </div>
</section> --}}