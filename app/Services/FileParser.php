<?php

namespace App\Services;

use App\Contracts\AffiliatesParserInterface;

class FileParser implements AffiliatesParserInterface
{
    public function parse(\Illuminate\Http\UploadedFile $file): array
    {
        $parsedContent = [];

        foreach (file($file) as $line)  {
            $data = json_decode($line, true);
            if (!isset($data['affiliate_id'], $data['latitude'], $data['longitude'])) {
                continue; // skip invalid lines
            }
            $parsedContent[] = $data;
        }

        return $parsedContent;
    }
}
