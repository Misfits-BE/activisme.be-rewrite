<?php

namespace Tests\Feature\Frontend;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * Class HomeTest 
 * ---- 
 * PHPUnit testcase for the frontend index route
 * 
 * @author      Tim Joosten <tim@activisme.be>
 * @copyright   2018 Tim Joosten
 * @package     Tests\Feature\Frontend
 */
class HomeTest extends TestCase
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
