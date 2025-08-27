<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class AffiliateIntegrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_affiliate_filtering_endpoint_returns_nearby_affiliates()
    {
        Storage::fake('local');

        $ndjson = <<<NDJSON
{"affiliate_id": 1, "name": "Affiliate A", "latitude": 53.339428, "longitude": -6.257664}
{"affiliate_id": 2, "name": "Affiliate B", "latitude": 52.986375, "longitude": -6.043701}
{"affiliate_id": 3, "name": "Affiliate C", "latitude": 51.92893, "longitude": -10.27699}
NDJSON;

        $filePath = 'test-affiliates.ndjson';
        Storage::disk('local')->put($filePath, $ndjson);

        $file = new UploadedFile(
            Storage::disk('local')->path($filePath),
            'test-affiliates.ndjson',
            'application/x-ndjson',
            null,
            true
        );

        $response = $this->post('/', [
            'affiliates_file' => $file
        ]);

        $response->assertStatus(200);
        $response->assertViewIs('affiliates');
        $response->assertViewHas('results', function ($results) {
            return count($results) === 2 &&
                $results[0]['id'] === 1 &&
                $results[1]['id'] === 2;
        });
    }
}
