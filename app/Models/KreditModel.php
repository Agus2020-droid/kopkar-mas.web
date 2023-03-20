<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class KreditModel extends Model
{
    use HasFactory;
    protected $table = "tb_kredit";
    protected $primaryKey = "id_kredit";
    protected $fillable = [
        'kd_kredit',
        'tgl_kredit',
        'user_id',
        'nama',
        'nik_ktp',
        'jns_krdt',
        'nm_brg',
        'jml_brng',
        'nm_kendaraan',
        'kondisi',
        'jml_unit',
        'spek',
        'beli_oleh',
        'keperluan',
        'nominal',
        'tenor',
        'tempo',
        'angsuran',
        'bunga',
        'total',
        'tgl_atsn',
        'app_atsn',
        'nm_atsn',
        'tgl_ptgs',
        'app_ptgs',
        'nm_ptgs',
        'tgl_bnd',
        'app_bnd',
        'nm_bnd',
        'tgl_ket',
        'app_ket',
        'nm_ket',
        'status',
       
    ];

}
