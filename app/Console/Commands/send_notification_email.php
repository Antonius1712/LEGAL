<?php

namespace App\Console\Commands;

use App\Model\LGIGlobal_Users;
use App\Model\LogSheetBPKB;
use App\Model\SheetBpkb;
use Illuminate\Console\Command;

class send_notification_email extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'job:send-notification-email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'SEND NOTIFICATION VIA EMAIL';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->ListUserClaim = LGIGlobal_Users::where('status', 1)
                    ->where('Email', '!=', '')
                    ->where('Email', '!=', null)
                    ->whereHas('getUserGroup', function($query1){
                        $query1
                        ->where('GroupCode', 'USER_CLAIM')
                        ->whereHas('getGroups', function($query2){
                            $query2->whereHas('getApp', function($query3){
                                $query3->where('AppName', 'LEGAL');
                            });
                        });
                    })
                    ->with('getDept')
                    ->with('getBranch')
                    ->get();
        
        $this->ListAnalystClaim = LGIGlobal_Users::where('status', 1)
                    ->where('Email', '!=', '')
                    ->where('Email', '!=', null)
                    ->whereHas('getUserGroup', function($query1){
                        $query1
                        ->where('GroupCode', 'ANALYST_CLAIM')
                        ->whereHas('getGroups', function($query2){
                            $query2->whereHas('getApp', function($query3){
                                $query3->where('AppName', 'LEGAL');
                            });
                        });
                    })
                    ->with('getDept')
                    ->with('getBranch')
                    ->get();

        $this->ListHeadClaim = LGIGlobal_Users::where('status', 1)
                    ->where('Email', '!=', '')
                    ->where('Email', '!=', null)
                    ->whereHas('getUserGroup', function($query1){
                        $query1
                        ->where('GroupCode', 'HEAD_CLAIM')
                        ->whereHas('getGroups', function($query2){
                            $query2->whereHas('getApp', function($query3){
                                $query3->where('AppName', 'LEGAL');
                            });
                        });
                    })
                    ->with('getDept')
                    ->with('getBranch')
                    ->get();

        $this->ListUserLegal = LGIGlobal_Users::where('status', 1)
                    // ->where('Email', '!=', '')
                    // ->where('Email', '!=', null)
                    ->whereHas('getUserGroup', function($query1){
                        $query1
                        ->where('GroupCode', 'USER_LEGAL')
                        ->whereHas('getGroups', function($query2){
                            $query2->whereHas('getApp', function($query3){
                                $query3->where('AppName', 'LEGAL');
                            });
                        });
                    })
                    ->with('getDept')
                    ->with('getBranch')
                    ->get();

        $this->ListHeadLegal = LGIGlobal_Users::where('status', 1)
                    // ->where('Email', '!=', '')
                    // ->where('Email', '!=', null)
                    ->whereHas('getUserGroup', function($query1){
                        $query1
                        ->where('GroupCode', 'HEAD_LEGAL')
                        ->whereHas('getGroups', function($query2){
                            $query2->whereHas('getApp', function($query3){
                                $query3->where('AppName', 'LEGAL');
                            });
                        });
                    })
                    ->with('getDept')
                    ->with('getBranch')
                    ->get();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $RED = "\033[1;31m";
        $GREEN = "\033[1;32m";
        $LC = "\033[1;36m"; # Light Cyan
        $NC = "\033[0m"; # No Color

        try {
            $log = LogSheetBPKB::where('email_sent', null)
                                ->orWhere('email_sent', '')
                                ->where('next_email_role', '!=', null)
                                ->with('GetCreatedByData')
                                ->get();

            foreach( $log as $val ){
                if( $val->next_email_role == 'ANALYST_CLAIM' ) {
                    $SheetBpkb = SheetBpkb::where('id', $val->sheet_id)->first();
                    $emailTemplate = '';
                    if( $val->status == 2 ) {
                        $emailTemplate = 'EMAIL.SubmitToAnalyst';
                    } elseif( $val->status == 4 ) {
                        $emailTemplate = 'EMAIL.RevisionBackToAnalyst';
                    }

                    $Analyst = $this->ListAnalystClaim;
                    $Analyst = $Analyst->pluck('Email')->toArray();

                    $HeadAnalyst = $this->ListHeadClaim;
                    $HeadAnalyst = $HeadAnalyst->pluck('Email')->toArray();

                    // !FOR TESTING
                    $HeadAnalyst[] = 'it-dba07@lippoinsurance.com';

                    $date = date('d-M-y', strtotime($val->created_at));
                    $time = date('h:i:s', strtotime($val->created_at));

                    $PARAM = [
                        'user' => $val->GetCreatedByData->Name,
                        'jabatan' => $val->GetCreatedByData->getDept->DeptName,
                        'tanggal' => $date,
                        'jam' => $time
                    ];
                    
                    if( $val->status == 4 ){
                        $PARAM['user_reject'] = $SheetBpkb->getRejectUserLegalData->Name;
                        $PARAM['jabatan_reject'] = $SheetBpkb->getRejectUserLegalData->getDept->DeptName;
                    }

                    \Mail::send($emailTemplate, 
                        $PARAM,
                        function ($mail) use ($Analyst, $HeadAnalyst) {
                            $mail->from(env('NO_REPLY_EMAIL'), env('APP_NAME'));
                            
                            // $mail->to(['it-dba07@lippoinsurance.com', 'antonius1712@gmail.com']);
                            // $mail->cc(['antonius1720@gmail.com']);

                            $mail->to($Analyst);
                            $mail->cc($HeadAnalyst);

                            $mail->subject('LEGAL CHECK SHEET APPLICATION');
                        }
                    ); 

                    $val->email_sent = 'yes';
                    $val->save();

                    echo $GREEN."Sukses ".$NC."Sent email ke ".$LC."ANALYST_CLAIM \n".$NC;


                } elseif ( $val->next_email_role == 'USER_LEGAL' ) {
                    $SheetBpkb = SheetBpkb::where('id', $val->sheet_id)->first();
                    $emailTemplate = '';
                    
                    if( $val->status == 3 ) {
                        $emailTemplate = 'EMAIL.SubmitToLegal';
                    } elseif( $val->status == 5 ) {
                        $emailTemplate = 'EMAIL.FilingLegal';
                    }

                    $Legal = $this->ListUserLegal;
                    $Legal = $Legal->pluck('Email')->toArray();

                    $SentToUserAndLegal = $Legal;
                    $SentToUserAndLegal[] = $val->GetCreatedByData->Email;

                    // dd($Legal, $val->GetCreatedByData);

                    $HeadLegal = $this->ListHeadLegal;
                    $HeadLegal = $HeadLegal->pluck('Email')->toArray();

                    // !FOR TESTING
                    $HeadLegal[] = 'it-dba07@lippoinsurance.com';

                    $date = date('d-M-y', strtotime($val->created_at));
                    $time = date('h:i:s', strtotime($val->created_at));

                    $PARAM = [
                        'user' => $val->GetCreatedByData->Name,
                        'jabatan' => $val->GetCreatedByData->getDept->DeptName,
                        'tanggal' => $date,
                        'jam' => $time,
                        'check_sheet_id' => $SheetBpkb->id
                    ];

                    if( $val->status == 5 ){
                        $PARAM['user_legal'] = $SheetBpkb->getApproveUserLegalData->Name;
                        $PARAM['jabatan_legal'] = $SheetBpkb->getApproveUserLegalData->getDept->DeptName;
                        
                    }

                    \Mail::send($emailTemplate, 
                        $PARAM,
                        function ($mail) use ($Legal, $HeadLegal) {
                            $mail->from(env('NO_REPLY_EMAIL'), env('APP_NAME'));
                            
                            // $mail->to(['it-dba07@lippoinsurance.com', 'antonius1712@gmail.com']);
                            // $mail->cc(['antonius1720@gmail.com']);

                            $mail->to($Legal);
                            $mail->subject('LEGAL CHECK SHEET APPLICATION');
                            $mail->cc($HeadLegal);
                        }
                    ); 

                    $val->email_sent = 'yes';
                    $val->save();

                    echo $GREEN."Sukses ".$NC."Sent email ke ".$LC."USER_LEGAL \n".$NC;
                }
            }
        } catch(\Exception $e) {
            dd($e);
        }
    }
}
