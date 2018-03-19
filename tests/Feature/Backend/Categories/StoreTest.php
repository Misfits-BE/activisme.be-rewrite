<?php

namespace Tests\Feature\Backend\Categories;

use Tests\TestCase;
use App\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * Class StoreTest 
 * ---- 
 * PHPUnit testcase for storing a new category 
 * 
 * @author      Tim Joosten <tim@activisme.be>
 * @copyright   2018 Tim Joosten
 * @package     Tests\Feature\Backend\Categories
 */
class StoreTest extends TestCase
{
    use RefreshDatabase; 

    /**
     * @test
     * @testdox Test if an unauthenticated user can't create a new category
     */
    public function unAuthenticated(): void 
    {
        $input = ['name' => 'test category', 'description' => 'Category description']; 

        $this->post(route('admin.categories.store'), $input)
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    /**
     * @test 
     * @testdox Test if an authenticated user can store a new category in the system. 
     */
    public function success(): void 
    {
        $user = factory(User::class)->create(); 
        $input = ['name' => 'test category', 'description' => 'Category description']; 

        $this->actingAs($user)
            ->post(route('admin.categories.store'), $input)
            ->assertStatus(302)
            ->assertRedirect(route('admin.categories.index'))
            ->assertSessionHas([
                $this->flashSession . '.message' => trans('flash.category.create', ['name' => $input['name']]),
                $this->flashSession . '.level'   => 'success'
            ]);

            $this->assertDatabaseHas('categories', $input);
    }

    /**
     * @test 
     * @testdox Test the max validation rule for the name field. 
     */
    public function validationMaxName(): void 
    {
        $user  = factory(User::class)->create();
        $input = ['name' => str_random(100), 'description' => 'Category description'];

        $this->actingAs($user)
            ->post(route('admin.categories.store'), $input)
            ->assertSessionhasErrors([
                'name' => trans('validation.max.string', ['max' => 50, 'attribute' => 'name'])
            ]);
    }

    /**
     * @test
     * @testdox Test the required validation rule for the name field.
     */
    public function validationRequiredName(): void 
    {
        $user  = factory(User::class)->create();
        $input = ['description' => 'category description'];
        
        $this->actingAs($user)
            ->post(route('admin.categories.store'), $input)
            ->assertSessionHasErrors(['name' => trans('validation.required', ['attribute' => 'name'])]);
    }

    /**
     * @test 
     * @testdox Test the string validation rule for the name field. 
     */
    public function validationStringName(): void
    {
        $user  =   factory(User::class)->create();
        $input = ['name' => rand(0, 20), 'description' => 'Category description']; 
    
        $this->actingAs($user)
            ->post(route('admin.categories.store'), $input)
            ->assertSessionHasErrors(['name' => trans('validation.string', ['attribute' => 'name'])]);
    }

    /**
     * @test 
     * @testdox Test the string validation rule for the description field.
     */
    public function validationStringDescription(): void
    {
        $user  = factory(User::class)->create(); 
        $input = ['name' => 'Category name', 'description' => rand(0, 50)];

        $this->actingAs($user)
            ->post(route('admin.categories.store'), $input)
            ->assertSessionHasErrors(['description' => trans('validation.string', ['attribute' => 'description'])]);
    }

    /**
     * @test
     * @testdox Test the required validation rule for the description field.
     */
    public function validationRequiredDescription(): void 
    {
        $user  = factory(User::class)->create();
        $input = ['name' => 'Category name'];
        
        $this->actingAs($user)
            ->post(route('admin.categories.store'), $input)
            ->assertSessionHasErrors(['description' => trans('validation.required', ['attribute' => 'description'])]);
    }
}
