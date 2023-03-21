<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'service'=>'required',
            'address'=>'required'
        ]);
        $booking=new Booking();
        $booking->service_id=$request->service;
        $booking->address=$request->address;
        $booking->user_id=Auth::user()->id;
        $booking->save();
        return back()->with('message','Booked Successfully');
    }
}
