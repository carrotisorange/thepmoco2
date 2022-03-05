<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Str;

class UnitTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_render_create_unit_page()
    {
        $this->withExceptionHandling();

        $response = $this->get('unit/'.Str::random(10).'/create');

        $response->assertStatus(200);
    }
}
