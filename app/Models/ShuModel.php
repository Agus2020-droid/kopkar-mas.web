<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ShuModel extends Model
{
    use HasFactory;
    protected $table = "tb_shu";
    protected $primaryKey = "id_shu";
    protected $fillable = [
        'tgl_shu',
        'thn_buku',
        'nik_ktp',
        'nama',
        'nm_bank',
        'no_rek',
        'peran_krdt',
        'peran_peng',
        'jml_shu',
    ];
}
