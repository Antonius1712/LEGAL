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
            <form action="{{ Route('check-sheet-bpkb.store') }}" method="post">
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
                                                <input type="text" name="no_claim" id="no_claim" class="form-control">
                                            </div>
                                            <div class="col-xs-12 col-md-12 col-lg-2">
                                                <span>Tahun Kendaraan</span>
                                            </div>
                                            <div class="col-xs-12 col-md-12 col-lg-4">
                                                <input type="text" name="tahun_kendaraan" id="tahun_kendaraan" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="row form-group">
                                            <div class="col-xs-12 col-md-12 col-lg-2">
                                                <span>No Policy</span>
                                            </div>
                                            <div class="col-xs-12 col-md-12 col-lg-4">
                                                <input type="text" name="no_policy" id="no_policy" class="form-control">
                                            </div>
                                            <div class="col-xs-12 col-md-12 col-lg-2">
                                                <span>Nomor Polisi</span>
                                            </div>
                                            <div class="col-xs-12 col-md-12 col-lg-4">
                                                <input type="text" name="Nomor Polisi" id="Nomor Polisi" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="row form-group">
                                            <div class="col-xs-12 col-md-12 col-lg-2">
                                                <span>Insured</span>
                                            </div>
                                            <div class="col-xs-12 col-md-12 col-lg-4">
                                                <input type="text" name="insured" id="insured" class="form-control">
                                            </div>
                                            <div class="col-xs-12 col-md-12 col-lg-2">
                                                <span>Date of Loss</span>
                                            </div>
                                            <div class="col-xs-12 col-md-12 col-lg-4">
                                                <input type="text" name="date_of_loss" id="date_of_loss" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="row form-group">
                                            <div class="col-xs-12 col-md-12 col-lg-2">
                                                <span>Unit</span>
                                            </div>
                                            <div class="col-xs-12 col-md-12 col-lg-4">
                                                <input type="text" name="unit" id="unit" class="form-control">
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
                        dsadsa
                    </div>
                </div>
                <button type="submit" class="btn btn-success pull-right">
                    Submit
                </button>
            </form>
        </div>
    </div>
@endsection
@section('script')

@endsection