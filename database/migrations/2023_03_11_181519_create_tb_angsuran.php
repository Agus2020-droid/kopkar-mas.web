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
        Schema::create('tb_angsuran', function (Blueprint $table) {
            $table->increments('id_angsuran');
            $table->string('kredit_id',5);
            $table->string('user_id',5);
            $table->string('nama',50);
            $table->string('tgl_angsuran',20);
            $table->string('jml_angsuran',10);
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
        Schema::dropIfExists('tb_angsuran');
    }
};
