<?php

namespace App\Http\Controllers;

use App\Http\Requests\AffiliatesRequest;
use App\Services\AffiliatesService;

class AffiliatesController extends Controller
{
    protected const MAX_DISTANCE = 100;

    public function __construct(private AffiliatesService $affiliatesService) {}

    public function index() {
        return view('index');
    }

    public function process(AffiliatesRequest $request) {

        $results = $this->affiliatesService->getNearbyAffiliates(
            $request->file('affiliates_file'),
            self::MAX_DISTANCE
        );

        return view('affiliates', ['results' => $results]);
    }
}
