<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

use function PHPUnit\Framework\assertEmpty;

class ActivityControllerTest extends TestCase
{
    /**
     * This test should return all activities
     *
     * @return void
     */
    public function testShouldReturnAllActivities()
    {
        $this->get('activities');

        $this->seeStatusCode(200);

        $this->seeJsonStructure([
            '*' => [
                'id',
                'title',
                'description',
                'start_date',
                'end_date',
                'price',
                'popularity',
                'created_at',
                'updated_at',
            ]
        ]);

    }

    /**
     * This test should return an empty array when looking for activities without date
     *
     * @return void
     */
    public function testShouldReturnEmptyArrayWhenActivityDateIsInvalid()
    {
        $response = $this->get('activities?activityDate=0000-00-00');

        $this->seeStatusCode(200);
        $this->seeJsonStructure([
            '*' => []
        ]);

    }
}
