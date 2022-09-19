<?php

namespace App\Repositories;

use App\Model\LogSheetBPKB;
use App\Model\SheetBpkb;
use App\Model\SheetBpkbTambahan;
use Carbon\Carbon;
use Illuminate\Database\QueryException;

class SheetBPKBRepo
{
    private static $instance = null;
    /** protected to prevent cloning */
    protected function __clone(){}

    public static function GetInstance(){
        if(!self::$instance){
            self::$instance = new SheetBPKBRepo();
        }

        return self::$instance;
    }

    public function SaveSheetBPKB($request){
        
        $SheetBpkb = new SheetBpkb;
        $SheetBpkb->created_by = Auth()->user()->UserId;
        
        $lastCheckSheetId = SheetBpkb::where('check_sheet_id', '!=', null)
                                    ->orderby('check_sheet_id', 'desc');

        if( isset($lastCheckSheetId) ){
            $newCheckSheetId = sprintf('%04d', 
                                (int) $lastCheckSheetId->value('check_sheet_id') 
                                + 1);
        } else {
            $newCheckSheetId = sprintf('%04d', 1);
        }

        $SheetBpkb->check_sheet_id = $newCheckSheetId;

        $SheetBpkb->no_claim = $request->no_claim;
        $SheetBpkb->tahun_kendaraan = $request->tahun_kendaraan;
        $SheetBpkb->no_policy = $request->no_policy;
        $SheetBpkb->nomor_polisi = $request->nomor_polisi;
        $SheetBpkb->insured = $request->insured;
        $SheetBpkb->date_of_loss = Carbon::createFromFormat('d-M-y', $request->date_of_loss);
        $SheetBpkb->unit = $request->unit;

        if( isset($request->surat_tanda_bukti_lapor_polisi_checkbox) 
            && $request->surat_tanda_bukti_lapor_polisi_checkbox == 'on' 
        ){
            $SheetBpkb->surat_tanda_bukti_lapor_polisi_checkbox = $request->surat_tanda_bukti_lapor_polisi_checkbox;
            $SheetBpkb->tanggal_terima_surat_tanda_bukti_lapor_polisi = $this->formatCarbon($request->tanggal_terima_surat_tanda_bukti_lapor_polisi);
            $SheetBpkb->nomor_surat_tanda_bukti_lapor_polisi = $request->nomor_surat_tanda_bukti_lapor_polisi;
        }
        
        if( isset($request->kuitansi_blanko_checkbox) 
            && $request->kuitansi_blanko_checkbox == 'on' 
        ){
            $SheetBpkb->kuitansi_blanko_checkbox = $request->kuitansi_blanko_checkbox;
            $SheetBpkb->tanggal_terima_kuitansi_blanko = $this->formatCarbon($request->tanggal_terima_kuitansi_blanko);
            $SheetBpkb->nomor_kuitansi_blanko = $request->nomor_kuitansi_blanko;
        }
        
        if( isset($request->bpkb_checkbox) 
            && $request->bpkb_checkbox == 'on' 
        ){
            $SheetBpkb->bpkb_checkbox = $request->bpkb_checkbox;
            $SheetBpkb->tanggal_terima_bpkb = $this->formatCarbon($request->tanggal_terima_bpkb);
            $SheetBpkb->nomor_bpkb = $request->nomor_bpkb;
            $SheetBpkb->nomor_mesin_bpkb = $request->nomor_mesin_bpkb;
            $SheetBpkb->nomor_rangka_bpkb = $request->nomor_rangka_bpkb;
        }
        
        if( isset($request->faktur_kendaraan_checkbox) 
            && $request->faktur_kendaraan_checkbox == 'on' 
        ){
            $SheetBpkb->faktur_kendaraan_checkbox = $request->faktur_kendaraan_checkbox;
            $SheetBpkb->tanggal_terima_faktur_kendaraan = $this->formatCarbon($request->tanggal_terima_faktur_kendaraan);
            $SheetBpkb->keterangan_faktur_kendaraan = $request->keterangan_faktur_kendaraan;
        }
        
        if( isset($request->nik_checkbox) 
            && $request->nik_checkbox == 'on' 
        ){
            $SheetBpkb->nik_checkbox = $request->nik_checkbox;
            $SheetBpkb->tanggal_terima_nik = $this->formatCarbon($request->tanggal_terima_nik);
            $SheetBpkb->nomor_nik = $request->nomor_nik;
        }
        
        if( isset($request->stnk_checkbox) 
            && $request->stnk_checkbox == 'on' 
        ){
            $SheetBpkb->stnk_checkbox = $request->stnk_checkbox;
            $SheetBpkb->tanggal_terima_stnk = $this->formatCarbon($request->tanggal_terima_stnk);
            $SheetBpkb->nomor_stnk = $request->nomor_stnk;
        }
        
        if( isset($request->surat_ketetapan_pajak_daerah_checkbox) 
            && $request->surat_ketetapan_pajak_daerah_checkbox == 'on' 
        ){
            $SheetBpkb->surat_ketetapan_pajak_daerah_checkbox = $request->surat_ketetapan_pajak_daerah_checkbox;
            $SheetBpkb->tanggal_terima_surat_ketetapan_pajak_daerah = $this->formatCarbon($request->tanggal_terima_surat_ketetapan_pajak_daerah);
            $SheetBpkb->nomor_surat_ketetapan_pajak_daerah = $request->nomor_surat_ketetapan_pajak_daerah;
        }
        
        if( isset($request->kunci_kontak_checkbox) 
            && $request->kunci_kontak_checkbox == 'on' 
        ){
            $SheetBpkb->kunci_kontak_checkbox = $request->kunci_kontak_checkbox;
            $SheetBpkb->tanggal_terima_kunci_kontak = $this->formatCarbon($request->tanggal_terima_kunci_kontak);
            $SheetBpkb->nomor_kunci_kontak = $request->nomor_kunci_kontak;
        }

        $SheetBpkb->status = $request->status;
        $SheetBpkb->save();
        
        if( isset($request->judul_tambahan) && count($request->judul_tambahan) > 0 ){
            foreach( $request->judul_tambahan as $key => $val ){
                $sheetBpkbTambahan = new SheetBpkbTambahan;
                $sheetBpkbTambahan->sheet_bpkb_id = $SheetBpkb->id;
                $sheetBpkbTambahan->judul_tambahan = $request->judul_tambahan[$key];
                $sheetBpkbTambahan->tanggal_terima_tambahan = $this->formatCarbon($request->tanggal_terima_tambahan[$key]);
                $sheetBpkbTambahan->nomor_tambahan = $request->nomor_tambahan[$key];
                $sheetBpkbTambahan->save();
            }
        }

        return $SheetBpkb;
    }

