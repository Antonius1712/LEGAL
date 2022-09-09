<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSheetBpkbTambahan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sheet_bpkb_tambahan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sheet_bpkb_id');
            $table->string('judul_tambahan');
            $table->dateTime('tanggal_terima_tambahan');
            $table->string('nomor_tambahan');
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
        Schema::dropIfExists('sheet_bpkb_tambahan');
    }
}
