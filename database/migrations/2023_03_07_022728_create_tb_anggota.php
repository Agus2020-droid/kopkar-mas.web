<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_anggota', function (Blueprint $table) {
            $table->increments('id_anggota');
            $table->string('nik_ktp',16);
            $table->string('nm_anggota',50);
            $table->string('tgl_masuk',25);
            $table->string('nik_karyawan',10);
            $table->string('tmpt_lhr',30);
            $table->string('tgl_lhr',25);
            $table->string('status_kerja',25);
            $table->string('kepengurusan',25);
            $table->string('alamat',100);
            $table->softDeletes();
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
        Schema::dropIfExists('tb_anggota');
    }
};
