<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TagPageTest extends TestCase
{
    use RefreshDatabase;
    public function test_tag_page_can_be_render()
    {
        $this->withoutExceptionHandling();
        $response = $this->get('/tags');
        $response->assertStatus(200);
    }
}
