@extends('frontend.layouts.app')
@section('title',$service->name)

@section('content')
<section class="header-second-bg" style="background:url('../uploads/breadcrumb/{{$setting->breadcrumb}}')">
    <div class="breadcrumb-area text-center">
        <h4>Services</h4>
        <p><a href="{{route('home')}}">Home</a> > {{$service->name}}</p>
    </div>
</section>
<section class="section-padding light-bg">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="service-details">
                    @php
                        $str = $service->name;
                        //exclude first word
                        $result=substr(strstr($str," "), 1)
                    @endphp 
                    <h2><span> {{strtok($str, " ")}}</span> {{$result}}</h2>
                    {!! $service->description !!}
                </div>
                <div class="book-service">
                    <h5 class="mb-3">Book Your Service Now</h5>
                    <ul>
                        <!--<li><a href="viber://chat?number={{$setting->primary_phone}}" target="_blank" class="viber"><i class="fa-brands fa-viber"></i></a></li>-->
                        @if($setting->whatsapp_no!=null)
                        <li><a href="https://api.whatsapp.com/send?phone=977{{$setting->whatsapp_no}}" target="_blank" class="whatsapp"><i class="fa-brands fa-whatsapp"></i></a></li>
                        @endif
                        <li><a href="tel:{{$setting->primary_phone}}" target="_blank" class="phone"><i class="fa-solid fa-phone"></i> {{$setting->primary_phone}}</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="service-img text-center">
                    @if (!empty($service->image))
                        @if(file_exists('uploads/services/image/'.$service->image))
                            <img src="{{asset('uploads/services/image/'.$service->image)}}" alt="{{$service->name}}"  width="466" height="436">
                        @endif
                    @endif
                </div>
            </div>
        </div>
        
    </div>
</section>
@if ($whyus!=null)
<section class="why-us section-padding bg-light">
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
@endsection