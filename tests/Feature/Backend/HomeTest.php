<?php

namespace Tests\Feature\Backend;

use Tests\TestCase;
use App\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * Class HomeTest 
 * ---- 
 * PHPUnit testcase for the backend index route.
 * 
 * @author      Tim Joosten <tim@activisme.be>
 * @copyright   2018 Tim Joosten
 * @package     Tests\Feature\Backend
 */
class HomeTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * @testdox Test the status code and response when the user is not authenticated.
     */
    public function notAuthenticated(): void 
    {
        $this->get(route('home'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    /**
     * @test
     * @testdox Test the backend index when the user is authenticated.
     */
    public function authenticated(): void 
    {
        $user = factory(User::class)->create(); 

        $this->actingAs($user)
            ->get(route('home'))
            ->assertStatus(200);
    }
}
