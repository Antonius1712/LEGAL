<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SheetBPKBRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'no_claim' => 'required',
            'no_policy' => 'required',
            'insured' => 'required',
            'unit' => 'required',
            'tahun_kendaraan' => 'required',
            'nomor_polisi' => 'required',
            'nomor_surat_tanda_bukti_lapor_polisi' => 'required_with:surat_tanda_bukti_lapor_polisi_checkbox,on',
            'tanggal_terima_surat_tanda_bukti_lapor_polisi' => 'required_with:surat_tanda_bukti_lapor_polisi_checkbox,on',

            'nomor_kuitansi_blanko' => 'required_with:kuitansi_blanko_checkbox,on',
            'tanggal_terima_kuitansi_blanko' => 'required_with:kuitansi_blanko_checkbox,on',

            'nomor_bpkb' => 'required_with:bpkb_checkbox,on',
            'nomor_mesin_bpkb' => 'required_with:bpkb_checkbox,on',
            'nomor_rangka_bpkb' => 'required_with:bpkb_checkbox,on',
            'tanggal_terima_bpkb' => 'required_with:bpkb_checkbox,on',
            
            'keterangan_faktur_kendaraan' => 'required_with:faktur_kendaraan_checkbox,on',
            'tanggal_terima_faktur_kendaraan' => 'required_with:faktur_kendaraan_checkbox,on',

            'nomor_nik' => 'required_with:nik_checkbox,on',
            'tanggal_terima_nik' => 'required_with:nik_checkbox,on',

            'nomor_stnk' => 'required_with:stnk_checkbox,on',
            'tanggal_terima_stnk' => 'required_with:stnk_checkbox,on',

            'nomor_surat_ketetapan_pajak_daerah' => 'required_with:surat_ketetapan_pajak_daerah_checkbox,on',
            'tanggal_terima_surat_ketetapan_pajak_daerah' => 'required_with:surat_ketetapan_pajak_daerah_checkbox,on',

            'nomor_kunci_kontak' => 'required_with:kunci_kontak_checkbox,on',
            'tanggal_terima_kunci_kontak' => 'required_with:kunci_kontak_checkbox,on',

            'judul_tambahan.*' => 'filled',
            'tanggal_terima_tambahan.*' => 'filled',
            'nomor_tambahan.*' => 'filled',
        ];
    }
}
