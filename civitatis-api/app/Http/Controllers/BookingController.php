<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Activity;

class BookingController extends Controller
{
    // List all bookings
    public function index()
    {
        return Booking::all();
    }
    
    // Creates a new booking, upgrades the popularity of the activity by the amount of people who booked
    public function store(Request $request)
    {

        // Check if the id and the date provided are valid in case the request was tampered in the frontend
        $activity = Activity::where('start_date','<=',$request->attendanceDate)
            ->where('end_date','>=',$request->attendanceDate)
            ->where('id',$request->activityId)
            ->first()
            ;
        // If doesn't find it, return a 404 message
        if (!$activity){
            return response(['Activity not found'], 404);
        }
        // Calculate total price
        $totalPrice = $request->attendanceNumber * $activity->price;

        // Add new booking
        $booking = new Booking();
        $booking->attendance_number = $request->attendanceNumber;
        $booking->total_price = $totalPrice;
        $booking->attendance_date = $request->attendanceDate;
        $booking->activity_id = $request->activityId;
        $booking->save();

        // Increase the popularity of the activity
        $activity->popularity = $activity->popularity + $request->attendanceNumber;
        $activity->save();

        return response($booking, 201);
    }



}
