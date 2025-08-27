<?php

namespace Tests\Unit;

use App\Services\FileParser;
use Illuminate\Http\UploadedFile;
use PHPUnit\Framework\TestCase;

class FileParserTest extends TestCase
{

    public function test_it_parses_file_correctly()
    {
        $content = <<<NDJSON
{"affiliate_id": 1, "name": "Affiliate A", "latitude": 53.339428, "longitude": -6.257664}
{"affiliate_id": 2, "name": "Affiliate B", "latitude": 52.986375, "longitude": -6.043701}
NDJSON;

        $file = UploadedFile::fake()->create('affiliates.txt', 1, 'text/plain');

        // Inject the content into the fake file
        file_put_contents($file->getPathname(), $content);

        $parser = new FileParser();
        $result = $parser->parse($file);

        $this->assertCount(2, $result);
        $this->assertEquals(1, $result[0]['affiliate_id']);
        $this->assertEquals("Affiliate B", $result[1]['name']);

        unlink($file->getPathname()); // Clean up
    }

    public function test_it_parses_invalid_file_correctly()
    {
        $content = <<<NDJSON
kjdasljdl
jasdjaklsjd asjksad
NDJSON;

        $file = UploadedFile::fake()->create('affiliates.txt', 1, 'text/plain');

        // Inject the content into the fake file
        file_put_contents($file->getPathname(), $content);

        $parser = new FileParser();
        $result = $parser->parse($file);

        $this->assertCount(0, $result);
        $this->assertEquals([], $result);

        unlink($file->getPathname()); // Clean up
    }
}

