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
                                <div class="col-xs-12 col-md-12 col-lg-3">
                                    <div class="form-group">
                                        <label>Nomor BPKB</label>
                                        <input type="text" name="no_bpkb" id="no_bpkb" class="form-control">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-12 col-lg-3">
                                    <div class="form-group">
                                        <label>Nomor Claim</label>
                                        <input type="text" name="no_claim" id="no_claim" class="form-control">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-12 col-lg-3">
                                    <div class="form-group">
                                        <label>Nomor Polis</label>
                                        <input type="text" name="no_polis" id="no_polis" class="form-control">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-12 col-lg-3">
                                    <div class="form-group">
                                        <label>Nama Tertanggung</label>
                                        <input type="text" name="nama_tertanggung" id="nama_tertanggung" class="form-control">
                                    </div>
                                </div>

                                <div class="clearfix"></div>

                                <div class="col-xs-12 col-md-12 col-lg-3">
                                    <div class="form-group">
                                        <label>Tanggal Pengajuan</label>
                                        <input type="text" name="tanggal_pengajuan" id="tanggal_pengajuan" class="form-control datepicker">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-md-12 col-lg-3">
                                    <div class="form-group">
                                        <label>TAT</label>
                                        {{-- <input type="text" name="tat" id="tat" class="form-control"> --}}
                                        <select name="tat" id="tat" class="form-control">
                                            <option value=""></option>
                                            <option value="Overdue">Overdue</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-md-12 col-lg-3">
                                    <div class="form-group">
                                        <label>User</label>
                                        <input type="text" name="user" id="user" class="form-control">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-md-12 col-lg-3">
                                    <div class="form-group">
                                        <label>Status</label>
                                        {{-- <input type="text" name="status" id="status" class="form-control"> --}}
                                        <select name="status" id="status" class="form-control">
                                            <option value=""></option>
                                            <option value="Open">Open</option>
                                            <option value="Submitted">Submitted</option>
                                            <option value="Approved by Analyst Claim MV">Approved by Analyst Claim MV</option>
                                            <option value="Revision">Revision</option>
                                            <option value="Filing">Filing</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="clearfix"></div>

                                <div class="col-xs-12 col-md-12 col-lg-3">
                                    <div class="form-group">
                                        <label>Unit</label>
                                        <input type="text" name="unit" id="unit" class="form-control">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-md-12 col-lg-3">
                                    <div class="form-group">
                                        <label>Tahun Kendaraan</label>
                                        <input type="text" name="tahun" id="tahun" class="form-control">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-md-12 col-lg-3">
                                    <div class="form-group">
                                        <label>Nomor Polisi</label>
                                        <input type="text" name="nomor_polisi" id="nomor_polisi" class="form-control">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-md-12 col-lg-3">
                                    <div class="form-group">
                                        <label>Nomor Rangka</label>
                                        <input type="text" name="no_rangka" id="no_rangka" class="form-control">
                                    </div>
                                </div>

                                <div class="clearfix"></div>

                                <div class="col-xs-12 col-md-12 col-lg-3">
                                    <div class="form-group">
                                        <label>Merk</label>
                                        <input type="text" name="merk" id="merk" class="form-control">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-md-12 col-lg-3">
                                    <div class="form-group">
                                        <label>Date of Loss</label>
                                        <input type="text" name="date_of_loss" id="date_of_loss" class="form-control datepicker">
                                    </div>
                                </div>

                                <div class="clearfix"></div>

                                <div class="col-xs-12 col-md-12 col-lg-12">
                                    <button id="btn-search" class="btn btn-primary">CARI</button>
                                    <button id="btn-reset" class="btn btn-outline-danger">RESET</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-12 col-lg-12">
                    <div class="table-responsive">
                        @if( $userGroup == 'USER_CLAIM' )
                        <a href="{{ Route('check-sheet-bpkb.create') }}" class="btn btn-success pull-right">Add</a>
                        @endif
                        <table class="table table-hover" id="DataTable" style="width:100%;">
                            <thead>
                                <tr class="bg-primary text-white">
                                    <th>Check Sheet ID</th>
                                    <th>No. BPKB</th>
                                    <th>No. Klaim</th>
                                    <th>No. Polis</th>
                                    <th>Date of Loss</th>
                                    <th>Tertanggung</th>
                                    <th>Waktu Pengajuan</th>
                                    <th>Merk Kendaraan</th>
                                    <th>Tahun Kendaraan</th>
                                    <th>No Mesin</th>
                                    <th>No Polisi</th>
                                    <th>No Rangka</th>
                                    <th>User</th>
                                    <th>Status</th>
                                    <th>TAT</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($SheetBpkb as $key => $val)
                                    <tr class="text-center">
                                        <td> {{ $val->check_sheet_id }} </td>
                                        <td> {{ $val->nomor_bpkb }} </td>
                                        <td> {{ $val->no_claim }} </td>
                                        <td> {{ $val->no_policy }} </td>
                                        <td> {{ date('d-M-y H:i:s', strtotime($val->date_of_loss)) }} </td>
                                        <td> {{ $val->insured }} </td>
                                        <td> {{ date('d-M-y H:i:s', strtotime($val->created_at)) }} </td>
                                        <td> {{ $val->unit }} </td>
                                        <td> {{ $val->tahun_kendaraan }} </td>
                                        <td> {{ $val->nomor_mesin }} </td>
                                        <td> {{ $val->nomor_polisi }} </td>
                                        <td> {{ $val->nomor_rangka }} </td>
                                        <td> {{ $val->getCreatedByName() }} </td>
                                        <td> {{ $val->GetStatus->status }} </td>
                                        <td>
                                            @if( $val->status == 3 )
                                                @if( $val->approve_at_analyst != null )
                                                    @php
                                                        $today = \Carbon\Carbon::now();
                                                        $approve_at_analyst = \Carbon\Carbon::CreateFromFormat(
                                                            'Y-m-d', date('Y-m-d', 
                                                                strtotime($val->approve_at_analyst. ' + 2 days')
                                                            )
                                                        );
                                                        $gap_legal = $today->diffInDays($approve_at_analyst);
                                                    @endphp
                                                    @if( $today < $approve_at_analyst )
                                                        <code style="color:green;">
                                                            <strong>{{$gap_legal}} days left</strong>
                                                        </code>
                                                    @elseif( $today > $approve_at_analyst )
                                                        <code style="color:red;">
                                                            <strong>Overdue for {{$gap_legal}} days</strong>
                                                        </code>
                                                    @endif
                                                @endif
                                            @endif
                                        </td>
                                        <td>
                                            @if( $userGroup == 'USER_CLAIM' )
                                                @if( $val->status == 1 )
                                                    <a href="{{ Route('check-sheet-bpkb.edit', $val->id) }}" class="btn btn-sm btn-outline-warning">
                                                        Edit
                                                    </a>
                                                @else
                                                    <a href="{{ Route('check-sheet-bpkb.show', $val->id) }}" class="btn btn-sm btn-outline-primary">
                                                        Show
                                                    </a>
                                                @endif
                                            @elseif( $userGroup == 'ANALYST_CLAIM' || $userGroup == 'HEAD_CLAIM' )
                                                @if( $val->status == 2 || $val->status == 4 )
                                                    <a href="{{ Route('check-sheet-bpkb.edit', $val->id) }}" class="btn btn-sm btn-outline-warning">
                                                        Edit
                                                    </a>
                                                @else
                                                    <a href="{{ Route('check-sheet-bpkb.show', $val->id) }}" class="btn btn-sm btn-outline-primary">
                                                        Show
                                                    </a>
                                                @endif
                                            @elseif( $userGroup == 'USER_LEGAL' || $userGroup == 'HEAD_LEGAL' )
                                                @if( $val->status == 3 )
                                                    <a href="{{ Route('check-sheet-bpkb.edit', $val->id) }}" class="btn btn-sm btn-outline-warning">
                                                        Edit
                                                    </a>
                                                @else
                                                    <a href="{{ Route('check-sheet-bpkb.show', $val->id) }}" class="btn btn-sm btn-outline-primary">
                                                        Show
                                                    </a>
                                                @endif
                                            @endif
                                            
                                            @if( $val->status == 5 )
                                                @if( !file_exists(url('storage/app/public/pdf-sheet-bpkb-legal/'.date('Y', strtotime($val->created_at)).'/sheet_bpkb_'.$val->check_sheet_id.'.pdf')) )
                                                    <button id="btn-download-not-ready" class="btn-download-not-ready btn btn-sm btn-outline-success mt-1">
                                                        Download
                                                    </button>
                                                @else
                                                <a href="{{ url('storage/app/public/pdf-sheet-bpkb-legal/'.date('Y', strtotime($val->created_at)).'/sheet_bpkb_'.$val->check_sheet_id.'.pdf') }}" target="_blank" class="btn btn-sm btn-outline-success mt-1">
                                                    Download
                                                </a>
                                                @endif
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
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
            $(".datepicker").datepicker({
                format: 'dd-M-yy',
                autoclose: true,
                todayHighlight: true,
            });

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
                ],
                responsive:true
            });

            setTimeout(() => {
                $('.buttons-csv').removeClass('btn-secondary');
            }, 5);
        });

        $('#btn-reset').click(function(){
            $('#loading').show();
            ResetDataTable();
            
            $('#no_bpkb').val('');
            $('#no_claim').val('');
            $('#no_polis').val('');
            $('#nama_tertanggung').val('');

            $('#tanggal_pengajuan').val('');
            $('#tat').val('');
            $('#user').val('');
            $('#status').val('');

            $('#unit').val('');
            $('#tahun').val('');
            $('#nomor_polisi').val('');
            $('#no_rangka').val('');

            $('#merk').val('');
            $('#date_of_loss').val('');
            
            SearchDataTable();
            setTimeout(() => {
                $('#loading').hide();
            }, 100);
        });

        $('#btn-search').click(function(){
            $('#loading').show();
            ResetDataTable();
            SearchDataTable();
            setTimeout(() => {
                $('#loading').hide();
            }, 100);
        });

        $('.btn-download-not-ready').click(function(){
            alert('Generating file still in progress.')
        });

        function ResetDataTable(){
            $('#DataTable').DataTable().destroy();
        }

        function SearchDataTable(){
            let table = $('#DataTable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'csvHtml5',
                        text: 'Export to Excel',
                        className: 'btn-primary',
                        exportOptions: {
                            modifier: {
                                search: 'none'
                            },
                            rows: ':visible'
                        }
                    }
                ],
                responsive:true
            });

            setTimeout(() => {
                $('.buttons-csv').removeClass('btn-secondary');
                $('#DataTable_filter').remove();
            }, 5);

            let no_bpkb = $('#no_bpkb').val();
            let no_claim = $('#no_claim').val();
            let no_polis = $('#no_polis').val();
            let nama_tertanggung = $('#nama_tertanggung').val();

            let tanggal_pengajuan = $('#tanggal_pengajuan').val();
            let tat = $('#tat').val();
            let user = $('#user').val();
            let status = $('#status').val();

            let unit = $('#unit').val();
            let tahun = $('#tahun').val();
            let nomor_polisi = $('#nomor_polisi').val();
            let no_rangka = $('#no_rangka').val();

            let merk = $('#merk').val();
            let date_of_loss = $('#date_of_loss').val();

            /* ?FILTER BARIS 1 */
            if( no_bpkb != '' ){
                table.column(1).search(no_bpkb).draw();
            }

            if( no_claim != '' ){
                table.column(2).search(no_claim).draw();
            }

            if( no_polis != '' ){
                table.column(3).search(no_polis).draw();
            }

            if( nama_tertanggung != '' ){
                table.column(5).search(nama_tertanggung).draw();
            }
            
            /* ?FILTER BARIS 2 */
            if( tanggal_pengajuan != '' ){
                // tanggal_pengajuan = formatDate(tanggal_pengajuan);
                table.column(6).search(tanggal_pengajuan).draw();
            }

            if( tat != '' ){
                table.column(14).search(tat).draw();
            }

            if( user != '' ){
                table.column(12).search(user).draw();
            }

            if( status != '' ){
                table.column(13).search(status).draw();
            }

            /* ?FILTER BARIS 3 */
            if( unit != '' ){
                table.column(7).search(unit).draw();
            }

            if( tahun != '' ){
                table.column(8).search(tahun).draw();
            }

            if( nomor_polisi != '' ){
                table.column(10).search(nomor_polisi).draw();
            }

            if( no_rangka != '' ){
                table.column(11).search(no_rangka).draw();
            }

            /* ?FILTER BARIS 4 */
            if( merk != '' ){
                table.column(7).search(merk).draw();
            }

            if( date_of_loss != '' ){
                table.column(4).search(date_of_loss).draw();
            }
        }

        function formatDate(date) {
            var d = new Date(date),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate(),
                year = d.getFullYear();

            if (month.length < 2) 
                month = '0' + month;
            if (day.length < 2) 
                day = '0' + day;

            return [year, month, day].join('-');
        }
    </script>
@endsection