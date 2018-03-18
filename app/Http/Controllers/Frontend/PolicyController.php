<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

/**
 * Class PolicyController
 *
 * @author      Tim Joosten <topairy@gmail.com>
 * @copyright   2018 Tim Joosten
 * @package     App\Http\Controllers\Frontend
 */
class PolicyController extends Controller
{
	/**
	 * Page for the disclaimer in the application.
	 *
	 * @return View
	 */
    public function disclaimer(): View
    {
        return view('frontend.policies.disclaimer');
    }
}
