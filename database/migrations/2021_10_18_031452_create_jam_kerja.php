<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJamKerja extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_jam_kerja', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',100);
            $table->string('code',100);
            $table->integer('checkin_start');
            $table->integer('checkin_end');
            $table->integer('checkout_start');
            $table->integer('checkout_end');
            $table->integer('jam_masuk');
            $table->integer('istirahat_start');
            $table->integer('istirahat_end');
            $table->integer('jam_pulang');
            $table->integer('crossday');
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
        Schema::drop('tb_jam_kerja');
    }
}
