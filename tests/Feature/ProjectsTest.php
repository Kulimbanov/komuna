<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProjectsTest extends TestCase
{
    use RefreshDatabase;

    public function test_projects_page_can_be_rendered()
    {
        $response = $this->get('/projects');

        $response->assertStatus(200);
    }
}
