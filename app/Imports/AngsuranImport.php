<?php

namespace App\Imports;

use App\Models\AngsuranModel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Str;

class AngsuranImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $metode = 3;
        $ref = Str::random(12);
        return new AngsuranModel([
            'kredit_kd' => $row['kredit_kd'],
            'nik_ktp' => $row['nik_ktp'],
            'nama' => $row['nama'],
            'tgl_angsuran' => $row['tgl_angsuran'],
            'jml_angsuran' => $row['jml_angsuran'],
            'metode' => $metode,
            'noref' => $ref,
        ]);
    }
}
