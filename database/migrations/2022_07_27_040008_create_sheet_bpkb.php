<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSheetBpkb extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sheet_bpkb', function (Blueprint $table) {
            $table->increments('id');
            $table->string('created_by')->nullable();

            $table->string('approve_by_analyst')->nullable();
            $table->dateTime('approve_at_analyst')->nullable();

            $table->string('approve_by_legal')->nullable();
            $table->dateTime('approve_at_legal')->nullable();
            
            $table->string('reject_by_legal')->nullable();
            $table->dateTime('reject_at_legal')->nullable();

            $table->string('check_sheet_id')->nullable();
            $table->string('no_claim')->nullable();
            $table->string('tahun_kendaraan')->nullable();
            $table->string('no_policy')->nullable();
            $table->string('nomor_polisi')->nullable();
            $table->string('insured')->nullable();
            $table->dateTime('date_of_loss')->nullable();
            $table->string('unit')->nullable();

            $table->string('surat_tanda_bukti_lapor_polisi_checkbox')->nullable();
            $table->dateTime('tanggal_terima_surat_tanda_bukti_lapor_polisi')->nullable();
            $table->string('nomor_surat_tanda_bukti_lapor_polisi')->nullable();

            $table->string('kuitansi_blanko_checkbox')->nullable();
            $table->dateTime('tanggal_terima_kuitansi_blanko')->nullable();
            $table->string('nomor_kuitansi_blanko')->nullable();

            $table->string('bpkb_checkbox')->nullable();
            $table->dateTime('tanggal_terima_bpkb')->nullable();
            $table->string('nomor_bpkb')->nullable();
            $table->string('nomor_mesin_bpkb')->nullable();
            $table->string('nomor_rangka_bpkb')->nullable();

            $table->string('faktur_kendaraan_checkbox')->nullable();
            $table->dateTime('tanggal_terima_faktur_kendaraan')->nullable();
            $table->string('keterangan_faktur_kendaraan')->nullable();

            $table->string('nik_checkbox')->nullable();
            $table->dateTime('tanggal_terima_nik')->nullable();
            $table->string('nomor_nik')->nullable();

            $table->string('stnk_checkbox')->nullable();
            $table->dateTime('tanggal_terima_stnk')->nullable();
            $table->string('nomor_stnk')->nullable();
            
            $table->string('surat_ketetapan_pajak_daerah_checkbox')->nullable();
            $table->dateTime('tanggal_terima_surat_ketetapan_pajak_daerah')->nullable();
            $table->string('nomor_surat_ketetapan_pajak_daerah')->nullable();

            $table->string('kunci_kontak_checkbox')->nullable();
            $table->dateTime('tanggal_terima_kunci_kontak')->nullable();
            $table->string('nomor_kunci_kontak')->nullable();

            $table->string('status')->nullable();

            $table->string('pdf_sheet_bpkb')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sheet_bpkb');
    }
}
