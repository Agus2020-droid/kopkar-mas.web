<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AngsuranModel extends Model
{
    use HasFactory;
    protected $table = "tb_angsuran";
    protected $primaryKey = "id_angsuran";
    protected $fillable = [
        'kredit_kd',
        'user_id',
        'nama',
        'tgl_angsuran',
        'jml_angsuran', 
        'metode', 
        'noref', 
    ];
}
