@extends('frontend.layouts.app')
@section('title','Payment')

@section('content')
<section class="section-padding">
    <div class="container">
        <div class="heading-all">
            <h2>OUR PAYMENT PLATFORM</h2>
        </div>
        <div class="payment-methods">
            <div class="row">
                @if (count($payment)>0)
                @foreach ($payment as $partner)
                <div class="col-lg-6 col-md-12">
                    <div class="d-flex kv-bg-lightblue text-light justify-content-between p-3 my-2 rounded">
                        <div class="payment-desc">
                            <h5 class="mb-3">Pay Via {{$partner->name}}</h5>
                            <div>A/C No.:{{$partner->account_no}} </div>
                            <div>A/C Holder's Name: {{$partner->account_name}}</div>

                        </div>
                        <div class="payment-img">
                            <figure class="m-0" style="width:150px;height:100px;">
                                <img style="object-fit:contain;" src="{{asset('uploads/payment/'.$partner->image)}}">
                            </figure>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
</section>
@endsection