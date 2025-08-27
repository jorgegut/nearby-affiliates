<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use App\Services\AffiliatesService;
use App\Contracts\AffiliatesParserInterface;
use App\Contracts\DistanceCalculatorInterface;

class AffiliatesServiceTest extends TestCase
{
    public function test_it_filters_affiliates_by_distance()
    {
        $mockParser = $this->createMock(AffiliatesParserInterface::class);
        $mockDistance = $this->createMock(DistanceCalculatorInterface::class);

        $mockParser->method('parse')->willReturn([
            ['affiliate_id' => 1, 'name' => 'Jonh Doe', 'latitude' => 53.0, 'longitude' => -6.0],
            ['affiliate_id' => 2, 'name' => 'Layla Hamiltons', 'latitude' => 51.0, 'longitude' => -9.0],
        ]);

        $mockDistance->method('calculate')->willReturnCallback(function ($lat, $lon) {
            return $lat === 53.0 ? 50 : 150;
        });

        $service = new AffiliatesService($mockParser, $mockDistance);

        $fakeFile = $this->createMock(UploadedFile::class);
        $results = $service->getNearbyAffiliates($fakeFile, 100);

        $this->assertCount(1, $results);
        $this->assertEquals(1, $results[0]['id']);
    }
}
