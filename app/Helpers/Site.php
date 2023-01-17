<?php
namespace App\Helpers;

use App\Model\ActivityLog;

class Site {
    protected $action;
    
    public function __construct()
    {
        $this->action = array(
            '1' => 'Storing Data',
            '2' => 'Updating Data',
            '3' => 'Deleting Data'
        );
    }
    public function SaveActivityLog($data, $activity, $subject_id = null){
        $log = new ActivityLog;
        $log->action = $this->action[$activity];
        $log->subject_id = $subject_id;
        $log->causer_id = auth()->user()->UserId;
        $log->causer_name = auth()->user()->Name;
        $log->data = json_encode($data);
        $log->save();
    }
}