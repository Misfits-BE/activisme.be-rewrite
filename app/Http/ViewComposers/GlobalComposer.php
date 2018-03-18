<?php 

namespace App\Http\ViewComposers;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\View\View;

/**
 * Class GloablComposer
 * ---- 
 * The view composer that applies variables to all views.
 * 
 * @author      Tim Joosten <tim@activisme.be>
 * @copyright   2018 Tim Joosten
 * @package     App\http\ViewComposers
 */
class GlobalComposer 
{
    /** @var \Illuminate\Contracts\Auth\Guard $auth */
    protected $auth;

    /**
     * GlobalComposer constructor
     * 
     * @param  Guard $auth The authencation guard.
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view  The view contract from laravel.
     * @return void
     */
    public function compose(View $view): void
    {
        $view->with('currentUser', $this->auth->user());
    }
}