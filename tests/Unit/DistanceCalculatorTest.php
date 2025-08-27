<?php
namespace Tests\Unit;

use App\Services\Constants\OfficeLocation;
use App\Services\DistanceCalculator;
use Tests\TestCase;

class DistanceCalculatorTest extends TestCase
{
    public function test_it_calculates_distance_correctly()
    {
        $calculator = new DistanceCalculator();

        // Coordinates of Dublin office
        $distance = $calculator->calculate(OfficeLocation::latitude, OfficeLocation::longitude);

        $this->assertEquals(0, $distance, '', 0.001); // Should be zero distance to itself
    }

    public function test_it_calculates_distance_to_another_point()
    {
        $calculator = new DistanceCalculator();

        $lat = 52.986375;
        $lon = -6.043701;

        $distance = $calculator->calculate($lat, $lon);

        $this->assertGreaterThan(0, $distance);
        $this->assertLessThan(100, $distance); // Should be within 100km
    }
}
