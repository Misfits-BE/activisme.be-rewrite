<?php

namespace App\Http\Controllers\Backend;

use Illuminate\View\View;
use App\Http\Controllers\Controller;

/**
 * Class IndexController 
 * 
 * @author      Tim Joosten
 * @copyright   2018 Tim Joosten
 * @package     App\Http\Controllers\Backend
 */
class IndexController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return View
     */
    public function index(): View
    {
        return view('backend.index');
    }
}
