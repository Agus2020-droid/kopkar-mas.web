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
        Schema::create('tb_simpanan', function (Blueprint $table) {
            $table->increments('id_simpanan');
            $table->string('tgl_simpanan',20);
            $table->string('nik_ktp',16);
            $table->string('nama',50);
            $table->string('jml_simpanan',16);
            $table->string('stts',3);
            $table->string('ket',16);
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
        Schema::dropIfExists('tb_simpanan');
    }
};
