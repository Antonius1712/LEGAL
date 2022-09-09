<?php

namespace App\Http\Middleware;

use App\Model\LGIGlobal_Groups;
use App\Model\Status;
use Closure;
use Illuminate\Support\Facades\View;

class ValidasiGroup
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function __construct(){
        /* 
        ----LIST USERGROUP----
        USER_CLAIM, 
        ANALYST_CLAIM, 
        HEAD_CLAIM, 
        USER_LEGAL, 
        HEAD_LEGAL 
        */    
    }

    public function handle($request, Closure $next)
    {

        $user = Auth()->user()->getUserGroup->pluck('GroupCode')->toArray();
        $Group = LGIGlobal_Groups::where('AppCode', 'LEGAL')
                    ->pluck('GroupCode')
                    ->toArray();
        
        $AuthGroup = array_values(array_intersect($Group, $user))[0];

        // SELAIN GROUP USER_CLAIM, TIDAK BISA CREATE.
        if( $request->segment(2) === 'create' ){
            if( $AuthGroup != 'USER_CLAIM' ){
                return abort(404);
            }
        }

        View::share('userGroup', $AuthGroup);
        View::share('Status', Status::orderby('order', 'asc'));
        return $next($request);
    }
}
