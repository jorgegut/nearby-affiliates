<?php

namespace App\Contracts;

interface AffiliatesServiceInterface
{
    public function getNearbyAffiliates(\Illuminate\Http\UploadedFile $file, float $maxDistance): array;
}
