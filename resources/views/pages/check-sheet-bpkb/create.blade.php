@extends('layouts.app')
@section('title')
    Form Check Sheet BPKB
@endsection
@section('content')
    <div class="card">
        <div class="card-header bg-primary text-white">
            <p>
                Form Check Sheet BPKB
            </p>
        </div>
        <div class="card-body">
            <form id="form-sheet" action="{{ Route('check-sheet-bpkb.store') }}" method="post">
                {{ csrf_field() }}
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
                                                value="{{ old('no_claim') 
                                                            ? old('no_claim') 
                                                            : '' }}"
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
                                                value="{{ old('tahun_kendaraan') 
                                                            ? old('tahun_kendaraan') 
                                                            : '' }}"
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
                                                value="{{ old('no_policy') 
                                                            ? old('no_policy') 
                                                            : '' }}"
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
                                                value="{{ old('nomor_polisi') 
                                                            ? old('nomor_polisi') 
                                                            : '' }}"
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
                                                value="{{ old('insured') 
                                                            ? old('insured') 
                                                            : '' }}"
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
                                                class="form-control datepicker"
                                                value="{{ old('date_of_loss') 
                                                            ? old('date_of_loss') 
                                                            : '' }}"
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
                                                value="{{ old('unit') 
                                                            ? old('unit') 
                                                            : '' }}"
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
                                    {{ old('surat_tanda_bukti_lapor_polisi_checkbox') 
                                        ? 'checked' 
                                        : '' }} 
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
                                        value="{{ old('tanggal_terima_surat_tanda_bukti_lapor_polisi') 
                                                    ? old('tanggal_terima_surat_tanda_bukti_lapor_polisi') 
                                                    : '' }}" 
                                        {{ old('surat_tanda_bukti_lapor_polisi_checkbox')
                                            ? ''
                                            : 'disabled' }}
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
                                        value="{{ old('nomor_surat_tanda_bukti_lapor_polisi') 
                                                    ? old('nomor_surat_tanda_bukti_lapor_polisi') 
                                                    : '' }}" 
                                        {{ old('surat_tanda_bukti_lapor_polisi_checkbox')
                                            ? ''
                                            : 'readonly' }}
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
                                    {{ old('kuitansi_blanko_checkbox')
                                            ? 'checked'
                                            : '' }} 
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
                                        value="{{ old('tanggal_terima_kuitansi_blanko') 
                                                    ? old('tanggal_terima_kuitansi_blanko') 
                                                    : '' }}" 
                                        {{ old('kuitansi_blanko_checkbox')
                                            ? ''
                                            : 'disabled' }} 
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
                                        value="{{ old('nomor_kuitansi_blanko') 
                                                    ? old('nomor_kuitansi_blanko') 
                                                    : '' }}" 
                                        {{ old('kuitansi_blanko_checkbox')
                                            ? ''
                                            : 'readonly' }} 
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
                                    {{ old('bpkb_checkbox')
                                            ? 'checked'
                                            : '' }}
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
                                        value="{{ old('tanggal_terima_bpkb') 
                                                    ? old('tanggal_terima_bpkb') 
                                                    : '' }}"
                                        {{ old('bpkb_checkbox')
                                            ? ''
                                            : 'disabled' }}
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
                                        value="{{ old('nomor_bpkb') 
                                                    ? old('nomor_bpkb') 
                                                    : '' }}"
                                        {{ old('bpkb_checkbox')
                                            ? ''
                                            : 'readonly' }}
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
                                        value="{{ old('nomor_mesin_bpkb') 
                                                    ? old('nomor_mesin_bpkb') 
                                                    : '' }}"
                                        {{ old('bpkb_checkbox')
                                            ? ''
                                            : 'readonly' }}
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
                                        value="{{ old('nomor_rangka_bpkb') 
                                                    ? old('nomor_rangka_bpkb') 
                                                    : '' }}"
                                        {{ old('bpkb_checkbox')
                                            ? ''
                                            : 'readonly' }}
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
                                    {{ old('faktur_kendaraan_checkbox')
                                            ? 'checked'
                                            : '' }}
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
                                        value="{{ old('tanggal_terima_faktur_kendaraan') 
                                                    ? old('tanggal_terima_faktur_kendaraan') 
                                                    : '' }}"
                                        {{ old('faktur_kendaraan_checkbox')
                                            ? ''
                                            : 'disabled' }}
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
                                        value="{{ old('keterangan_faktur_kendaraan') 
                                                    ? old('keterangan_faktur_kendaraan') 
                                                    : '' }}"
                                        {{ old('faktur_kendaraan_checkbox')
                                            ? ''
                                            : 'readonly' }}
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
                                    {{ old('nik_checkbox')
                                            ? 'readonly'
                                            : '' }}
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
                                        value="{{ old('tanggal_terima_nik') 
                                                    ? old('tanggal_terima_nik') 
                                                    : '' }}"
                                        {{ old('nik_checkbox')
                                            ? ''
                                            : 'disabled' }}
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
                                        value="{{ old('nomor_nik') 
                                                    ? old('nomor_nik') 
                                                    : '' }}"
                                        {{ old('nomor_nik')
                                            ? ''
                                            : 'readonly' }}
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
                                    {{ old('stnk_checkbox')
                                            ? 'readonly'
                                            : '' }}
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
                                        value="{{ old('tanggal_terima_stnk') 
                                                    ? old('tanggal_terima_stnk') 
                                                    : '' }}"
                                        {{ old('stnk_checkbox')
                                            ? ''
                                            : 'disabled' }}
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
                                        value="{{ old('nomor_stnk') 
                                                    ? old('nomor_stnk') 
                                                    : '' }}"
                                        {{ old('nomor_stnk')
                                            ? ''
                                            : 'readonly' }}
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
                                    {{ old('surat_ketetapan_pajak_daerah_checkbox')
                                            ? 'readonly'
                                            : '' }}
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
                                        value="{{ old('tanggal_terima_surat_ketetapan_pajak_daerah') 
                                                    ? old('tanggal_terima_surat_ketetapan_pajak_daerah') 
                                                    : '' }}"
                                        {{ old('surat_ketetapan_pajak_daerah_checkbox')
                                            ? ''
                                            : 'disabled' }}
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
                                        value="{{ old('nomor_surat_ketetapan_pajak_daerah') 
                                                    ? old('nomor_surat_ketetapan_pajak_daerah') 
                                                    : '' }}"
                                        {{ old('surat_ketetapan_pajak_daerah_checkbox')
                                            ? ''
                                            : 'readonly' }}
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
                                    {{ old('kunci_kontak_checkbox')
                                            ? 'readonly'
                                            : '' }}
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
                                        value="{{ old('tanggal_terima_kunci_kontak') 
                                                    ? old('tanggal_terima_kunci_kontak') 
                                                    : '' }}"
                                        {{ old('kunci_kontak_checkbox')
                                            ? ''
                                            : 'disabled' }}
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
                                        value="{{ old('nomor_kunci_kontak') 
                                                    ? old('nomor_kunci_kontak') 
                                                    : '' }}"
                                        {{ old('kunci_kontak_checkbox')
                                            ? ''
                                            : 'readonly' }}
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- TAMBAHAN --}}
                        <button id="btn-add" class="btn btn-success">Add</button>
                        <table class="table table-bordered">
                            <thead>
                                <tr class="bg-primary text-white text-center">
                                    <th> Judul </th>    
                                    <th> Tanggal Terima </th>    
                                    <th> Nomor </th>    
                                    <th> Hapus </th>    
                                </tr>    
                            </thead>    
                            <tbody id="appendContent">
                                @if( old('judul_tambahan') != null && count(old('judul_tambahan')) > 0 )
                                @foreach (old('judul_tambahan') as $key => $val)
                                <tr class="text-center bg-white text-black">
                                    <td>
                                        <input type="text" 
                                        name="judul_tambahan[]" 
                                        class="form-control"
                                        value="{{ old('judul_tambahan')[$key] 
                                                    ? old('judul_tambahan')[$key] 
                                                    : old('judul_tambahan')[$key] }}"
                                        >    
                                    </td>    
                                    <td>
                                        <input type="text" 
                                        name="tanggal_terima_tambahan[]" 
                                        class="form-control datepicker"
                                        value="{{ old('tanggal_terima_tambahan')[$key] 
                                                    ? old('tanggal_terima_tambahan')[$key] 
                                                    : old('tanggal_terima_tambahan')[$key] }}"
                                        >    
                                    </td>    
                                    <td>
                                        <input type="text" 
                                        name="nomor_tambahan[]" 
                                        class="form-control"
                                        value="{{ old('nomor_tambahan')[$key] 
                                                    ? old('nomor_tambahan')[$key] 
                                                    : old('nomor_tambahan')[$key] }}"
                                        >    
                                    </td>
                                    <td>
                                        <button type="button" 
                                        class="btn btn-danger btn-hapus">
                                            Hapus
                                        </button>    
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>

                <input type="hidden" id="status" name="status">

                <button type="submit" id="btn-submit" class="btn btn-success pull-right ml-2">
                    Submit
                </button>
                <button type="submit" id="btn-save" class="btn btn-warning pull-right">
                    Save
                </button>
            </form>
        </div>
    </div>
    
