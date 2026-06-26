<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     */
    public function test_the_application_redirects_to_users(): void
    {
        $response = $this->get('/');

        $response->assertRedirect('/users');
    }

    public function test_users_index_returns_successful_response(): void
    {
        $response = $this->get('/users');

        $response->assertStatus(200);
    }
}

