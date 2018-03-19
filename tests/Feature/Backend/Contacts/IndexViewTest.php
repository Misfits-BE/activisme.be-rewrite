<?php

namespace Tests\Feature\Backend\Contacts;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * Class IndexViewTest
 * ----
 * PHPUnit testcase for the contacts index page. 
 * 
 * @author      Tim Joosten <topairy@gmail.com>
 * @copyright   2018 Tim Joosten
 * @package     Tests\Feature\Backend\Contacts
 */
class IndexViewTest extends TestCase
{
    use RefreshDatabase; 

    /**
     * @test
     * @testdox
     */
    public function authenticated(): void 
    {

    }

    /**
     * @test
     * @testdox
     */
    public function unAuthenticated(): void 
    {

    }
}