@endsection
@section('script')
<script>
    $(document).ready(function(){
        $(".datepicker").datepicker({
            format: 'dd-M-yy',
            autoclose: true,
            todayHighlight: true,
        });
    });
    
    $('body').on('click', '#btn-save', function(e){
        e.preventDefault();
        let nextId = '{{ $Status->get()[0]->id }}';
        $('#status').val(nextId);
        $('#form-sheet').submit();
    });

    $('body').on('click', '#btn-submit', function(e){
        e.preventDefault();
        let nextId = '{{ $Status->get()[1]->id }}';
        $('#status').val(nextId);
        $('#form-sheet').submit();
    });

    $('body').on('click', '#btn-add', function(e){
        e.preventDefault();
        let appendContent = `
            <tr class="text-center bg-white text-black">
                <td>
                    <input type="text" name="judul_tambahan[]" class="form-control">    
                </td>    
                <td>
                    <input type="text" name="tanggal_terima_tambahan[]" class="form-control datepicker">    
                </td>    
                <td>
                    <input type="text" name="nomor_tambahan[]" class="form-control">    
                </td>
                <td>
                    <button type="button" class="btn btn-danger btn-hapus">Hapus</button>    
                </td>
            </tr>
        `;
        $('#appendContent').append(appendContent);
        $('#appendContent').find('[name^=tanggal_terima]').datepicker({
            format: 'dd-M-yy',
            autoclose: true,
            todayHighlight: true,
        });
    });

    $('body').on('click', '.btn-hapus', function(){
        $(this).parent().parent().remove();
    });

    /* FUNGSI CHECKBOX START */
    $('#surat_tanda_bukti_lapor_polisi_checkbox').change(function(){
        if( $(this).prop('checked') == true ){
            $('#tanggal_terima_surat_tanda_bukti_lapor_polisi').attr('disabled', false);
            $('#nomor_surat_tanda_bukti_lapor_polisi').attr('readonly', false);
        } else {
            $('#tanggal_terima_surat_tanda_bukti_lapor_polisi').attr('disabled', true);
            $('#nomor_surat_tanda_bukti_lapor_polisi').attr('readonly', true);
        }
    });

    $('#kuitansi_blanko_checkbox').change(function(){
        if( $(this).prop('checked') == true ){
            $('#tanggal_terima_kuitansi_blanko').attr('disabled', false);
            $('#nomor_kuitansi_blanko').attr('readonly', false);
        } else {
            $('#tanggal_terima_kuitansi_blanko').attr('disabled', true);
            $('#nomor_kuitansi_blanko').attr('readonly', true);
        }
    });

    $('#bpkb_checkbox').change(function(){
        if( $(this).prop('checked') == true ){
            $('#tanggal_terima_bpkb').attr('disabled', false);
            $('#nomor_bpkb').attr('readonly', false);
            $('#nomor_mesin_bpkb').attr('readonly', false);
            $('#nomor_rangka_bpkb').attr('readonly', false);
        } else {
            $('#tanggal_terima_bpkb').attr('disabled', true);
            $('#nomor_bpkb').attr('readonly', true);
            $('#nomor_mesin_bpkb').attr('readonly', true);
            $('#nomor_rangka_bpkb').attr('readonly', true);
        }
    });

    $('#faktur_kendaraan_checkbox').change(function(){
        if( $(this).prop('checked') == true ){
            $('#tanggal_terima_faktur_kendaraan').attr('disabled', false);
            $('#keterangan_faktur_kendaraan').attr('readonly', false);
        } else {
            $('#tanggal_terima_faktur_kendaraan').attr('disabled', true);
            $('#keterangan_faktur_kendaraan').attr('readonly', true);
        }
    });

    $('#nik_checkbox').change(function(){
        if( $(this).prop('checked') == true ){
            $('#tanggal_terima_nik').attr('disabled', false);
            $('#nomor_nik').attr('readonly', false);
        } else {
            $('#tanggal_terima_nik').attr('disabled', true);
            $('#nomor_nik').attr('readonly', true);
        }
    });

    $('#stnk_checkbox').change(function(){
        if( $(this).prop('checked') == true ){
            $('#tanggal_terima_stnk').attr('disabled', false);
            $('#nomor_stnk').attr('readonly', false);
        } else {
            $('#tanggal_terima_stnk').attr('disabled', true);
            $('#nomor_stnk').attr('readonly', true);
        }
    });

    $('#surat_ketetapan_pajak_daerah_checkbox').change(function(){
        if( $(this).prop('checked') == true ){
            $('#tanggal_terima_surat_ketetapan_pajak_daerah').attr('disabled', false);
            $('#nomor_surat_ketetapan_pajak_daerah').attr('readonly', false);
        } else {
            $('#tanggal_terima_surat_ketetapan_pajak_daerah').attr('disabled', true);
            $('#nomor_surat_ketetapan_pajak_daerah').attr('readonly', true);
        }
    });

    $('#kunci_kontak_checkbox').change(function(){
        if( $(this).prop('checked') == true ){
            $('#tanggal_terima_kunci_kontak').attr('disabled', false);
            $('#nomor_kunci_kontak').attr('readonly', false);
        } else {
            $('#tanggal_terima_kunci_kontak').attr('disabled', true);
            $('#nomor_kunci_kontak').attr('readonly', true);
        }
    });
    /* FUNGSI CHECKBOX END */

</script>
@endsection