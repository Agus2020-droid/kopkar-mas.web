<?php

namespace App\Imports;

use App\Models\SimpananModel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SimpananImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new SimpananModel([
            'tgl_simpanan' => $row['tgl_simpanan'],
            'nik_ktp' => $row['nik_ktp'],
            'nama' => $row['nama'],
            'jml_simpanan' => $row['jml_simpanan'],
            'stts' => $row['stts'],
            'ket' => $row['ket']
        ]);
    }
}
