<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Activity;
use App\Models\Booking;

class BookingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $activities = Activity::all();
        // Create a static booking for each activity
        foreach ($activities as $activity) {
            $booking = new Booking();
            $booking->attendance_number = 2;
            $booking->total_price = 25.5;
            $booking->attendance_date = $activity->start_date;
            $booking->activity_id = $activity->id;
            $booking->save();

        }
    }
}
