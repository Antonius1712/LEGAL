<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class LogSheetBPKB extends Model
{
    protected $table = 'log_sheet_bpkb';
    protected $fillable = [
        'sheet_id',
        'user_id',
        'user_name',
        'action',
        'next_email_role',
        'email_sent',
        'reject_email_user_id',
        'comment',
    ];

    public function GetCreatedByData(){
        return $this->hasOne(LGIGlobal_Users::class, 'UserId', 'user_id');
    }

    public function getRejectUserLegalData(){
        return $this->hasOne(LGIGlobal_Users::class, 'UserId', 'reject_email_user_id');
    }
}
