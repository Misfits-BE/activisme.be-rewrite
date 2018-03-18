<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

/**
 * Class IndexController 
 * 
 * @author      Tim Joosten <tim@activisme.be>
 * @copyright   2018 Tim Joosten
 * @package     App\Http\Controllers\Frontend
 */
class IndexController extends Controller
{
    /**
     * Get the frontend index page for the application. 
     * 
     * @return View
     */
    public function index(): View
    {
        return view('frontend.index');
    }
}
