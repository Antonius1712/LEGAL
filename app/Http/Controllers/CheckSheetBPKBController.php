<?php

namespace App\Http\Controllers;

use App\Http\Requests\SheetBPKBRequest;
use App\Model\LGIGlobal_UserGroup;
use App\Model\LGIGlobal_Users;
use App\Model\LogSheetBPKB;
use App\Model\SheetBpkb;
use App\Model\SheetBpkbTambahan;
use Illuminate\Http\Request;
use App\Repositories\SheetBPKBRepo;

class CheckSheetBPKBController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->SheetBPKBRepo = SheetBPKBRepo::getInstance();

        $this->ListUserClaim = LGIGlobal_Users::where('status', 1)
                    // ->where('Email', '!=', '')
                    // ->where('Email', '!=', null)
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
                    // ->where('Email', '!=', '')
                    // ->where('Email', '!=', null)
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
                    // ->where('Email', '!=', '')
                    // ->where('Email', '!=', null)
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
        
    public function index()
    {
        $SheetBpkb = SheetBpkb::with('GetStatus');
        $SheetBpkb = $SheetBpkb->get();
        
        return view('pages.check-sheet-bpkb.index', compact('SheetBpkb'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.check-sheet-bpkb.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SheetBPKBRequest $request)
    {
        // dd($request->all());
        $sheet = $this->SheetBPKBRepo->SaveSheetBPKB($request);
        if( $sheet ){
            $this->SheetBPKBRepo->SaveLog($sheet);
        }else{
            return redirect()->back()->withInput($request->all())->withErrors(['msg' => 'Error.']);
        }

        return redirect()->route('check-sheet-bpkb.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $log = LogSheetBPKB::where('sheet_id', $id)->get();
        $checkSheet = SheetBpkb::where('id',$id)->with('GetStatus')->first();
        $checkSheetTambahan = SheetBpkbTambahan::where('sheet_bpkb_id', $id)->get();
        return view('pages.check-sheet-bpkb.show', compact('checkSheet', 'log', 'checkSheetTambahan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $log = LogSheetBPKB::where('sheet_id', $id)->get();
        $checkSheet = SheetBpkb::where('id',$id)->with('GetStatus')->first();
        $sheetTambahan = SheetBpkbTambahan::where('sheet_bpkb_id', $id)->get();
        return view('pages.check-sheet-bpkb.edit', compact('checkSheet', 'log', 'sheetTambahan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SheetBPKBRequest $request, $id)
    {
        // dd($request->all());
        $sheet = $this->SheetBPKBRepo->UpdateSheetBPKB($request, $id);
        if( $sheet ){
            $this->SheetBPKBRepo->SaveLog($sheet, $request->comment);
        }else{
            return redirect()->back()->withInput($request->all())->withErrors(['msg' => 'Error.']);
        }

        return redirect()->route('check-sheet-bpkb.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getData(){
        $SheetBpkb = SheetBpkb::all();
        foreach( $SheetBpkb as $key => $val ){
            $data[$key]['check_sheet_id'] = $val->check_sheet_id;
            $data[$key]['nomor_bpkb'] = $val->nomor_bpkb;
            $data[$key]['no_claim'] = $val->no_claim;
            $data[$key]['policy_no'] = $val->policy_no;
            $data[$key]['date_of_loss'] = date('d-M-y', strtotime($val->date_of_loss));
            $data[$key]['insured'] = $val->insured;
            $data[$key]['created_at'] = date('d-M-y', strtotime($val->created_at));
            $data[$key]['unit'] = $val->unit;
            $data[$key]['tahun_kendaraan'] = $val->tahun_kendaraan;
            $data[$key]['nomor_mesin'] = $val->nomor_mesin;
            $data[$key]['nomor_polisi'] = $val->nomor_polisi;
            $data[$key]['nomor_rangka'] = $val->nomor_rangka;
            $data[$key]['user'] = $val->getCreatedByName();
            $data[$key]['status'] = $val->GetStatus->status;
            $data[$key]['tat'] = '';
            $data[$key]['action'] = '';
        }

        $Data['data'] = $data;

        return $Data;
    }

    public function sf(){
        session()->flush();
        return redirect()->route('login');
    }
}
