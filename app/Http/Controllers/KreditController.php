<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KreditController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function kreditAnggota() {
        return view('anggota.v_kredit');
    }

    public function detailKreditAnggota()
    {
        return view('anggota.v_detailKredit');
    }

    public function cetakKredit()
    {
        return view('anggota.v_cetakDetailKredit');
    }

    public function simpanKredit(Request $request)
    {
        // $plafons = Request()->plafon;
        // $pattern = '/[^\w\s]/u';
        // $replacement = '';
        // $nominal = preg_replace($pattern, $replacement, $plafons);

        // $tenor = Request()->tenor;
        // $bunga = 0.15;
        // $angsuran = round((($nominal*$bunga)+$nominal)/$tenor);

        dd($request->all());
    }
}
