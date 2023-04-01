<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class SimpananModel extends Model
{
    use HasFactory;
    protected $table = "tb_simpanan";
    protected $primaryKey = "id_simpanan";
    protected $fillable = [
        'tgl_simpanan',
        'nik_ktp',
        'nama',
        'jml_simpanan',
        'stts', 
        'ket', 
    ];

    public function updateSimpanan($id_simpanan, $data) 
    {
        DB::table('tb_simpanan')
        ->where('id_simpanan', $id_shu)
        ->update($data);
    }
}
