@extends('layouts.app')
@section('title')
    Check Sheet BPKB
@endsection
@section('content')
    <div class="card">
        <div class="card-header bg-primary text-white">
            <p>
                List Check Sheet BPKB
            </p>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-xs-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <p>
                                Filter
                            </p>
                        </div>
                        <div class="card-body bg-default-2">
                            <div class="row">
                                <div class="col-xs-12 col-md-12 col-lg-4">
                                    <div class="form-group">
                                        <label>No Claim.</label>
                                        <input type="text" name="no_claim" id="no_claim" class="form-control">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-12 col-lg-4">
                                    <div class="form-group">
                                        <label>No Polis.</label>
                                        <input type="text" name="no_polis" id="no_polis" class="form-control">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-12 col-lg-4">
                                    <div class="form-group">
                                        <label>User</label>
                                        <input type="text" name="user" id="user" class="form-control">
                                    </div>
                                </div>

                                <div class="clearfix"></div>

                                <div class="col-xs-12 col-md-12 col-lg-4">
                                    <div class="form-group">
                                        <label>Unit / Tahun / Plat Kendaraan</label>
                                        <input type="text" name="unit_tahun_plat" id="unit_tahun_plat" class="form-control">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-12 col-lg-4">
                                    <div class="form-group">
                                        <label>Nama Tertanggung</label>
                                        <input type="text" name="nama_tertanggung" id="nama_tertanggung" class="form-control">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-12 col-lg-4">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <input type="text" name="status" id="status" class="form-control">
                                    </div>
                                </div>

                                <div class="clearfix"></div>

                                <div class="col-xs-12 col-md-12 col-lg-12">
                                    <button class="btn btn-primary">CARI</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-12 col-lg-12">
                    <div class="table-responsive m-t-0">
                        <a href="{{ Route('check-sheet-bpkb.create') }}" class="btn btn-success pull-right">Add</a>
                        <table class="table table-bordered" id="DataTable">
                            <thead>
                                <tr class="bg-primary text-white text-center">
                                    <th>No. Klaim</th>
                                    <th>No. Polis</th>
                                    <th>User</th>
                                    <th>Unit / Tahun / Plat</th>
                                    <th>Nama Tertanggung</th>
                                    <th>Satatus</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            var table = $('#DataTable').DataTable({
                searching : false,
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'csvHtml5',
                        text: 'Export to Excel',
                        className: 'btn-primary',
                        exportOptions: {
                            modifier: {
                                search: 'none'
                            }
                        }
                    }
                ]
            });

            setTimeout(() => {
                $('.buttons-csv').removeClass('btn-secondary');
            }, 5);
        });
    </script>
@endsection