    public function UpdateSheetBPKB($request, $id){
        $SheetBpkb = SheetBpkb::where('id', $id)->first();
        $SheetBpkb->no_claim = $request->no_claim;
        $SheetBpkb->tahun_kendaraan = $request->tahun_kendaraan;
        $SheetBpkb->no_policy = $request->no_policy;
        $SheetBpkb->nomor_polisi = $request->nomor_polisi;
        $SheetBpkb->insured = $request->insured;
        $SheetBpkb->date_of_loss = $this->formatCarbon($request->date_of_loss);
        $SheetBpkb->unit = $request->unit;

        if( isset($request->surat_tanda_bukti_lapor_polisi_checkbox) 
            && $request->surat_tanda_bukti_lapor_polisi_checkbox == 'on' 
        ){
            $SheetBpkb->surat_tanda_bukti_lapor_polisi_checkbox = $request->surat_tanda_bukti_lapor_polisi_checkbox;
            $SheetBpkb->tanggal_terima_surat_tanda_bukti_lapor_polisi = $this->formatCarbon($request->tanggal_terima_surat_tanda_bukti_lapor_polisi);
            $SheetBpkb->nomor_surat_tanda_bukti_lapor_polisi = $request->nomor_surat_tanda_bukti_lapor_polisi;
        }
        
        if( isset($request->kuitansi_blanko_checkbox) 
            && $request->kuitansi_blanko_checkbox == 'on' 
        ){
            $SheetBpkb->kuitansi_blanko_checkbox = $request->kuitansi_blanko_checkbox;
            $SheetBpkb->tanggal_terima_kuitansi_blanko = $this->formatCarbon($request->tanggal_terima_kuitansi_blanko);
            $SheetBpkb->nomor_kuitansi_blanko = $request->nomor_kuitansi_blanko;
        }
        
        if( isset($request->bpkb_checkbox) 
            && $request->bpkb_checkbox == 'on' 
        ){
            $SheetBpkb->bpkb_checkbox = $request->bpkb_checkbox;
            $SheetBpkb->tanggal_terima_bpkb = $this->formatCarbon($request->tanggal_terima_bpkb);
            $SheetBpkb->nomor_bpkb = $request->nomor_bpkb;
            $SheetBpkb->nomor_mesin_bpkb = $request->nomor_mesin_bpkb;
            $SheetBpkb->nomor_rangka_bpkb = $request->nomor_rangka_bpkb;
        }
        
        if( isset($request->faktur_kendaraan_checkbox) 
            && $request->faktur_kendaraan_checkbox == 'on' 
        ){
            $SheetBpkb->faktur_kendaraan_checkbox = $request->faktur_kendaraan_checkbox;
            $SheetBpkb->tanggal_terima_faktur_kendaraan = $this->formatCarbon($request->tanggal_terima_faktur_kendaraan);
            $SheetBpkb->keterangan_faktur_kendaraan = $request->keterangan_faktur_kendaraan;
        }
        
        if( isset($request->nik_checkbox) 
            && $request->nik_checkbox == 'on' 
        ){
            $SheetBpkb->nik_checkbox = $request->nik_checkbox;
            $SheetBpkb->tanggal_terima_nik = $this->formatCarbon($request->tanggal_terima_nik);
            $SheetBpkb->nomor_nik = $request->nomor_nik;
        }
        
        if( isset($request->stnk_checkbox) 
            && $request->stnk_checkbox == 'on' 
        ){
            $SheetBpkb->stnk_checkbox = $request->stnk_checkbox;
            $SheetBpkb->tanggal_terima_stnk = $this->formatCarbon($request->tanggal_terima_stnk);
            $SheetBpkb->nomor_stnk = $request->nomor_stnk;
        }
        
        if( isset($request->surat_ketetapan_pajak_daerah_checkbox) 
            && $request->surat_ketetapan_pajak_daerah_checkbox == 'on' 
        ){
            $SheetBpkb->surat_ketetapan_pajak_daerah_checkbox = $request->surat_ketetapan_pajak_daerah_checkbox;
            $SheetBpkb->tanggal_terima_surat_ketetapan_pajak_daerah = $this->formatCarbon($request->tanggal_terima_surat_ketetapan_pajak_daerah);
            $SheetBpkb->nomor_surat_ketetapan_pajak_daerah = $request->nomor_surat_ketetapan_pajak_daerah;
        }
        
        if( isset($request->kunci_kontak_checkbox) 
            && $request->kunci_kontak_checkbox == 'on' 
        ){
            $SheetBpkb->kunci_kontak_checkbox = $request->kunci_kontak_checkbox;
            $SheetBpkb->tanggal_terima_kunci_kontak = $this->formatCarbon($request->tanggal_terima_kunci_kontak);
            $SheetBpkb->nomor_kunci_kontak = $request->nomor_kunci_kontak;
        }

        $SheetBpkb->status = $request->status;

        if( $request->status == 3 ){
            $SheetBpkb->approve_by_analyst = Auth()->user()->UserId;
            $SheetBpkb->approve_at_analyst = Carbon::now();
        }

        if( $request->status == 4 ){
            $SheetBpkb->reject_by_legal = Auth()->user()->UserId;
            $SheetBpkb->reject_at_legal = Carbon::now();

            $SheetBpkb->approve_by_analyst = null;
            $SheetBpkb->approve_at_analyst = null;
        }

        if( $request->status == 5 ){
            $SheetBpkb->approve_by_legal = Auth()->user()->UserId;
            $SheetBpkb->approve_at_legal = Carbon::now();

            $SheetBpkb->reject_by_legal = null;
            $SheetBpkb->reject_at_legal = null;
        }

        $SheetBpkb->save();

        if( isset($request->judul_tambahan) && count($request->judul_tambahan) > 0 ){
            SheetBpkbTambahan::where('sheet_bpkb_id', $id)->delete();
            foreach( $request->judul_tambahan as $key => $val ){
                $sheetBpkbTambahan = new SheetBpkbTambahan;
                $sheetBpkbTambahan->sheet_bpkb_id = $SheetBpkb->id;
                $sheetBpkbTambahan->judul_tambahan = $request->judul_tambahan[$key];
                $sheetBpkbTambahan->tanggal_terima_tambahan = $this->formatCarbon($request->tanggal_terima_tambahan[$key]);
                $sheetBpkbTambahan->nomor_tambahan = $request->nomor_tambahan[$key];
                $sheetBpkbTambahan->save();
            }
        }

        return $SheetBpkb;
    }

