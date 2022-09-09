<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SheetBpkb extends Model
{
    protected $table = 'sheet_bpkb';
    protected $fillable = [

        'approve_by_analyst',
        'approve_at_analyst',

        'approve_by_legal',
        'approve_at_legal',
        
        'reject_by_legal',
        'reject_at_legal',
        
        'check_sheet_id',
        'no_claim',
        'created_by',
        'tahun_kendaraan',
        'no_policy',
        'nomor_polisi',
        'insured',
        'date_of_loss',
        'unit',

        'surat_tanda_bukti_lapor_polisi_checkbox',
        'tanggal_terima_surat_tanda_bukti_lapor_polisi',
        'nomor_surat_tanda_bukti_lapor_polisi',

        'kuitansi_blanko_checkbox',
        'tanggal_terima_kuitansi_blanko',
        'nomor_kuitansi_blanko',

        'bpkb_checkbox',
        'tanggal_terima_bpkb',
        'nomor_bpkb',
        'nomor_mesin',
        'nomor_rangka',

        'faktur_kendaraan_checkbox',
        'tanggal_terima_faktur_kendaraan',
        'keterangan_faktur_kendaraan',

        'nik_checkbox',
        'tanggal_terima_nik',
        'nomor_nik',

        'stnk_checkbox',
        'tanggal_terima_stnk',
        'nomor_stnk',
        
        'surat_ketetapan_pajak_daerah_checkbox',
        'tanggal_terima_surat_ketetapan_pajak_daerah',
        'nomor_surat_ketetapan_pajak_daerah',

        'kunci_kontak_checkbox',
        'tanggal_terima_kunci_kontak',
        'nomor_kunci_kontak',

        'status',
    ];

    public function getCreatedByName(){
        return LGIGlobal_Users::where('UserId', $this->created_by)->value('Name');
    }
    
    public function getApproveUserAnalystData(){
        return $this->hasOne(LGIGlobal_Users::class, 'UserId', 'approve_by_analyst');
    }

    public function getApproveUserLegalData(){
        return $this->hasOne(LGIGlobal_Users::class, 'UserId', 'approve_by_legal');
    }

    public function getRejectUserLegalData(){
        return $this->hasOne(LGIGlobal_Users::class, 'UserId', 'reject_by_legal');
    }

    public function GetStatus(){
        return $this->hasOne(Status::class, 'id', 'status'); 
    }
}
