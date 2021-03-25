<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

use function PHPUnit\Framework\assertEmpty;

class BookingControllerTest extends TestCase
{
    /**
     * This test should return all activities
     *
     * @return void
     */
    public function testShouldReturnAllActivities()
    {
        $this->get('bookings');

        $this->seeStatusCode(200);

        $this->seeJsonStructure([
            '*' => [
                'id',
                'attendance_number',
                'total_price',
                'attendance_date',
                'activity_id',
                'created_at',
                'updated_at',
            ]
        ]);

    }

}
