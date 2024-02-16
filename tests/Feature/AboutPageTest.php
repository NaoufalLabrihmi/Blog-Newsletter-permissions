<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AboutPageTest extends TestCase
{
    use RefreshDatabase;
    public function test_example()
    {
        $this->withoutExceptionHandling();
        $response = $this->get('/about');

        $response->assertStatus(200);
    }
}
