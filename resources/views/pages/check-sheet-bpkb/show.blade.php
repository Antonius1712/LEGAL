@extends('layouts.app')
@section('title')
    Form Check Sheet BPKB
@endsection
@section('content')
    <style>
        .modal-backdrop {
            width: 100% !important;
            height: 100% !important;
        }
    </style>

    <div class="card">
        <div class="card-header bg-primary text-white">
            <p>
                Form Check Sheet BPKB
            </p>
        </div>
        <div class="card-body">
            <div class="card">
                <div class="card-body bg-default-2">
                    <div class="form">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row form-group">
                                        <div class="col-xs-12 col-md-12 col-lg-2">
                                            <span>No Klaim</span>
                                        </div>
                                        <div class="col-xs-12 col-md-12 col-lg-4">
                                            <input type="text" 
                                            name="no_claim" 
                                            id="no_claim" 
                                            class="form-control"
                                            value="{{ $checkSheet->no_claim
                                                        ? $checkSheet->no_claim
                                                        : '' }}"
                                            readonly
                                            >
                                            @if($errors->has('no_claim'))
                                                <div class="error">{{ $errors->first('no_claim') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-xs-12 col-md-12 col-lg-2">
                                            <span>Tahun Kendaraan</span>
                                        </div>
                                        <div class="col-xs-12 col-md-12 col-lg-4">
                                            <input type="text" 
                                            name="tahun_kendaraan" 
                                            d="tahun_kendaraan" 
                                            class="form-control"
                                            value="{{ $checkSheet->tahun_kendaraan
                                                        ? $checkSheet->tahun_kendaraan
                                                        : '' }}"
                                            readonly
                                            >
                                            @if($errors->has('tahun_kendaraan'))
                                                <div class="error">{{ $errors->first('tahun_kendaraan') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row form-group">
                                        <div class="col-xs-12 col-md-12 col-lg-2">
                                            <span>No Policy</span>
                                        </div>
                                        <div class="col-xs-12 col-md-12 col-lg-4">
                                            <input type="text" 
                                            name="no_policy" 
                                            id="no_policy" 
                                            class="form-control"
                                            value="{{ $checkSheet->no_policy
                                                        ? $checkSheet->no_policy
                                                        : '' }}"
                                            readonly
                                            >
                                            @if($errors->has('no_policy'))
                                                <div class="error">{{ $errors->first('no_policy') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-xs-12 col-md-12 col-lg-2">
                                            <span>Nomor Polisi</span>
                                        </div>
                                        <div class="col-xs-12 col-md-12 col-lg-4">
                                            <input type="text" 
                                            name="nomor_polisi" 
                                            id="nomor_polisi" 
                                            class="form-control"
                                            value="{{ $checkSheet->nomor_polisi
                                                        ? $checkSheet->nomor_polisi
                                                        : '' }}"
                                            readonly
                                            >
                                            @if($errors->has('nomor_polisi'))
                                                <div class="error">{{ $errors->first('nomor_polisi') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row form-group">
                                        <div class="col-xs-12 col-md-12 col-lg-2">
                                            <span>Insured</span>
                                        </div>
                                        <div class="col-xs-12 col-md-12 col-lg-4">
                                            <input type="text" 
                                            name="insured" 
                                            id="insured" 
                                            class="form-control"
                                            value="{{ $checkSheet->insured
                                                        ? $checkSheet->insured
                                                        : '' }}"
                                            readonly
                                            >
                                            @if($errors->has('insured'))
                                                <div class="error">{{ $errors->first('insured') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-xs-12 col-md-12 col-lg-2">
                                            <span>Date of Loss</span>
                                        </div>
                                        <div class="col-xs-12 col-md-12 col-lg-4">
                                            <input type="text" 
                                            name="date_of_loss" 
                                            id="date_of_loss" 
                                            class="form-control"
                                            value="{{ $checkSheet->date_of_loss
                                                        ? date('d-M-y', strtotime($checkSheet->date_of_loss))
                                                        : '' }}"
                                            readonly
                                            >
                                            @if($errors->has('date_of_loss'))
                                                <div class="error">{{ $errors->first('date_of_loss') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row form-group">
                                        <div class="col-xs-12 col-md-12 col-lg-2">
                                            <span>Unit</span>
                                        </div>
                                        <div class="col-xs-12 col-md-12 col-lg-4">
                                            <input type="text" 
                                            name="unit" 
                                            id="unit" 
                                            class="form-control"
                                            value="{{ $checkSheet->unit
                                                        ? $checkSheet->unit
                                                        : '' }}"
                                            readonly
                                            >
                                            @if($errors->has('unit'))
                                                <div class="error">{{ $errors->first('unit') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body bg-default-2">
                    {{-- SURAT TANDA BUKTI LAPOR POLISI --}}
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-lg-6">
                            <div class="form-group">
                                <label>Surat Tanda Bukti Lapor Polisi Nomor</label>
                                <input type="checkbox" 
                                name="surat_tanda_bukti_lapor_polisi_checkbox" 
                                id="surat_tanda_bukti_lapor_polisi_checkbox"
                                {{ $checkSheet->surat_tanda_bukti_lapor_polisi_checkbox
                                    ? 'checked' 
                                    : '' }} 
                                disabled
                                >
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-12 col-lg-6">
                            <div class="row form-group pull-right">
                                <div class="col-xs-12 col-md-12 col-lg-5">
                                    <span>Tanggal Terima</span>
                                </div>
                                <div class="col-xs-12 col-md-12 col-lg-7">
                                    <input type="text"
                                    name="tanggal_terima_surat_tanda_bukti_lapor_polisi" 
                                    id="tanggal_terima_surat_tanda_bukti_lapor_polisi" 
                                    class="form-control datepicker"
                                    value="{{ $checkSheet->tanggal_terima_surat_tanda_bukti_lapor_polisi
                                                ? $checkSheet->tanggal_terima_surat_tanda_bukti_lapor_polisi
                                                : '' }}" 
                                    disabled
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-12 col-lg-12">
                            <div class="row form-group">
                                <div class="col-xs-12 col-md-12 col-lg-2">
                                    <span>Nomor</span>
                                </div>
                                <div class="col-xs-12 col-md-12 col-lg-10">
                                    <input type="text"
                                    name="nomor_surat_tanda_bukti_lapor_polisi" 
                                    id="nomor_surat_tanda_bukti_lapor_polisi" 
                                    class="form-control"
                                    value="{{ $checkSheet->nomor_surat_tanda_bukti_lapor_polisi
                                                ? $checkSheet->nomor_surat_tanda_bukti_lapor_polisi
                                                : '' }}" 
                                    disabled
                                    >
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- KUITANSI BLANKO --}}
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-lg-6">
                            <div class="form-group">
                                <label>Kuitansi Blanko</label>
                                <input type="checkbox" 
                                name="kuitansi_blanko_checkbox" 
                                id="kuitansi_blanko_checkbox"
                                {{ $checkSheet->kuitansi_blanko_checkbox
                                        ? 'checked'
                                        : '' }} 
                                disabled
                                >
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-12 col-lg-6">
                            <div class="row form-group pull-right">
                                <div class="col-xs-12 col-md-12 col-lg-5">
                                    <span>Tanggal Terima</span>
                                </div>
                                <div class="col-xs-12 col-md-12 col-lg-7">
                                    <input type="text" 
                                    name="tanggal_terima_kuitansi_blanko" 
                                    id="tanggal_terima_kuitansi_blanko" 
                                    class="form-control datepicker" 
                                    value="{{ $checkSheet->tanggal_terima_kuitansi_blanko
                                                ? $checkSheet->tanggal_terima_kuitansi_blanko
                                                : '' }}" 
                                    disabled
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-12 col-lg-12">
                            <div class="row form-group">
                                <div class="col-xs-12 col-md-12 col-lg-2">
                                    <span>Nomor</span>
                                </div>
                                <div class="col-xs-12 col-md-12 col-lg-10">
                                    <input type="text" 
                                    name="nomor_kuitansi_blanko" 
                                    id="nomor_kuitansi_blanko" 
                                    class="form-control" 
                                    value="{{ $checkSheet->nomor_kuitansi_blanko
                                                ? $checkSheet->nomor_kuitansi_blanko
                                                : '' }}" 
                                    disabled
                                    >
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- BPKB --}}
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-lg-6">
                            <div class="form-group">
                                <label>BPKB</label>
                                <input type="checkbox" 
                                name="bpkb_checkbox" 
                                id="bpkb_checkbox"
                                {{ $checkSheet->bpkb_checkbox
                                        ? 'checked'
                                        : '' }}
                                disabled
                                >
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-12 col-lg-6">
                            <div class="row form-group pull-right">
                                <div class="col-xs-12 col-md-12 col-lg-5">
                                    <span>Tanggal Terima</span>
                                </div>
                                <div class="col-xs-12 col-md-12 col-lg-7">
                                    <input type="text" 
                                    name="tanggal_terima_bpkb" 
                                    id="tanggal_terima_bpkb" 
                                    class="form-control datepicker" 
                                    value="{{ $checkSheet->tanggal_terima_bpkb
                                                ? $checkSheet->tanggal_terima_bpkb
                                                : '' }}"
                                    disabled
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-12 col-lg-12">
                            <div class="row form-group">
                                <div class="col-xs-12 col-md-12 col-lg-2">
                                    <span>Nomor</span>
                                </div>
                                <div class="col-xs-12 col-md-12 col-lg-10">
                                    <input type="text" 
                                    name="nomor_bpkb" 
                                    id="nomor_bpkb" 
                                    class="form-control" 
                                    value="{{ $checkSheet->nomor_bpkb
                                                ? $checkSheet->nomor_bpkb
                                                : '' }}"
                                    disabled
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-12 col-lg-12">
                            <div class="row form-group">
                                <div class="col-xs-12 col-md-12 col-lg-2">
                                    <span>Nomor Mesin</span>
                                </div>
                                <div class="col-xs-12 col-md-12 col-lg-4">
                                    <input type="text" 
                                    name="nomor_mesin_bpkb" 
                                    id="nomor_mesin_bpkb" 
                                    class="form-control" 
                                    value="{{ $checkSheet->nomor_mesin_bpkb
                                                ? $checkSheet->nomor_mesin_bpkb
                                                : '' }}"
                                    disabled
                                    disabled
                                    >
                                </div>

                                <div class="col-xs-12 col-md-12 col-lg-2">
                                    <span>Nomor Rangka</span>
                                </div>
                                <div class="col-xs-12 col-md-12 col-lg-4">
                                    <input type="text" 
                                    name="nomor_rangka_bpkb" 
                                    id="nomor_rangka_bpkb" 
                                    class="form-control" 
                                    value="{{ $checkSheet->nomor_rangka_bpkb
                                                ? $checkSheet->nomor_rangka_bpkb
                                                : '' }}"
                                    disabled
                                    >
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- FAKTUR KENDARAAN --}}
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-lg-6">
                            <div class="form-group">
                                <label>Faktur Kendaraan</label>
                                <input type="checkbox" 
                                name="faktur_kendaraan_checkbox" 
                                id="faktur_kendaraan_checkbox"
                                {{ $checkSheet->faktur_kendaraan_checkbox
                                        ? 'checked'
                                        : '' }}
                                disabled
                                >
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-12 col-lg-6">
                            <div class="row form-group pull-right">
                                <div class="col-xs-12 col-md-12 col-lg-5">
                                    <span>Tanggal Terima</span>
                                </div>
                                <div class="col-xs-12 col-md-12 col-lg-7">
                                    <input type="text" 
                                    name="tanggal_terima_faktur_kendaraan" 
                                    id="tanggal_terima_faktur_kendaraan" 
                                    class="form-control datepicker" 
                                    value="{{ $checkSheet->tanggal_terima_faktur_kendaraan
                                                ? $checkSheet->tanggal_terima_faktur_kendaraan
                                                : '' }}"
                                    disabled
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-12 col-lg-12">
                            <div class="row form-group">
                                <div class="col-xs-12 col-md-12 col-lg-2">
                                    <span>Keterangan</span>
                                </div>
                                <div class="col-xs-12 col-md-12 col-lg-10">
                                    <input type="text" 
                                    name="keterangan_faktur_kendaraan" 
                                    id="keterangan_faktur_kendaraan" 
                                    class="form-control" 
                                    value="{{ $checkSheet->keterangan_faktur_kendaraan
                                                ? $checkSheet->keterangan_faktur_kendaraan
                                                : '' }}"
                                    disabled
                                    >
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- NIK --}}
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-lg-6">
                            <div class="form-group">
                                <label>NIK</label>
                                <input type="checkbox" 
                                name="nik_checkbox" 
                                id="nik_checkbox"
                                {{ $checkSheet->nik_checkbox
                                        ? 'checked'
                                        : '' }}
                                disabled
                                >
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-12 col-lg-6">
                            <div class="row form-group pull-right">
                                <div class="col-xs-12 col-md-12 col-lg-5">
                                    <span>Tanggal Terima</span>
                                </div>
                                <div class="col-xs-12 col-md-12 col-lg-7">
                                    <input type="text" 
                                    name="tanggal_terima_nik" 
                                    id="tanggal_terima_nik" 
                                    class="form-control datepicker" 
                                    value="{{ $checkSheet->tanggal_terima_nik
                                                ? $checkSheet->tanggal_terima_nik
                                                : '' }}"
                                    disabled
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-12 col-lg-12">
                            <div class="row form-group">
                                <div class="col-xs-12 col-md-12 col-lg-2">
                                    <span>Nomor</span>
                                </div>
                                <div class="col-xs-12 col-md-12 col-lg-10">
                                    <input type="text" 
                                    name="nomor_nik" 
                                    id="nomor_nik" 
                                    class="form-control" 
                                    value="{{ $checkSheet->nomor_nik
                                                ? $checkSheet->nomor_nik
                                                : '' }}"
                                    disabled
                                    >
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- STNK --}}
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-lg-6">
                            <div class="form-group">
                                <label>STNK</label>
                                <input type="checkbox" 
                                name="stnk_checkbox" 
                                id="stnk_checkbox"
                                {{ $checkSheet->stnk_checkbox
                                        ? 'checked'
                                        : '' }}
                                disabled
                                >
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-12 col-lg-6">
                            <div class="row form-group pull-right">
                                <div class="col-xs-12 col-md-12 col-lg-5">
                                    <span>Tanggal Terima</span>
                                </div>
                                <div class="col-xs-12 col-md-12 col-lg-7">
                                    <input type="text" 
                                    name="tanggal_terima_stnk" 
                                    id="tanggal_terima_stnk" 
                                    class="form-control datepicker" 
                                    value="{{ $checkSheet->tanggal_terima_stnk
                                                ? $checkSheet->tanggal_terima_stnk
                                                : '' }}"
                                    disabled
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-12 col-lg-12">
                            <div class="row form-group">
                                <div class="col-xs-12 col-md-12 col-lg-2">
                                    <span>Nomor</span>
                                </div>
                                <div class="col-xs-12 col-md-12 col-lg-10">
                                    <input type="text" 
                                    name="nomor_stnk" 
                                    id="nomor_stnk" 
                                    class="form-control" 
                                    value="{{ $checkSheet->nomor_stnk
                                                ? $checkSheet->nomor_stnk
                                                : '' }}"
                                    disabled
                                    >
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- SURAT KETETAPAN PAJAK DAERAH --}}
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-lg-6">
                            <div class="form-group">
                                <label>Surat Ketetapan Pajak Daerah</label>
                                <input type="checkbox" 
                                name="surat_ketetapan_pajak_daerah_checkbox" 
                                id="surat_ketetapan_pajak_daerah_checkbox"
                                {{ $checkSheet->surat_ketetapan_pajak_daerah_checkbox
                                        ? 'checked'
                                        : '' }}
                                disabled
                                >
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-12 col-lg-6">
                            <div class="row form-group pull-right">
                                <div class="col-xs-12 col-md-12 col-lg-5">
                                    <span>Tanggal Terima</span>
                                </div>
                                <div class="col-xs-12 col-md-12 col-lg-7">
                                    <input type="text" 
                                    name="tanggal_terima_surat_ketetapan_pajak_daerah" 
                                    id="tanggal_terima_surat_ketetapan_pajak_daerah" 
                                    class="form-control datepicker" 
                                    value="{{ $checkSheet->tanggal_terima_surat_ketetapan_pajak_daerah
                                                ? $checkSheet->tanggal_terima_surat_ketetapan_pajak_daerah
                                                : '' }}"
                                    disabled
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-12 col-lg-12">
                            <div class="row form-group">
                                <div class="col-xs-12 col-md-12 col-lg-2">
                                    <span>Nomor</span>
                                </div>
                                <div class="col-xs-12 col-md-12 col-lg-10">
                                    <input type="text" 
                                    name="nomor_surat_ketetapan_pajak_daerah" 
                                    id="nomor_surat_ketetapan_pajak_daerah" 
                                    class="form-control" 
                                    value="{{ $checkSheet->nomor_surat_ketetapan_pajak_daerah
                                                ? $checkSheet->nomor_surat_ketetapan_pajak_daerah
                                                : '' }}"
                                    disabled
                                    >
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- KUNCI KONTAK --}}
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-lg-6">
                            <div class="form-group">
                                <label>Kunci Kontak</label>
                                <input type="checkbox" 
                                name="kunci_kontak_checkbox" 
                                id="kunci_kontak_checkbox"
                                {{ $checkSheet->kunci_kontak_checkbox
                                        ? 'checked'
                                        : '' }}
                                disabled
                                >
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-12 col-lg-6">
                            <div class="row form-group pull-right">
                                <div class="col-xs-12 col-md-12 col-lg-5">
                                    <span>Tanggal Terima</span>
                                </div>
                                <div class="col-xs-12 col-md-12 col-lg-7">
                                    <input type="text" 
                                    name="tanggal_terima_kunci_kontak" 
                                    id="tanggal_terima_kunci_kontak" 
                                    class="form-control datepicker" 
                                    value="{{ $checkSheet->tanggal_terima_kunci_kontak
                                                ? $checkSheet->tanggal_terima_kunci_kontak
                                                : '' }}"
                                    disabled
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-12 col-lg-12">
                            <div class="row form-group">
                                <div class="col-xs-12 col-md-12 col-lg-2">
                                    <span>Nomor</span>
                                </div>
                                <div class="col-xs-12 col-md-12 col-lg-10">
                                    <input type="text" 
                                    name="nomor_kunci_kontak" 
                                    id="nomor_kunci_kontak" 
                                    class="form-control" 
                                    value="{{ $checkSheet->nomor_kunci_kontak
                                                ? $checkSheet->nomor_kunci_kontak
                                                : '' }}"
                                    disabled
                                    >
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- TAMBAHAN --}}
                    {{-- <button id="btn-add" class="btn btn-success">Add</button> --}}
                    <table class="table table-bordered">
                        <thead>
                            <tr class="bg-primary text-white text-center">
                                <th> Judul </th>    
                                <th> Tanggal Terima </th>    
                                <th> Nomor </th>  
                            </tr>    
                        </thead>    
                        <tbody id="appendContent">
                            @if( count($checkSheetTambahan) > 0 )
                            @foreach ($checkSheetTambahan as $key => $val)
                            <tr class="text-center bg-white text-black">
                                <td>
                                    <input type="text" 
                                    name="judul_tambahan[]" 
                                    class="form-control"
                                    value="{{ $val->judul_tambahan 
                                                ? $val->judul_tambahan 
                                                : $val->judul_tambahan }}"
                                    disabled
                                    >    
                                </td>    
                                <td>
                                    <input type="text" 
                                    name="tanggal_terima_tambahan[]" 
                                    class="form-control datepicker"
                                    value="{{ $val->tanggal_terima_tambahan 
                                                ? $val->tanggal_terima_tambahan 
                                                : $val->tanggal_terima_tambahan }}"
                                    disabled
                                    >    
                                </td>    
                                <td>
                                    <input type="text" 
                                    name="nomor_tambahan[]" 
                                    class="form-control"
                                    value="{{ $val->nomor_tambahan 
                                                ? $val->nomor_tambahan 
                                                : $val->nomor_tambahan }}"
                                    disabled
                                    >    
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>  

            <input type="hidden" id="status" name="status">

            <div class="form-actions" style="display:none;">
                @if( $userGroup == 'ANALYST_WEB_LEGAL' )
                    @if( $checkSheet->status == 2 || $checkSheet->status == 4 )
                        <button type="submit" id="btn-approve" class="btn btn-success pull-right">
                            Approve
                        </button>
                    @endif
                @elseif( $userGroup == 'USER_WEB_LEGAL' )
                    @if( $checkSheet->status == 1 )
                        <button type="submit" id="btn-submit" class="btn btn-success pull-right ml-2">
                            Submit
                        </button>
                        <button type="submit" id="btn-save" class="btn btn-warning pull-right">
                            Save
                        </button>
                    @endif
                @elseif( $userGroup == 'ADM_WEB_LEGAL' )
                    @if( $checkSheet->status == 3 )
                        <button type="submit" id="btn-approve" class="btn btn-success pull-right ml-2">
                            Approve
                        </button>
                        <button type="submit" id="btn-reject-modal" class="btn btn-danger pull-right" data-toggle="modal" data-target="#commentModal">
                            Reject
                        </button>
                    @endif
                @endif
            </div>

            <!-- Modal -->
            <div id="commentModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">
                                Add Comment
                            </h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <textarea name="comment" id="comment" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-default" data-dismiss="modal">Close</button>
                            <button type="submit" id="btn-reject" class="btn btn-outline-danger">Reject</button>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    <div class="card">
        <div class="card-header bg-primary text-white text-center">
            <p>Log Sheet BPKB</p>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead class="thead-light">
                    {{-- <tr>
                        <th colspan="3" class="text-center"> Log Sheet BPKB </th>
                    </tr> --}}
                    <tr>
                        <th>Log</th>
                        <th>By</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($log as $key => $val)
                        <tr>
                            <td>
                                {{ $val->action }}
                                <br/>
                                @if( $val->comment != '' )
                                <strong>
                                    <code>
                                        Comment : <br/>
                                        {{ $val->comment }}
                                    </code>
                                </strong>
                                @endif
                            </td>
                            <td> {{ $val->user_name }} </td>
                            <td> {{ $val->created_at }} </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('script')
@endsection