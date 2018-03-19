<?php

namespace Tests\Feature\Backend\Categories;

use Tests\TestCase;
use App\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * Class CreateViewTest 
 * ----
 * PHPUnit testcase for the category create view. 
 * 
 * @author      Tim Joosten <tim@activisme.be>
 * @copyright   2018 Tim Joosten
 * @package     Tests\Feature\Backend\Categories
 */
class CreateViewTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * @testdox test if an authenticated user can view the category page without errors. 
     */
    public function authenticated(): void 
    {
        $user = factory(User::class)->create(); 

        $this->actingAs($user)
            ->get(route('admin.categories.create'))
            ->assertStatus(200);
    }

    /**
     * @test
     * @testdox Test if a quest user can't access the category create page.
     */
    public function unauthenticated(): void 
    {
        $this->get(route('admin.categories.create'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }
}
