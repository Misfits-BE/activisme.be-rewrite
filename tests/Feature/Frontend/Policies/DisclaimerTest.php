<?php

namespace Tests\Feature\Frontend\Policies;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * Class DisclaimerTest
 * ----
 * PHPUnit testcase for the policy pages. 
 *
 * @author 		Tim Joosten <tim@activisme.be>
 * @copyright	2018 Tim Joosten
 * @package		Tests\Feature\Frontend\Policies
 */
class DisclaimerTest extends TestCase
{
	/**
	 * @test 
	 * @testdox Test if a guest can view the disclaimer page without problems.
	 */
    public function success(): void 
    {
    	$this->get(route('policy.disclaimer'))->assertStatus(200);
    }
}
