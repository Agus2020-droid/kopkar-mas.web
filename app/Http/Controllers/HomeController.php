<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KreditModel;
use App\Models\ShuModel;
use App\Models\SimpananModel;
use App\Models\User;
use App\Models\AngsuranModel;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()->level == 2){
            $simpanan = User::where('users.nik_ktp', auth()->user()->nik_ktp)
            ->leftJoin('tb_simpanan', 'users.nik_ktp','=','tb_simpanan.nik_ktp')
            ->select('users.nik_ktp as nikKtp','name',DB::raw('SUM(CASE WHEN stts = 1 THEN jml_simpanan ELSE 0 END) AS simpananMasuk'), DB::raw('SUM(CASE WHEN stts = 0 THEN jml_simpanan ELSE 0 END) AS simpananKeluar'))
            ->groupBy('nikKtp','name',)
            ->get();
            $ttlKredit = KreditModel::where('user_id',auth()->user()->id)
            ->sum('total');
            $ttlAngsuran = AngsuranModel::where('user_id', auth()->user()->id)
            ->select(DB::raw('SUM(jml_angsuran) as ttl_angsuran'))
            ->value('ttl_angsuran');

            $shu = ShuModel::where('nik_ktp', auth()->user()->nik_ktp)->count();
            return view('anggota.v_home2', compact('ttlKredit','ttlAngsuran','simpanan','shu'));
        }else{
            $user = User::select(DB::raw('COUNT(CASE WHEN level = 2 THEN 1 END) AS anggota'),DB::raw('COUNT(CASE WHEN level <> 2 THEN 1 END) AS pengurus'))->get();
            $simpanan = SimpananModel::select(DB::raw('SUM(CASE WHEN stts = 1 THEN jml_simpanan ELSE 0 END) AS simpananMasuk'), DB::raw('SUM(CASE WHEN stts = 0 THEN jml_simpanan ELSE 0 END) AS simpananKeluar'))->get();
            $brg0 = DB::table('tb_kredit')
                ->whereMonth('tgl_kredit', '=', date('m'))
                ->whereYear('tgl_kredit', '=', date('Y'))
                ->where('app_ket',1)
                ->where('jns_krdt','BARANG')
                ->sum('nominal');
            $brg1 = DB::table('tb_kredit')
                ->whereMonth('tgl_kredit', '=', date('m', strtotime('first day of previous month')))
                ->whereYear('tgl_kredit', '=', date('Y',strtotime('first day of previous month')))
                ->where('app_ket',1)
                ->where('jns_krdt','BARANG')
                ->sum('nominal');
            
           
            $mtr0 = DB::table('tb_kredit')
                ->whereMonth('tgl_kredit', '=', date('m'))
                ->whereYear('tgl_kredit', '=', date('Y'))
                ->where('app_ket',1)
                ->where('jns_krdt','KENDARAAN')
                ->sum('nominal');
            $mtr1 = DB::table('tb_kredit')
                ->whereMonth('tgl_kredit', '=', date('m', strtotime('first day of previous month')))
                ->whereYear('tgl_kredit', '=', date('Y',strtotime('first day of previous month')))
                ->where('app_ket',1)
                ->where('jns_krdt','KENDARAAN')
                ->sum('nominal');
            $tn0 = DB::table('tb_kredit')
                ->whereMonth('tgl_kredit', '=', date('m'))
                ->whereYear('tgl_kredit', '=', date('Y'))
                ->where('app_ket',1)
                ->where('jns_krdt','TUNAI')
                ->sum('nominal');
            $tn1 = DB::table('tb_kredit')
                ->whereMonth('tgl_kredit', '=', date('m', strtotime('first day of previous month')))
                ->whereYear('tgl_kredit', '=', date('Y',strtotime('first day of previous month')))
                ->where('app_ket',1)
                ->where('jns_krdt','TUNAI')
                ->sum('nominal');
            $krdt0 = DB::table('tb_kredit')
                ->whereMonth('tgl_kredit', '=', date('m'))
                ->whereYear('tgl_kredit', '=', date('Y'))
                ->where('app_ket',1)
                ->sum('nominal');
            $krdt1 = DB::table('tb_kredit')
                ->whereMonth('tgl_kredit', '=', date('m', strtotime('first day of previous month')))
                ->whereYear('tgl_kredit', '=', date('Y',strtotime('first day of previous month')))
                ->where('app_ket',1)
                ->sum('nominal');
                $jumlahDataBarang = array();
                $jumlahDataMotor = array();
                $jumlahDataTunai = array();
                $bulanLabels = array();
                for ($i = 1; $i <= 12; $i++) {
                    $barang = DB::table('tb_kredit')
                                ->whereMonth('tgl_kredit', '=', $i)
                                ->where('jns_krdt','BARANG')
                                ->where('app_ket',1)
                                ->sum('nominal');
                    $motor = DB::table('tb_kredit')
                                ->whereMonth('tgl_kredit', '=', $i)
                                ->where('jns_krdt','KENDARAAN')
                                ->where('app_ket',1)
                                ->sum('nominal');
                    $tunai = DB::table('tb_kredit')
                                ->whereMonth('tgl_kredit', '=', $i)
                                ->where('jns_krdt','TUNAI')
                                ->where('app_ket',1)
                                ->sum('nominal');
                    array_push($jumlahDataBarang, $barang);
                    array_push($jumlahDataMotor, $motor);
                    array_push($jumlahDataTunai, $tunai);
                    array_push($bulanLabels, date("F", mktime(0, 0, 0, $i, 1)));
                }
            // dd($brg2);
            return view('v_home',compact('user','simpanan','brg0','brg1','mtr0','mtr1','tn0','tn1','krdt0','krdt1','jumlahDataBarang','jumlahDataMotor','jumlahDataTunai'));    
        }
    }

    public function markasread($id)
    {
        if($id)
        {
            auth()->user()->unreadNotifications->where('id',$id)->markAsRead();
        }
        return back();    
    }

    // public function statistik()
    // {
    //     $user = User::select(DB::raw('COUNT(CASE WHEN level = 2 THEN 1 END) AS anggota'),DB::raw('COUNT(CASE WHEN level <> 2 THEN 1 END) AS pengurus'))->get();
    //     $simpanan = SimpananModel::select(DB::raw('SUM(CASE WHEN stts = 1 THEN jml_simpanan ELSE 0 END) AS simpananMasuk'), DB::raw('SUM(CASE WHEN stts = 0 THEN jml_simpanan ELSE 0 END) AS simpananKeluar'))->get();
    //     $brg0 = DB::table('tb_kredit')
    //         ->whereMonth('tgl_kredit', '=', date('m'))
    //         ->whereYear('tgl_kredit', '=', date('Y'))
    //         ->where('app_ket',1)
    //         ->where('jns_krdt','BARANG')
    //         ->sum('nominal');
    //     $brg1 = DB::table('tb_kredit')
    //         ->whereMonth('tgl_kredit', '=', date('m', strtotime('first day of previous month')))
    //         ->whereYear('tgl_kredit', '=', date('Y',strtotime('first day of previous month')))
    //         ->where('app_ket',1)
    //         ->where('jns_krdt','BARANG')
    //         ->sum('nominal');
    //     $mtr0 = DB::table('tb_kredit')
    //         ->whereMonth('tgl_kredit', '=', date('m'))
    //         ->whereYear('tgl_kredit', '=', date('Y'))
    //         ->where('app_ket',1)
    //         ->where('jns_krdt','KENDARAAN')
    //         ->sum('nominal');
    //     $mtr1 = DB::table('tb_kredit')
    //         ->whereMonth('tgl_kredit', '=', date('m', strtotime('first day of previous month')))
    //         ->whereYear('tgl_kredit', '=', date('Y',strtotime('first day of previous month')))
    //         ->where('app_ket',1)
    //         ->where('jns_krdt','KENDARAAN')
    //         ->sum('nominal');
    //     $tn0 = DB::table('tb_kredit')
    //         ->whereMonth('tgl_kredit', '=', date('m'))
    //         ->whereYear('tgl_kredit', '=', date('Y'))
    //         ->where('app_ket',1)
    //         ->where('jns_krdt','TUNAI')
    //         ->sum('nominal');
    //     $tn1 = DB::table('tb_kredit')
    //         ->whereMonth('tgl_kredit', '=', date('m', strtotime('first day of previous month')))
    //         ->whereYear('tgl_kredit', '=', date('Y',strtotime('first day of previous month')))
    //         ->where('app_ket',1)
    //         ->where('jns_krdt','TUNAI')
    //         ->sum('nominal');
    //     $krdt0 = DB::table('tb_kredit')
    //         ->whereMonth('tgl_kredit', '=', date('m'))
    //         ->whereYear('tgl_kredit', '=', date('Y'))
    //         ->where('app_ket',1)
    //         ->sum('nominal');
    //     $krdt1 = DB::table('tb_kredit')
    //         ->whereMonth('tgl_kredit', '=', date('m', strtotime('first day of previous month')))
    //         ->whereYear('tgl_kredit', '=', date('Y',strtotime('first day of previous month')))
    //         ->where('app_ket',1)
    //         ->sum('nominal');
    //         $jumlahDataBarang = array();
    //         $jumlahDataMotor = array();
    //         $jumlahDataTunai = array();
    //         $bulanLabels = array();
    //         for ($i = 1; $i <= 12; $i++) {
    //             $barang = DB::table('tb_kredit')
    //                         ->whereMonth('tgl_kredit', '=', $i)
    //                         ->where('jns_krdt','BARANG')
    //                         ->where('app_ket',1)
    //                         ->sum('nominal');
    //             $motor = DB::table('tb_kredit')
    //                         ->whereMonth('tgl_kredit', '=', $i)
    //                         ->where('jns_krdt','KENDARAAN')
    //                         ->where('app_ket',1)
    //                         ->sum('nominal');
    //             $tunai = DB::table('tb_kredit')
    //                         ->whereMonth('tgl_kredit', '=', $i)
    //                         ->where('jns_krdt','TUNAI')
    //                         ->where('app_ket',1)
    //                         ->sum('nominal');
    //             array_push($jumlahDataBarang, $barang);
    //             array_push($jumlahDataMotor, $motor);
    //             array_push($jumlahDataTunai, $tunai);
    //             array_push($bulanLabels, date("F", mktime(0, 0, 0, $i, 1)));
    //         }
    //     // dd($jumlahDataPerBulan, $bulanLabels);
    //     return view('v_statistik', compact('user','simpanan','brg0','brg1','mtr0','mtr1','tn0','tn1','krdt0','krdt1','jumlahDataBarang','jumlahDataMotor','jumlahDataTunai'));    
    // }

    public function indexTutorial()
    {
        return view('anggota.v_tutorial');
    }

}
