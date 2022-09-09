<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LogSheetBpkb extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_sheet_bpkb', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sheet_id');
            $table->integer('status');
            $table->string('user_id');
            $table->string('user_name');
            $table->string('action')->nullable();
            $table->string('comment')->nullable();
            $table->string('next_email_role')->nullable();
            $table->string('email_sent')->nullable();
            $table->string('reject_email_user_id')->nullable();
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
        Schema::dropIfExists('log_sheet_bpkb');
    }
}
