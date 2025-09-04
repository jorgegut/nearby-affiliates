<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AffiliatesRequest extends FormRequest
{
    public function rules()
    {
        return [
            'affiliates_file' => [
                'required',
                'file',
                'mimetypes:application/x-ndjson,application/json',
                'max:10240'
            ]
        ];
    }
}
