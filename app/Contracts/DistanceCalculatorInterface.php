<?php

namespace App\Contracts;

interface DistanceCalculatorInterface
{
    public function calculate(float $latitude, float $longitude): float;
}
