<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\KreditModel;
use App\Models\AngsuranModel;
use Illuminate\Support\Facades\DB;
class AnggotaController extends Controller
{
    public function index() {
        return view('v_anggota');
    }

    public function profileAnggota() {
        if(auth()->user()->level == 2)
        {
            return view('anggota.v_profile');
        }else{
            return view('v_profile');
        }
    }

    public function anggota()
    {
        $users = User::whereIn('level',[2,3,4,5,6,7])->get();
        return view('v_anggota', compact('users'));
    }

    public function detailAnggota($id)
    {
        $nik = User::where('id',$id)->value('nik_ktp');
        $users = User::where('id',$id)->get();
        $simpanan = User::where('users.id', $id)
        ->leftJoin('tb_simpanan', 'users.nik_ktp','=','tb_simpanan.nik_ktp')
        ->select('users.nik_ktp as nikKtp','name',DB::raw('SUM(CASE WHEN stts = 1 THEN jml_simpanan ELSE 0 END) AS simpananMasuk'), DB::raw('SUM(CASE WHEN stts = 0 THEN jml_simpanan ELSE 0 END) AS simpananKeluar'))
        ->groupBy('nikKtp','name',)
        ->get();

        $kredit = KreditModel::where('nik_ktp', $nik)->sum('total');
        $angsuran = AngsuranModel::where('nik_ktp', $nik)->sum('jml_angsuran');
        // dd($angsuran);
        return view('v_detailAnggota', compact('users','simpanan','kredit','angsuran'));
    }
}
