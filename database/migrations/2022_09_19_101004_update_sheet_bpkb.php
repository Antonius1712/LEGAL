<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateSheetBpkb extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if( !Schema::hasColumn('sheet_bpkb','pdf_sheet_bpkb') ){
            Schema::table('sheet_bpkb', function (Blueprint $table) {
                $table->string('pdf_sheet_bpkb')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if( Schema::hasColumn('sheet_bpkb','pdf_sheet_bpkb') ){
            Schema::table('sheet_bpkb', function (Blueprint $table) {
                $table->dropColumn('pdf_sheet_bpkb');
            });
        }
    }
}
