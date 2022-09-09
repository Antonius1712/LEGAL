<?php

namespace App\Http\Controllers\PDF;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\SheetBpkb;
use App\Model\SheetBpkbTambahan;

class GeneratePdfSheetBpkbLegalController extends Controller
{
    public function index($id){
        $Data = [];
        $SheetBpkb = SheetBpkb::findOrFail($id);
        $SheetTambahan = SheetBpkbTambahan::where('sheet_bpkb_id', $id)->get();

        if( isset($SheetBpkb->tanggal_terima_surat_tanda_bukti_lapor_polisi)
        && $SheetBpkb->tanggal_terima_surat_tanda_bukti_lapor_polisi != null ){
            $DataSuratTandaPenerimaanLaporanPolisi['title'] = 'Surat Tanda Penerimaan Laporan Polisi';
            $DataSuratTandaPenerimaanLaporanPolisi['body'] = 'Nomor : '.$SheetBpkb->nomor_surat_tanda_bukti_lapor_polisi;
            $DataSuratTandaPenerimaanLaporanPolisi['date'] = $SheetBpkb->tanggal_terima_surat_tanda_bukti_lapor_polisi;
            $Data[] = $DataSuratTandaPenerimaanLaporanPolisi;
        }

        if( isset($SheetBpkb->tanggal_terima_kuitansi_blanko)
        && $SheetBpkb->tanggal_terima_kuitansi_blanko != null ){
            $DataKuitansiBlangko['title'] = 'Kuitansi Blangko 2 lembar';
            $DataKuitansiBlangko['body'] = $SheetBpkb->nomor_kuitansi_blanko;
            $DataKuitansiBlangko['date'] = $SheetBpkb->tanggal_terima_kuitansi_blanko;
            $Data[] = $DataKuitansiBlangko;
        }

        if( isset($SheetBpkb->tanggal_terima_bpkb)
        && $SheetBpkb->tanggal_terima_bpkb != null ){
            $DataBpkb['title'] = 'BPKB';
            $DataBpkb['body'] = $SheetBpkb->nomor_bpkb;
            $DataBpkb['date'] = $SheetBpkb->tanggal_terima_bpkb;
            $Data[] = $DataBpkb;
        }

        if( isset($SheetBpkb->tanggal_terima_faktur_kendaraan)
        && $SheetBpkb->tanggal_terima_faktur_kendaraan != null ){
            $DataFakturKendaraan['title'] = 'Faktur Kendaraan';
            $DataFakturKendaraan['body'] = $SheetBpkb->keterangan_faktur_kendaraan;
            $DataFakturKendaraan['date'] = $SheetBpkb->tanggal_terima_faktur_kendaraan;
            $Data[] = $DataFakturKendaraan;
        }

        if( isset($SheetBpkb->tanggal_terima_nik)
        && $SheetBpkb->tanggal_terima_nik != null ){
            $DataNIK['title'] = 'NIK';
            $DataNIK['body'] = $SheetBpkb->nomor_nik;
            $DataNIK['date'] = $SheetBpkb->tanggal_terima_nik;
            $Data[] = $DataNIK;
        }

        if( isset($SheetBpkb->tanggal_terima_stnk)
        && $SheetBpkb->tanggal_terima_stnk != null ){
            $DataSTNK['title'] = 'Surat Tanda Nomor Kendaraan Bermotor';
            $DataSTNK['body'] = $SheetBpkb->nomor_stnk;
            $DataSTNK['date'] = $SheetBpkb->tanggal_terima_stnk;
            $Data[] = $DataSTNK;
        }

        if( isset($SheetBpkb->tanggal_terima_surat_ketetapan_pajak_daerah)
        && $SheetBpkb->tanggal_terima_surat_ketetapan_pajak_daerah != null ){
            $DataSuratKetetapanPajakDaerah['title'] = 'Surat Ketetapan Pajak Daerah';
            $DataSuratKetetapanPajakDaerah['body'] = $SheetBpkb->nomor_surat_ketetapan_pajak_daerah;
            $DataSuratKetetapanPajakDaerah['date'] = $SheetBpkb->tanggal_terima_surat_ketetapan_pajak_daerah;
            $Data[] = $DataSuratKetetapanPajakDaerah;
        }

        if( isset($SheetBpkb->tanggal_terima_kunci_kontak)
        && $SheetBpkb->tanggal_terima_kunci_kontak != null ){
            $DataKunciKontak['title'] = 'Kunci Kontak';
            $DataKunciKontak['body'] = $SheetBpkb->nomor_kunci_kontak;
            $DataKunciKontak['date'] = $SheetBpkb->tanggal_terima_kunci_kontak;
            $Data[] = $DataKunciKontak;
        }

        return view('PDF.sheet-bpkb-legal.index', compact('SheetBpkb', 'Data', 'SheetTambahan'));
    }
}
