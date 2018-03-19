<?php

namespace Tests\Feature\Backend\ActivityLog;

use Tests\TestCase;
use App\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class IndexTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * @testdox Test if an authenticated user can access the application logs
     */ 
    public function authenticated(): void 
    {
    	$user = factory(User::class)->create();

    	$this->actingAs($user)
    		->get(route('admin.activities.index'))
    		->assertStatus(200);
    }

    /**
     * @test 
     * @testdox Test if an unauthenticated user can't access the application logs.
     */
    public function unauthenticated(): void
    {
    	$this->get(route('admin.activities.index'))
    		->assertStatus(302)
    		->assertRedirect(route('login'));
    }
}
