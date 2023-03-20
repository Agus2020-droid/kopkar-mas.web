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
        Schema::create('tb_kredit', function (Blueprint $table) {
            $table->increments('id_kredit');
            $table->string('user_id',7);
            $table->string('nama',50);
            $table->string('nik_ktp',16);
            $table->string('jns_krdt',15);
            $table->text('nm_brg');
            $table->string('jml_brng',50);
            $table->string('nm_kendaraan',50);
            $table->string('kondisi',5);
            $table->string('jml_unit',5);
            $table->text('spek');
            $table->string('beli_oleh',10);
            $table->text('keperluan');
            $table->string('nominal',10);
            $table->string('tenor',3);
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
        Schema::dropIfExists('tb_kredit');
    }
};
