@extends('PDF.layout.pdf-master')
@section('content')
    <div style="width:100%; padding-left:10px; padding-right:10px;">
        <div class="row mb-2">
            <div class="col-lg-12" style=" border:3px solid black; text-align:center;">
                Document Check sheet <br/>
                Check Sheet ID {{ $SheetBpkb->check_sheet_id }}
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <table style="width:100%; display:inline-block;">
                {{-- <table style="width:66%; display:inline-block;"> --}}
                    <tr>
                        <td style="width:15%;"> Claim No </td>
                        <td> : </td>
                        <td style="width:85%; border:2px solid black;">
                            {{ $SheetBpkb->no_claim }}
                        </td>
                    </tr>
                    <tr>
                        <td style="width:15%;"> Policy No </td>
                        <td> : </td>
                        <td style="width:85%; border:2px solid black;">
                            {{ $SheetBpkb->no_policy }}
                        </td>
                    </tr>
                    <tr>
                        <td style="width:15%;"> Insured </td>
                        <td> : </td>
                        <td style="width:85%; border:2px solid black;">
                            {{ $SheetBpkb->insured }}
                        </td>
                    </tr>
                    <tr>
                        <td style="width:15%;"> Unit </td>
                        <td> : </td>
                        <td style="width:85%; border:2px solid black;">
                            {{ $SheetBpkb->unit }}
                        </td>
                    </tr>
                </table>
                {{-- <table style="width:33%; float:right;">
                    <tr>
                        <td style="width:45%;"> Check Sheet ID </td>
                        <td> : </td>
                        <td>
                            {{ $SheetBpkb->check_sheet_id }}
                        </td>
                    </tr>
                    <tr>
                        <td style="width:45%;"> Date of Loss </td>
                        <td> : </td>
                        <td style="border:2px solid black;">
                            19-jun-2022
                        </td>
                    </tr>
                </table> --}}
            </div>

        </div>
        <div class="row">

            <div class="col-xs-12 col-md-12 col-lg-12">
                <table class="table table-bordered">
                    <?php
                        $nomor = 1;
                    ?>
                    <tr class="text-center">
                        <td colspan="4">
                            List of Document
                        </td>
                    </tr>
                    <tr class="text-center">
                        <td>No</td>
                        <td>Desc</td>
                        <td>Hand Over By</td>
                        <td>Date</td>
                    </tr>
                    @foreach ($Data as $key => $val)
                        <tr>
                            <td class="text-center"> {{ $nomor }} </td>
                            <td>
                                {{ $val['title'] }} <br/>
                                {{ $val['body'] }}
                            </td>
                            <td class="text-center"> {{ $SheetBpkb->getCreatedByName() }} </td>
                            <td class="text-center"> {{ date('d-M-y', strtotime($val['date'])) }} </td>
                        </tr>
                        @php($nomor++)
                    @endforeach
                    @foreach ($SheetTambahan as $keyT => $valT)
                        <tr>
                            <td class="text-center"> {{ $nomor }} </td>
                            <td> 
                                {{ $valT->judul_tambahan }}  <br/>
                                {{ $valT->nomor_tambahan }}
                            </td>
                            <td class="text-center"> {{ $SheetBpkb->getCreatedByName() }} </td>
                            <td class="text-center"> {{ date('d-M-y', strtotime($valT->tanggal_terima_tambahan)) }} </td>
                        </tr>
                        @php($nomor++)
                    @endforeach
                </table>
            </div>

        </div>

        <div style="page-break-before: always">&nbsp;</div>

        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <table class="borderless" style="display:inline-block;">
                    <tr>
                        <td>
                            Original Documents
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Forwarded to Legal
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Date : {{ date('d-M-y', strtotime($SheetBpkb->created_at)) }} <br/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            By : {{ $SheetBpkb->getCreatedByName() }}
                        </td>
                    </tr>
                </table>
                <table class="borderless" style="float:right">
                    {{-- <tr>
                        <td>
                            &nbsp;
                        </td>
                    </tr> --}}
                    <tr>
                        <td>
                            Received By Legal 
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Date : {{ date('d-M-y', strtotime($SheetBpkb->approve_at_legal)) }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            By : {{ $SheetBpkb->getApproveUserLegalData->Name }}
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection