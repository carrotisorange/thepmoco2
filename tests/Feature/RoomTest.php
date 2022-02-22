<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Str;

class RoomTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_render_create_room_page()
    {
        $this->withExceptionHandling();

        $response = $this->get('room/'.Str::random(10).'/create');

        $response->assertStatus(200);
    }
}
