<?php

namespace Tests\Feature\Backend\Categories;

use Tests\TestCase;
use App\User;
use App\Models\Category;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * Class EditViewTest
 * ----
 * PHPUnit testcase for the categories edit view.
 *
 * @author 		Tim Joosten <tim@activisme.be>
 * @copyright	2018 Tim Joosten
 * @package		Tests\Feature\Backend\Categories
 */
class EditViewTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * @testdox Test the response when an unauthenticated user tries to access the edit view.
     */
    public function unauthenticated(): void
    {
    	$category = factory(Category::class)->create();

    	$this->get(route('admin.categories.edit', $category))
    		->assertStatus(302)
    		->assertRedirect(route('login'));
    }

    /**
     * @test 
     * @testdox Test if a authenticated user can view the edit view.
     */
    public function authenticated(): void
    {
    	$category = factory(Category::class)->create();
    	$user     = factory(User::class)->create();

    	$this->actingAs($user)
    		->get(route('admin.categories.edit', $category))
    		->assertStatus(200);
    }

    /**
     * @test
     * @testdox Test the response when we try to access a category with an invalid id. 
     */
    public function invalidId(): void
    {
    	$user = factory(User::class)->create();

    	$this->actingAs($user)
    		->get(route('admin.categories.edit', ['id' => rand(0, 250)]))
    		->assertStatus(404);
    }
}
