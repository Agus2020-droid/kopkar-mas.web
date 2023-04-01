<?php

namespace App\Imports;

use App\Models\ShuModel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ShuImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ShuModel([
            'tgl_shu' => $row['tgl_shu'],
            'thn_buku' => $row['thn_buku'],
            'nik_ktp' => $row['nik_ktp'],
            'nama' => $row['nama'],
            'nm_bank' => $row['nm_bank'],
            'no_rek' => $row['no_rek'],
            'peran_krdt' => $row['peran_krdt'],
            'peran_peng' => $row['peran_peng'],
            'jml_shu' => $row['jml_shu'],
        ]);
    }
}
