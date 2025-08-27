<?php

namespace App\Contracts;

interface AffiliatesParserInterface
{
    public function parse(\Illuminate\Http\UploadedFile $file): array;
}
