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
        Schema::create('tb_shu', function (Blueprint $table) {
            $table->increments('id_shu');
            $table->string('tgl_shu',20);
            $table->string('thn_buku',20);
            $table->string('nik_ktp',16);
            $table->string('nama',50);
            $table->string('nm_bank',50);
            $table->string('no_rek',50);
            $table->string('peran_krdt',50);
            $table->string('peran_peng',50);
            $table->string('jml_shu',16);
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
        Schema::dropIfExists('tb_shu');
    }
};
