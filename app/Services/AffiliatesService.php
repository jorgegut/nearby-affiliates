<?php

namespace App\Services;

use App\Contracts\AffiliatesServiceInterface;
use App\Contracts\AffiliatesParserInterface;
use App\Contracts\DistanceCalculatorInterface;

class AffiliatesService implements AffiliatesServiceInterface
{
    public function __construct(
        protected AffiliatesParserInterface $parser,
        protected DistanceCalculatorInterface $distanceCalculator
    ) {}

    public function getNearbyAffiliates(\Illuminate\Http\UploadedFile $file, float $maxDistance): array
    {
        $affiliates = $this->parser->parse($file);
        $nearby = [];

        foreach ($affiliates as $affiliate) {
            $distance = $this->distanceCalculator->calculate(
                (float) $affiliate['latitude'],
                (float) $affiliate['longitude']
            );

            if ($distance <= $maxDistance) {
                $nearby[$affiliate['affiliate_id']] = $affiliate['name'];
            }
        }

        // Sorts Affiliates by Id Ascending
        ksort($nearby);

        return $nearby;
    }
}
