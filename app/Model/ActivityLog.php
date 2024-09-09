<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    protected $table = 'activity_log';

    protected $fillable = [
        'action',
        'subject_id',
        'causer_id',
        'causer_name',
        'data'
    ];
}
