<?php

namespace Tests\Feature\Backend\Categories;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Category;
use App\User;

/**
 * Class DeleteTest 
 * ----
 * PHPUnit testcase for delete categories in the application.
 * 
 * @author      Tim Joosten <tim@activisme.be>
 * @copyright   2018 Tim Joosten
 * @package     Tests\Feature\Backend\Categories
 */
class DeleteTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test 
     * @testdox Test if a quest user can't delete a category in the application.
     */
    public function notAuthenticated(): void
    {
        $category = factory(Category::class)->create(); 

        $this->get(route('admin.categories.delete', $category))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    /**
     * @test
     * @testdox Test the error response when we try to delete a category with an invalid id. 
     */
    public function invalidId(): void 
    {
        $user = factory(User::class)->create(); 
        
        $this->actingAs($user)
            ->get(route('admin.categories.delete', ['id' => rand(0, 250)]))
            ->assertStatus(404);
    }

    /**
     * @test
     * @testdox Test the response when we successfull delete a category in the system.
     */
    public function success(): void 
    {
        $user     = factory(User::class)->create();
        $category = factory(Category::class)->create(); 

        $this->actingAs($user)
            ->get(route('admin.categories.delete', $category))
            ->assertStatus(302)
            ->assertRedirect(route('admin.categories.index'))
            ->assertSessionHas([
                $this->flashSession . '.message'    => trans('flash.category.delete', ['name' => $category->name]), 
                $this->flashSession . '.level'      => 'success', 
                $this->flashSession . '.important'  => true
            ]);

            $this->assertDatabaseMissing('categories', ['id' => $category->id]);
    }
}
