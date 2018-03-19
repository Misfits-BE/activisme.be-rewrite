<?php

namespace App\Http\Controllers\Backend;

use Illuminate\View\View;
use App\Repositories\ActivityRepository;
use App\Http\Controllers\Controller;

/**
 * Class ActivityController
 * ---- 
 * Controller for the activity log system. 
 * 
 * @author 		Tim Joosten <tim@activisme.be>
 * @copyright	2018 Tim Joosten
 * @package		App\Http\Controllers\Backend
 */
class ActivityController extends Controller
{
	/** @var \App\Repositories\ActivityRepository $activityRepository */
	private $activityRepository; 

	/**
	 * ActivityController Constructor 
	 *
	 * @param  ActivityRepository $activityRepository Abstraction layer between controller and application.
	 * @return void 
	 */
    public function __construct(ActivityRepository $activityRepository)
    {
    	$this->middleware(['auth']);
    	$this->activityRepository = $activityRepository;
    }

    /**
     * Display the index controllr for the activity logs. 
     *
     * @return View
     */
    public function index() 
    {
    	return view('backend.activities.index', ['activities' => $this->activityRepository->paginateActivities()]);
    }
}