    public function SaveLog($sheet, $comment = null){
        $status = $sheet->status;
        $next_email_role = null;
        switch ($status) {
            case 1:
                $action = 'Save draft Sheet BPKB';
                break;
            case 2:
                $action = 'Submit new Sheet BPKB';
                $next_email_role = 'ANALYST_CLAIM';
                break;
            case 3:
                $action = 'Approve Sheet BPKB';
                $next_email_role = 'USER_LEGAL';
                break;
            case 4:
                $action = 'Reject Sheet BPKB and back to Analyst Claim MV';
                $next_email_role = 'ANALYST_CLAIM';
                break;
            case 5:
                $action = 'Approve Filing Sheet BPKB';
                $next_email_role = 'USER_LEGAL';
                break;
            default:
                $action = '';
                break;
        }

        $LogSheetBPKB = new LogSheetBPKB;
        $LogSheetBPKB->sheet_id = $sheet->id;
        $LogSheetBPKB->status = $status;
        $LogSheetBPKB->user_id = Auth()->user()->UserId;
        $LogSheetBPKB->user_name = Auth()->user()->Name;
        $LogSheetBPKB->action = $action;
        $LogSheetBPKB->comment = $comment;
        $LogSheetBPKB->next_email_role = $next_email_role;
        $LogSheetBPKB->save();
    }

    private function formatCarbon($date){
        return Carbon::createFromFormat('d-M-y', $date);
    }
}