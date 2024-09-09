@extends('layouts.app')
@section('title')
    Form Check Sheet BPKB
@endsection
@section('content')
    @if( $userGroup == 'HEAD_LEGAL' || $userGroup == 'USER_LEGAL' )
        @php( $readonly = 'readonly' )
        @php( $disabled = 'disabled' )
        @php( $display = 'none' )
    @else
        @php( $readonly = '' )
        @php( $disabled = '' )
        @php( $display = '' )
    @endif
    <form id="form-sheet" action="{{ Route('check-sheet-bpkb.update', $checkSheet->id) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
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
                                                {{ $readonly }}
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
                                                {{ $readonly }}
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
                                                {{ $readonly }}
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
                                                {{ $readonly }}
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
                                                {{ $readonly }}
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
                                                value="{{ $checkSheet->date_of_loss
                                                            ? date('d-M-y', strtotime($checkSheet->date_of_loss))
                                                            : '' }}"
                                                {{ $readonly }}
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
                                                {{ $readonly }}
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
                                    {{ $disabled }}
                                    >
                                    @if( $userGroup == 'USER_LEGAL' || $userGroup == 'HEAD_LEGAL' )
                                        <input type="hidden" name="surat_tanda_bukti_lapor_polisi_checkbox" value="{{ $checkSheet->surat_tanda_bukti_lapor_polisi_checkbox ? 'on' : '' }}">
                                    @endif
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
                                                    ? date('d-M-y', strtotime($checkSheet->tanggal_terima_surat_tanda_bukti_lapor_polisi))
                                                    : '' }}" 
                                        {{ $checkSheet->surat_tanda_bukti_lapor_polisi_checkbox
                                            ? ''
                                            : 'disabled' }}
                                        {{ $readonly }}
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
                                        {{ $checkSheet->surat_tanda_bukti_lapor_polisi_checkbox
                                            ? ''
                                            : 'readonly' }}
                                        {{ $readonly }}
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
                                    {{ $disabled }}
                                    >
                                    @if( $userGroup == 'USER_LEGAL' || $userGroup == 'HEAD_LEGAL' )
                                        <input type="hidden" name="kuitansi_blanko_checkbox" value="{{ $checkSheet->kuitansi_blanko_checkbox ? 'on' : '' }}">
                                    @endif
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
                                                    ? date('d-M-y', strtotime($checkSheet->tanggal_terima_kuitansi_blanko))
                                                    : '' }}" 
                                        {{ $checkSheet->kuitansi_blanko_checkbox
                                            ? ''
                                            : 'disabled' }} 
                                        {{ $readonly }}
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
                                        {{ $checkSheet->kuitansi_blanko_checkbox
                                            ? ''
                                            : 'readonly' }} 
                                        {{ $readonly }}
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
                                    {{ $disabled }}
                                    >
                                    @if( $userGroup == 'USER_LEGAL' || $userGroup == 'HEAD_LEGAL' )
                                        <input type="hidden" name="bpkb_checkbox" value="{{ $checkSheet->bpkb_checkbox ? 'on' : '' }}">
                                    @endif
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
                                                    ? date('d-M-y', strtotime($checkSheet->tanggal_terima_bpkb))
                                                    : '' }}"
                                        {{ $checkSheet->bpkb_checkbox
                                            ? ''
                                            : 'disabled' }}
                                        {{ $readonly }}
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
                                        {{ $checkSheet->bpkb_checkbox
                                            ? ''
                                            : 'readonly' }}
                                        {{ $readonly }}
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
                                        {{ $checkSheet->bpkb_checkbox
                                            ? ''
                                            : 'readonly' }}
                                        {{ $readonly }}
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
                                        {{ $checkSheet->bpkb_checkbox
                                            ? ''
                                            : 'readonly' }}
                                        {{ $readonly }}
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
                                    {{ $disabled }}
                                    >
                                    @if( $userGroup == 'USER_LEGAL' || $userGroup == 'HEAD_LEGAL' )
                                        <input type="hidden" name="faktur_kendaraan_checkbox" value="{{ $checkSheet->faktur_kendaraan_checkbox ? 'on' : '' }}">
                                    @endif
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
                                                    ? date('d-M-y', strtotime($checkSheet->tanggal_terima_faktur_kendaraan))
                                                    : '' }}"
                                        {{ $checkSheet->faktur_kendaraan_checkbox
                                            ? ''
                                            : 'disabled' }}
                                        {{ $readonly }}
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
                                        {{ $checkSheet->faktur_kendaraan_checkbox
                                            ? ''
                                            : 'readonly' }}
                                        {{ $readonly }}
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
                                    {{ $disabled }}
                                    >
                                    @if( $userGroup == 'USER_LEGAL' || $userGroup == 'HEAD_LEGAL' )
                                        <input type="hidden" name="nik_checkbox" value="{{ $checkSheet->nik_checkbox ? 'on' : '' }}">
                                    @endif
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
                                                    ? date('d-M-y', strtotime($checkSheet->tanggal_terima_nik))
                                                    : '' }}"
                                        {{ $checkSheet->nik_checkbox
                                            ? ''
                                            : 'disabled' }}
                                        {{ $readonly }}
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
                                        {{ $checkSheet->nomor_nik
                                            ? ''
                                            : 'readonly' }}
                                        {{ $readonly }}
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
                                    {{ $disabled }}
                                    >
                                    @if( $userGroup == 'USER_LEGAL' || $userGroup == 'HEAD_LEGAL' )
                                        <input type="hidden" name="stnk_checkbox" value="{{ $checkSheet->stnk_checkbox ? 'on' : '' }}">
                                    @endif
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
                                                    ? date('d-M-y', strtotime($checkSheet->tanggal_terima_stnk))
                                                    : '' }}"
                                        {{ $checkSheet->stnk_checkbox
                                            ? ''
                                            : 'disabled' }}
                                        {{ $readonly }}
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
                                        {{ $checkSheet->nomor_stnk
                                            ? ''
                                            : 'readonly' }}
                                        {{ $readonly }}
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
                                    {{ $disabled }}
                                    >
                                    @if( $userGroup == 'USER_LEGAL' || $userGroup == 'HEAD_LEGAL' )
                                        <input type="hidden" name="surat_ketetapan_pajak_daerah_checkbox" value="{{ $checkSheet->surat_ketetapan_pajak_daerah_checkbox ? 'on' : '' }}">
                                    @endif
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
                                                    ? date('d-M-y', strtotime($checkSheet->tanggal_terima_surat_ketetapan_pajak_daerah))
                                                    : '' }}"
                                        {{ $checkSheet->surat_ketetapan_pajak_daerah_checkbox
                                            ? ''
                                            : 'disabled' }}
                                        {{ $readonly }}
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
                                        {{ $checkSheet->surat_ketetapan_pajak_daerah_checkbox
                                            ? ''
                                            : 'readonly' }}
                                        {{ $readonly }}
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
                                    {{ $disabled }}
                                    >
                                    @if( $userGroup == 'USER_LEGAL' || $userGroup == 'HEAD_LEGAL' )
                                        <input type="hidden" name="kunci_kontak_checkbox" value="{{ $checkSheet->kunci_kontak_checkbox ? 'on' : '' }}">
                                    @endif
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
                                                    ? date('d-M-y', strtotime($checkSheet->tanggal_terima_kunci_kontak))
                                                    : '' }}"
                                        {{ $checkSheet->kunci_kontak_checkbox
                                            ? ''
                                            : 'disabled' }}
                                        {{ $readonly }}
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
                                        {{ $checkSheet->kunci_kontak_checkbox
                                            ? ''
                                            : 'readonly' }}
                                        {{ $readonly }}
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- TAMBAHAN --}}
                        <button id="btn-add" class="btn btn-success" style="display:{{ $display }}">
                            Add
                        </button>
                        <table class="table table-bordered">
                            <thead>
                                <tr class="bg-primary text-white text-center">
                                    <th> Judul </th>    
                                    <th> Tanggal Terima </th>    
                                    <th> Nomor </th>    
                                    @if( $userGroup != 'USER_LEGAL' && $userGroup != 'HEAD_LEGAL' )
                                        <th> Hapus </th>    
                                    @endif
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
                                                required
                                                >
                                                @if($errors->has('judul_tambahan.'.$key))
                                                    <div class="error">{{ $errors->first('judul_tambahan.'.$key) }}</div>
                                                @endif
                                            </td>    
                                            <td>
                                                <input type="text" 
                                                name="tanggal_terima_tambahan[]" 
                                                class="form-control datepicker"
                                                value="{{ old('tanggal_terima_tambahan')[$key] 
                                                            ? old('tanggal_terima_tambahan')[$key] 
                                                            : old('tanggal_terima_tambahan')[$key] }}"
                                                required
                                                >    
                                                @if($errors->has('tanggal_terima_tambahan.'.$key))
                                                    <div class="error">{{ $errors->first('tanggal_terima_tambahan.'.$key) }}</div>
                                                @endif
                                            </td>    
                                            <td>
                                                <input type="text" 
                                                name="nomor_tambahan[]" 
                                                class="form-control"
                                                value="{{ old('nomor_tambahan')[$key] 
                                                            ? old('nomor_tambahan')[$key] 
                                                            : old('nomor_tambahan')[$key] }}"
                                                required
                                                >   
                                                @if($errors->has('nomor_tambahan.'.$key))
                                                    <div class="error">{{ $errors->first('nomor_tambahan.'.$key) }}</div>
                                                @endif 
                                            </td>
                                            <td>
                                                <button type="button" 
                                                class="btn btn-danger btn-hapus">
                                                    Hapus
                                                </button>    
                                            </td>
                                        </tr>
                                    @endforeach
                                @elseif( count($sheetTambahan) > 0 )
                                    @foreach ($sheetTambahan as $key => $val)
                                        <tr class="text-center bg-white text-black">
                                            <td>
                                                <input type="text" 
                                                name="judul_tambahan[]" 
                                                class="form-control"
                                                value="{{ $val->judul_tambahan 
                                                            ? $val->judul_tambahan 
                                                            : $val->judul_tambahan }}"
                                                {{ $readonly }}
                                                >    
                                            </td>    
                                            <td>
                                                <input type="text" 
                                                name="tanggal_terima_tambahan[]" 
                                                class="form-control datepicker"
                                                value="{{ $val->tanggal_terima_tambahan 
                                                    ? date('d-M-y', strtotime($val->tanggal_terima_tambahan ))
                                                    : $val->tanggal_terima_tambahan }}"
                                                {{ $readonly }}
                                                >    
                                            </td>    
                                            <td>
                                                <input type="text" 
                                                name="nomor_tambahan[]" 
                                                class="form-control"
                                                value="{{ $val->nomor_tambahan 
                                                    ? $val->nomor_tambahan 
                                                    : $val->nomor_tambahan }}"
                                                {{ $readonly }}
                                                >    
                                            </td>
                                            @if( $userGroup != 'USER_LEGAL' && $userGroup != 'HEAD_LEGAL' )
                                            <td>
                                                <button type="button" 
                                                class="btn btn-danger btn-hapus">
                                                    Hapus
                                                </button>    
                                            </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>

                

                <input type="hidden" id="status" name="status">

                <div class="form-actions">
                    @if( $userGroup == 'USER_CLAIM' )
                        @if( $checkSheet->status == 1 )
                            <button type="submit" id="btn-submit" class="btn btn-success pull-right ml-2">
                                Submit
                            </button>
                            <button type="submit" id="btn-save" class="btn btn-warning pull-right">
                                Save
                            </button>
                        @endif
                    @elseif( $userGroup == 'ANALYST_CLAIM' || $userGroup == 'HEAD_CLAIM' )
                        @if( $checkSheet->status == 2 || $checkSheet->status == 4 )
                            <button type="submit" id="btn-approve" class="btn btn-success pull-right">
                                Approve
                            </button>
                        @endif
                    @elseif( $userGroup == 'USER_LEGAL' || $userGroup == 'HEAD_LEGAL' )
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

                <style>
                    .modal-backdrop {
                        width: 100% !important;
                        height: 100% !important;
                    }
                </style>
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
    </form>

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
        let nextId = '{{ $Status->first()->id }}';
        $('#status').val(nextId);
        $('#form-sheet').submit();
    });

    $('body').on('click', '#btn-submit', function(e){
        e.preventDefault();
        let nextId = '{{ $checkSheet->GetStatus->next_id }}';
        $('#status').val(nextId);
        $('#form-sheet').submit();
    });

    $('body').on('click', '#btn-approve', function(e){
        e.preventDefault();
        let nextId = '{{ $checkSheet->GetStatus->next_id }}';
        $('#status').val(nextId);
        $('#form-sheet').submit();
    });

    $('body').on('click', '#btn-reject', function(e){
        e.preventDefault();
        let backId = '{{ $checkSheet->GetStatus->back_id }}';
        $('#status').val(backId);
        $('#form-sheet').submit();
    });

    $('body').on('click', '#btn-reject-modal', function(e){
        e.preventDefault();
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

            $('#tanggal_terima_surat_tanda_bukti_lapor_polisi').val('');
            $('#nomor_surat_tanda_bukti_lapor_polisi').val('');
        }
    });

    $('#kuitansi_blanko_checkbox').change(function(){
        if( $(this).prop('checked') == true ){
            $('#tanggal_terima_kuitansi_blanko').attr('disabled', false);
            $('#nomor_kuitansi_blanko').attr('readonly', false);
        } else {
            $('#tanggal_terima_kuitansi_blanko').attr('disabled', true);
            $('#nomor_kuitansi_blanko').attr('readonly', true);

            $('#tanggal_terima_kuitansi_blanko').val('');
            $('#nomor_kuitansi_blanko').val('');
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

            $('#tanggal_terima_bpkb').val('');
            $('#nomor_bpkb').val('');
            $('#nomor_mesin_bpkb').val('');
            $('#nomor_rangka_bpkb').val('');
        }
    });

    $('#faktur_kendaraan_checkbox').change(function(){
        if( $(this).prop('checked') == true ){
            $('#tanggal_terima_faktur_kendaraan').attr('disabled', false);
            $('#keterangan_faktur_kendaraan').attr('readonly', false);
        } else {
            $('#tanggal_terima_faktur_kendaraan').attr('disabled', true);
            $('#keterangan_faktur_kendaraan').attr('readonly', true);

            $('#tanggal_terima_faktur_kendaraan').val('');
            $('#keterangan_faktur_kendaraan').val('');
        }
    });

    $('#nik_checkbox').change(function(){
        if( $(this).prop('checked') == true ){
            $('#tanggal_terima_nik').attr('disabled', false);
            $('#nomor_nik').attr('readonly', false);
        } else {
            $('#tanggal_terima_nik').attr('disabled', true);
            $('#nomor_nik').attr('readonly', true);

            $('#tanggal_terima_nik').val('');
            $('#nomor_nik').val('');
        }
    });

    $('#stnk_checkbox').change(function(){
        if( $(this).prop('checked') == true ){
            $('#tanggal_terima_stnk').attr('disabled', false);
            $('#nomor_stnk').attr('readonly', false);
        } else {
            $('#tanggal_terima_stnk').attr('disabled', true);
            $('#nomor_stnk').attr('readonly', true);

            $('#tanggal_terima_stnk').val('');
            $('#nomor_stnk').val('');
        }
    });

    $('#surat_ketetapan_pajak_daerah_checkbox').change(function(){
        if( $(this).prop('checked') == true ){
            $('#tanggal_terima_surat_ketetapan_pajak_daerah').attr('disabled', false);
            $('#nomor_surat_ketetapan_pajak_daerah').attr('readonly', false);
        } else {
            $('#tanggal_terima_surat_ketetapan_pajak_daerah').attr('disabled', true);
            $('#nomor_surat_ketetapan_pajak_daerah').attr('readonly', true);

            $('#tanggal_terima_surat_ketetapan_pajak_daerah').val('');
            $('#nomor_surat_ketetapan_pajak_daerah').val('');
        }
    });

    $('#kunci_kontak_checkbox').change(function(){
        if( $(this).prop('checked') == true ){
            $('#tanggal_terima_kunci_kontak').attr('disabled', false);
            $('#nomor_kunci_kontak').attr('readonly', false);
        } else {
            $('#tanggal_terima_kunci_kontak').attr('disabled', true);
            $('#nomor_kunci_kontak').attr('readonly', true);

            $('#tanggal_terima_kunci_kontak').val('');
            $('#nomor_kunci_kontak').val('');
        }
    });
    /* FUNGSI CHECKBOX END */

</script>
@endsection