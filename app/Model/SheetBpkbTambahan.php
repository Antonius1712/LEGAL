<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SheetBpkbTambahan extends Model
{
    protected $table = 'sheet_bpkb_tambahan';
    protected $fillable = [
        'sheet_bpkb_id',
        'judul_tambahan',
        'tanggal_terima_tambahan',
        'nomor_tambahan',
    ];
}
