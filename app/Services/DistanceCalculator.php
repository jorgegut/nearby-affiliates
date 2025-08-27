<?php

namespace App\Services;

use App\Contracts\DistanceCalculatorInterface;
use App\Services\Constants\OfficeLocation;

class DistanceCalculator implements DistanceCalculatorInterface
{
    protected const EARTH_RADIUS = 6371; // km
    protected float $originLat = OfficeLocation::latitude;
    protected float $originLon = OfficeLocation::longitude;

    public function calculate(float $latitude, float $longitude): float
    {
        $latFrom = deg2rad($this->originLat);
        $lonFrom = deg2rad($this->originLon);
        $latTo = deg2rad($latitude);
        $lonTo = deg2rad($longitude);

        $latDelta = $latTo - $latFrom;
        $lonDelta = $lonTo - $lonFrom;

        $angle = 2 * asin(sqrt(
            pow(sin($latDelta / 2), 2) +
            cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)
        ));

        return self::EARTH_RADIUS * $angle;
    }
}
