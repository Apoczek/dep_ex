<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Http;
//use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class HttpRequestTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        Http::fake([
            'jsonplaceholder.*' => Http::sequence()
            ->push([
                'userId' => 123
            ])
            ->push([
                'userId' => 456
            ])
        ]);
    }
    /** @test */
    public function playing_around_with_requests_in_laravel_7()
    {
        $response = Http::post('https://jsonplaceholder.typicode.com/posts', [
            'userId' => 456
        ]);

        Http::assertSent(function($request) {
            return $request->url() == 'https://jsonplaceholder.typicode.com/posts';
        });
    }
}
