<?php

namespace Tests\Feature\Home;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * Class FrontendTest
 */
class FrontendTest extends TestCase
{
    /**
     * @test 
     * @testdox Test the frontend index page from the application.
     */
    public function success(): void 
    {
        $this->get(url('/'))->assertStatus(200);
    }
}
