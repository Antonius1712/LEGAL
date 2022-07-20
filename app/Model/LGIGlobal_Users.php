<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class LGIGlobal_Users extends Authenticatable
{
    protected $connection = 'LGIGlobal';

    protected $table = 'Users';

    public function getDept(){
        return $this->belongsTo(LGIGlobal_Dept::class, 'DeptCode', 'DeptCode');
    }

    public function getBranch(){
        return $this->belongsTo(LGIGlobal_Branch::class, 'BranchCode', 'BranchCode');
    }
}
