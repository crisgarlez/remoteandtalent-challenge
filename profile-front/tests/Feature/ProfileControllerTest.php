<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use App\Services\ApiConnectionService;

class ProfileControllerTest extends TestCase
{

    public function test_index_method()
    {
        $response = $this->get(route('profile'));

        $response->assertStatus(200)
            ->assertViewIs('profile.index');
    }

}

