<?php 

namespace App\Traits; 

/**
 * Class ActivityLog 
 * ---- 
 * Helper trait for interal user logging 
 * 
 * @author      Tim Joosten <tim@activisme.be>
 * @copyright   2018 Tim Joosten
 * @package     App\Traits
 */
trait ActivityLog
{
    /**
     * Write an activity log to the database. 
     * 
     * @param  string $logName   The name for the log
     * @param  mixed  $model     The model instance where the action happend on. 
     * @param  string $message   The log message that needs to be saved. 
     * @return void
     */
    public function logActivity(string $logName = 'General', $model, string $message): void
    {
        $user = auth()->user();
        activity(ucfirst($logName))->performedOn($model)->causedBy($user)->log($message);
    }
}