<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\KreditModel;
use App\Models\AngsuranModel;
use Notification;
use App\Notifications\NotifikasiKredit;
use App\Notifications\UserNotification;
use Carbon\Carbon;

class KreditController extends Controller
{

    public function __construct()
    {
        $this->KreditModel = new KreditModel();
        $this->middleware(['auth','verified']);
    }

    public function indexBendahara()
    {
        $kredit = KreditModel::where('status', 4)
        ->leftJoin('users', 'tb_kredit.user_id','=','users.id')
        ->leftJoin('tb_angsuran', 'tb_kredit.kd_kredit','=','tb_angsuran.kredit_kd')
        ->orderBy('tgl_kredit', 'desc')
        ->select('tb_kredit.nama as nama','tb_kredit.id_kredit as id_kredit','tgl_kredit','jns_krdt','nominal','bunga','total','tb_kredit.kd_kredit as kode','tenor', DB::raw('SUM(jml_angsuran) AS jmlAngsuran'), DB::raw('COUNT(id_angsuran) AS countA'))
        ->groupBy('nama','id_kredit','tgl_kredit','kode','jns_krdt','nominal','bunga','total','tenor')
        ->get();
        // dd($kredit);
        return view('bendahara.v_kredit', compact('kredit'));
    }

    public function indexKetua()
    {
        $kredit = KreditModel::where('status', 4)
        ->leftJoin('tb_angsuran', 'tb_kredit.kd_kredit','=','tb_angsuran.kredit_kd')
        ->orderBy('tgl_kredit', 'desc')
        ->select('tb_kredit.nama as nama','tb_kredit.id_kredit as id_kredit','tgl_kredit','jns_krdt','nominal','bunga','total','tb_kredit.kd_kredit as kode','tenor', DB::raw('SUM(jml_angsuran) AS jmlAngsuran'), DB::raw('COUNT(id_angsuran) AS countA'))
        ->groupBy('nama','id_kredit','tgl_kredit','kode','jns_krdt','nominal','bunga','total','tenor')
        ->get();
        // dd($kredit);
        return view('ketua.v_kredit', compact('kredit'));
    }

    public function indexPetugas()
    {
        if(auth()->user()->level == 5)
        {
            $kredit = KreditModel::where('status', 4)
            ->where('jns_krdt', 'BARANG')
            ->leftJoin('users', 'tb_kredit.user_id','=','users.id')
            ->leftJoin('tb_angsuran', 'tb_kredit.kd_kredit','=','tb_angsuran.kredit_kd')
            ->orderBy('tgl_kredit', 'desc')
            ->select('tb_kredit.nama as nama','tb_kredit.id_kredit as id_kredit','tgl_kredit','jns_krdt','nominal','bunga','total','tb_kredit.kd_kredit as kode','tenor', DB::raw('SUM(jml_angsuran) AS jmlAngsuran'), DB::raw('COUNT(id_angsuran) AS countA'))
            ->groupBy('nama','id_kredit','tgl_kredit','kode','jns_krdt','nominal','bunga','total','tenor')
            ->get();
            // dd($kredit);
            return view('pb.v_kredit', compact('kredit'));
        }elseif(auth()->user()->level == 6)
        {
            $kredit = KreditModel::where('status', 4)
            ->where('jns_krdt', 'KENDARAAN')
            ->leftJoin('users', 'tb_kredit.user_id','=','users.id')
            ->leftJoin('tb_angsuran', 'tb_kredit.kd_kredit','=','tb_angsuran.kredit_kd')
            ->orderBy('tgl_kredit', 'desc')
            ->select('tb_kredit.nama as nama','tb_kredit.id_kredit as id_kredit','tgl_kredit','jns_krdt','nominal','bunga','total','tb_kredit.kd_kredit as kode','tenor', DB::raw('SUM(jml_angsuran) AS jmlAngsuran'), DB::raw('COUNT(id_angsuran) AS countA'))
            ->groupBy('nama','id_kredit','tgl_kredit','kode','jns_krdt','nominal','bunga','total','tenor')
            ->get();
            // dd($kredit);
            return view('pm.v_kredit', compact('kredit'));
        }elseif(auth()->user()->level == 7)
        {
            $kredit = KreditModel::where('status', 4)
            ->where('jns_krdt', 'TUNAI')
            ->leftJoin('users', 'tb_kredit.user_id','=','users.id')
            ->leftJoin('tb_angsuran', 'tb_kredit.kd_kredit','=','tb_angsuran.kredit_kd')
            ->orderBy('tgl_kredit', 'desc')
            ->select('tb_kredit.nama as nama','tb_kredit.id_kredit as id_kredit','tgl_kredit','jns_krdt','nominal','bunga','total','tb_kredit.kd_kredit as kode','tenor', DB::raw('SUM(jml_angsuran) AS jmlAngsuran'), DB::raw('COUNT(id_angsuran) AS countA'))
            ->groupBy('nama','id_kredit','tgl_kredit','kode','jns_krdt','nominal','bunga','total','tenor')
            ->get();
            // dd($kredit);
            return view('pt.v_kredit', compact('kredit'));
        }
    }
    public function indexPengajuanBendahara()
    {
        $kredit = KreditModel::where('status','<', 4)
        ->leftJoin('users', 'tb_kredit.user_id','=','users.id')
        ->orderBy('tgl_kredit', 'desc')
        ->get();
        // dd($kredit);
        return view('bendahara.v_Pengajuankredit', compact('kredit'));
    }

    public function indexPengajuanKetua()
    {
        $kredit = KreditModel::where('status','<', 4)
        ->leftJoin('users', 'tb_kredit.user_id','=','users.id')
        ->orderBy('tgl_kredit', 'desc')
        ->get();
        // dd($kredit);
        return view('ketua.v_Pengajuankredit', compact('kredit'));
    }

    public function indexPengajuanPetugas()
    {
        $user = User::where('level','<>',1)
        ->get();

        if(auth()->user()->level == 5)
        {
            $kredit = KreditModel::where('status','<', 4)
            ->where('jns_krdt', 'BARANG')
            ->leftJoin('users', 'tb_kredit.user_id','=','users.id')
            ->orderBy('tgl_kredit', 'desc')
            ->get();
            // dd($user);
            return view('pb.v_Pengajuankredit', compact('kredit','user'));
        }elseif(auth()->user()->level == 6)
        {
            $kredit = KreditModel::where('status','<', 4)
            ->where('jns_krdt', 'KENDARAAN')
            ->leftJoin('users', 'tb_kredit.user_id','=','users.id')
            ->orderBy('tgl_kredit', 'desc')
            ->get();
            // dd($kredit);
            return view('pm.v_Pengajuankredit', compact('kredit','user'));
        }elseif(auth()->user()->level == 7)
        {
            $kredit = KreditModel::where('status','<', 4)
            ->where('jns_krdt', 'TUNAI')
            ->leftJoin('users', 'tb_kredit.user_id','=','users.id')
            ->orderBy('tgl_kredit', 'desc')
            ->get();
            // dd($kredit);
            return view('pt.v_Pengajuankredit', compact('kredit','user'));
        }
    }



    public function kreditAnggota() {

        $kredit = KreditModel::where('tb_kredit.user_id', auth()->user()->id)
        ->leftJoin('tb_angsuran', 'tb_kredit.kd_kredit','=','tb_angsuran.kredit_kd')
        ->orderBy('tgl_kredit', 'desc')
        ->select('status','app_ptgs','app_bnd','app_ket','angsuran','tb_kredit.nama as nama','tb_kredit.id_kredit as id_kredit','tgl_kredit','jns_krdt','nominal','bunga','total','tb_kredit.kd_kredit as kd_kredit','tenor', DB::raw('SUM(jml_angsuran) AS jmlAngsuran'), DB::raw('COUNT(id_angsuran) AS countA'))
        ->groupBy('status','app_ptgs','app_bnd','app_ket','angsuran','nama','id_kredit','tgl_kredit','kd_kredit','jns_krdt','nominal','bunga','total','tenor')
        ->get();
        $ttlKredit = KreditModel::where('user_id',auth()->user()->id)
        ->sum('total');
        $ttlAngsuran = AngsuranModel::where('user_id', auth()->user()->id)
        ->select(DB::raw('SUM(jml_angsuran) as ttl_angsuran'))
        ->value('ttl_angsuran');
        // dd($ttlAngsuran);
        return view('anggota.v_kredit', compact('kredit','ttlKredit','ttlAngsuran'));
    }

    public function kreditPetugas() {

        $kredit = KreditModel::where('tb_kredit.user_id', auth()->user()->id)
        ->leftJoin('tb_angsuran', 'tb_kredit.kd_kredit','=','tb_angsuran.kredit_kd')
        ->orderBy('tgl_kredit', 'desc')
        ->select('status','app_ptgs','app_bnd','app_ket','angsuran','tb_kredit.nama as nama','tb_kredit.id_kredit as id_kredit','tgl_kredit','jns_krdt','nominal','bunga','total','tb_kredit.kd_kredit as kd_kredit','tenor', DB::raw('SUM(jml_angsuran) AS jmlAngsuran'), DB::raw('COUNT(id_angsuran) AS countA'))
        ->groupBy('status','app_ptgs','app_bnd','app_ket','angsuran','nama','id_kredit','tgl_kredit','kd_kredit','jns_krdt','nominal','bunga','total','tenor')
        ->get();
        $ttlKredit = KreditModel::where('user_id',auth()->user()->id)
        ->sum('total');
        $ttlAngsuran = AngsuranModel::where('user_id', auth()->user()->id)
        ->select(DB::raw('SUM(jml_angsuran) as ttl_angsuran'))
        ->value('ttl_angsuran');
        // dd($kredit);
        return view('v_kreditSaya', compact('kredit','ttlKredit','ttlAngsuran'));
    }

    public function detailKreditAnggota($id_kredit)
    {
        $kredit = KreditModel::where('id_kredit',$id_kredit)

        ->get();
        foreach($kredit as $data)
        $kode = $data->kd_kredit;
        

        $angsuran = AngsuranModel::where('kredit_kd', $kode)->get();
        $ttlKredit = KreditModel::where('id_kredit',$id_kredit)->value('total');
        $ttlAngsuran = AngsuranModel::where('kredit_kd', $kode)
        ->select(DB::raw('SUM(jml_angsuran) as ttl_angsuran'))
        ->get();
        $val =  KreditModel::where('id_kredit',$id_kredit)
        ->value('app_ket');
       
      
        // dd($ttlKredit);
        if($val == 1){
        return view('anggota.v_detailKredit', compact('kredit','angsuran','ttlAngsuran','ttlKredit'));
        }else{
        return redirect()->back()->with('error','Approval not complete');
        }
    }

    public function detailKreditSaya($id_kredit)
    {
        $kredit = KreditModel::where('id_kredit',$id_kredit)
        ->get();

        foreach($kredit as $data)
        $kode = $data->kd_kredit;

        $angsuran = AngsuranModel::where('kredit_kd', $kode)->get();
        $ttlKredit = KreditModel::where('id_kredit',$id_kredit)->value('total');
        $ttlAngsuran = AngsuranModel::where('kredit_kd', $kode)
        ->select(DB::raw('SUM(jml_angsuran) as ttl_angsuran'))
        ->get();
        $val =  KreditModel::where('id_kredit',$id_kredit)
        ->value('app_ket');
        // dd($angsuran);
        if($val == 1){
        return view('v_detailKreditSaya', compact('kredit','angsuran','ttlAngsuran','ttlKredit'));
        }else{
        return redirect()->back()->with('error','Approval not complete');
        }
    }

    public function cetakKredit()
    {
        return view('anggota.v_cetakDetailKredit');
    }

    public function simpanKredit(Request $request)
    {
        $userEmail = User::where('id', auth()->user()->id)->get();

        $j = Request()->jns_krdt;
        $nm = auth()->user()->name;
        $plafons = Request()->plafon;
        $pattern = '/[^\w\s]/u';
        $replacement = '';
        $nominal = preg_replace($pattern, $replacement, $plafons);
        $tenor = Request()->tenor;
        $idUser = Request()->user_id;
        

        if($j == 'BARANG' && $tenor <= 6)
        {
            $bunga = 0.1/$tenor;
        }else if($j == 'BARANG' && $tenor > 6)
        {
            $bunga = 0.01;
        }else if($j == 'KENDARAAN')
        {
            $bunga = 0.01;
        }else if($j == 'TUNAI')
        {
            $bunga = 0;
        }
        
        $total = round(($nominal*$bunga)+$nominal);
        $angsuran = round($total/$tenor);

        try {
            if($j == 'BARANG')
            {
                $validasi = $request->validate([
                    'nm_brg' => 'required',
                    'jml_brng' => 'required',
                    'spek' => 'required',
                    'beli_oleh' => 'required',
                ]);
                

            }else if($j == 'KENDARAAN')
            {
                $validasi = $request->validate([
                    'nm_kendaraan' => 'required',
                    'kondisi' => 'required',
                    'jml_unit' => 'required',
                    'spek' => 'required',
                    'beli_oleh' => 'required',
                ]);
                // $user = User::whereIn('level',[3,4,6])->get();
                // $request = 'Pengajuan kredit kendaraan';
            }else if($j == 'TUNAI')
            {
                $validasi = $request->validate([
                    'keperluan' => 'required',
                ]);
                // $user = User::whereIn('level',[3,4,7])->get();
                // $request = 'Pengajuan kredit tunai';
            }
            
            $data = [
                'title'=>'Notifikasi Pengajuan Kredit',
                'to'=>'Kepada Yth. Sdr/i'.' '.$nm.' '.'',
                'body'=>'',
                'body1'=>'Salam Sejahtera,',
                'body2'=>'Pengajuan Kredit'.' '.$j.' '.'Anda pada '.''.Carbon::parse(now())->isoFormat('dddd, DD MMMM Y HH:mm').'',
                'isi'=>'Telah berhasil dibuat. Mohon menunggu konfirmasi dari petugas KOPERASI KARYAWAN MAKMUR ALAM SEJAHTERA',
                'body3'=>'',
            ];

            if($j == 'BARANG')
            {
                $user = User::whereIn('level',[3,4,5])->get();
                $notifikasi = [
                    'notif'=>'Pengajuan Kredit Barang',
                ];
            }else if($j == 'KENDARAAN')
            {
                $user = User::whereIn('level',[3,4,6])->get();
                $notifikasi = [
                    'notif'=>'Pengajuan Kredit Kendaraan',
                ];
            }else if($j == 'TUNAI')
            {
                $user = User::whereIn('level',[3,4,7])->get();
                $notifikasi = [
                    'notif'=>'Pengajuan Kredit Tunai',
                ];
            }


            $huruf = 'KR';
            $id = KreditModel::orderBy('id_kredit', 'desc')->value('id_kredit');
            $nextId = $id+1;
            $kode_barang = $huruf . sprintf('%03d', $nextId);
            // dd($kode_barang);

            $kredit = KreditModel::create([
                'kd_kredit' => $kode_barang,
                'tgl_kredit' => now(),
                'user_id' => $idUser,
                'nama' => Request()->nama,
                'nik_ktp' => Request()->nik_ktp,
                'jns_krdt' => $j,
                'nm_brg' => Request()->nm_brg,
                'jml_brng' => Request()->jml_brng,
                'nm_kendaraan' => Request()->nm_kendaraan,
                'kondisi' => Request()->kondisi,
                'jml_unit' => Request()->jml_unit,
                'spek' => Request()->spek,
                'beli_oleh' => Request()->beli_oleh,
                'keperluan' => Request()->keperluan,
                'nominal' => $nominal,
                'total' => $total,
                'tenor' => $tenor,
                'bunga' => $bunga,
                'angsuran' => $angsuran,
            ]);

            $statusUser = User::where('id', $idUser)->update(['status_user' => '0']);
            
            Notification::send($user, new UserNotification($notifikasi));
            Notification::send($userEmail, new NotifikasiKredit($data));
            return redirect()->back()->with('sukses','Pengajuan berhasil dibuat, Mohon tunggu verifikasi dari petugas koperasi.')
            ->with('success','Berhasil');
        } catch (\Throwable $th) {
            return redirect()->back()->with('gagal','GAGAL. Silahkan coba lagi ')
            ->with('error','Gagal');
        }
        // dd($angsuran);
    }


    public function approval($id_kredit)
    {
        $kredit = KreditModel::where('id_kredit', $id_kredit)
        ->leftJoin('users','tb_kredit.user_id','=','users.id')
        ->get();
        // dd($kredit);
        if(auth()->user()->level == 3)
        {
            return view('bendahara.v_approvalPengajuanKredit', compact('kredit'));
        }else if(auth()->user()->level == 4)
        {
            return view('ketua.v_approvalPengajuanKredit', compact('kredit'));
        }else if(auth()->user()->level == 5)
        {
            return view('pb.v_approvalPengajuanKredit', compact('kredit'));
        }else if(auth()->user()->level == 6)
        {
            return view('pm.v_approvalPengajuanKredit', compact('kredit'));
        }else if(auth()->user()->level == 7)
        {
            return view('pt.v_approvalPengajuanKredit', compact('kredit'));
        }else{
            return redirect()->back()->with('error','Access denied');
        }
    }

    public function updateKreditPetugas(Request $request)
    {
        $id = Request()->kredit_id;
        $nom = Request()->nominal;
        $pattern = '/[^\w\s]/u';
        $replacement = '';
        $nominals = preg_replace($pattern, $replacement, $nom);
        $app = Request()->app_ptgs;
        $j = Request()->jns_krdt;
        $kd = Request()->kd_kredit;
        $tgl = Request()->tgl_kredit;
        $nm = Request()->nama;
        $id_user = Request()->user_id;
        try {

            if($app == '1')
            {
                $notifikasi = [
                    'notif'=>'Pengajuan Kredit '.' '.$nm.' '.' disetujui',
                ];
                $data = [
                    'title'=>'Re : Notifikasi Pengajuan Kredit',
                    'to'=>'Kepada Yth. Sdr/i'.' '.$nm.' '.'',
                    'body'=>'',
                    'body1'=>'Salam Sejahtera,',
                    'body2'=>'Pengajuan Kredit'.' '.$j.''.'Anda dengan KODE '.' '.$kd.' '.'pada '.''.Carbon::parse($tgl)->isoFormat('dddd, DD MMMM Y HH:mm').'',
                    'isi'=>'Telah DI SETUJUI oleh petugas koperasi. Selanjutnya mohon tunggu verifikasi dari Bendahara Koperasi.',
                    'body3'=>'',
                ];
            }else if ($app == '2')
            {
                $notifikasi = [
                    'notif'=>'Pengajuan Kredit '.' '.$nm.' '.' di tolak',
                ];
                $data = [
                    'title'=>'Re : Notifikasi Pengajuan Kredit',
                    'to'=>'Kepada Yth. Sdr/i'.' '.$nm.' '.'',
                    'body'=>'',
                    'body1'=>'Salam Sejahtera,',
                    'body2'=>'Kami mohon maaf pengajuan Kredit'.' '.$j.''.' Anda dengan KODE '.' '.$kd.' '.'pada '.''.Carbon::parse($tgl)->isoFormat('dddd, DD MMMM Y HH:mm').'',
                    'isi'=>'Telah DI TOLAK oleh petugas koperasi.',
                    'body3'=>'',
                ];
            }

            $user = User::where('id', $id_user)->orWhereIn('level', [3,4])->get();
            $userEmail = User::where('id', $id_user)->get();
            $kredit = KreditModel::where('id_kredit', $id)
            ->update([
                'nominal' => $nominals,
                'tenor'=> Request()->tenor,
                'bunga'=> Request()->bunga,
                'angsuran'=> Request()->angsuran,
                'total'=> Request()->total,
                'tempo'=> Request()->tempo,
                'tgl_ptgs'=> now(),
                'nm_ptgs'=> auth()->user()->name,
                'app_ptgs'=> $app,
            ]);
            // dd($user);
            Notification::send($user, new UserNotification($notifikasi));
            Notification::send($userEmail, new NotifikasiKredit($data));
            if(auth()->user()->level == 5)
            {
                return redirect('/petugas-barang/pengajuan-kredit-anggota')->with('sukses','Data berhasil di update')
                ->with('success','Berhasil');
            }else if(auth()->user()->level == 6)
            {
                return redirect('/petugas-motor/pengajuan-kredit-anggota')->with('sukses','Data berhasil di update')
                ->with('success','Berhasil');
            }else if(auth()->user()->level == 7)
            {
                return redirect('/petugas-tunai/pengajuan-kredit-anggota')->with('sukses','Data berhasil di update')
                ->with('success','Berhasil');
            }

        } catch (\Throwable $th) {
            return redirect()->back()->with('gagal','GAGAL. Silahkan coba lagi ')
            ->with('error','Gagal');

        }
    }

    public function updateKreditBendahara(Request $request)
    {
        $id = Request()->kredit_id;
        $nom = Request()->nominal;
        $pattern = '/[^\w\s]/u';
        $replacement = '';
        $nominals = preg_replace($pattern, $replacement, $nom);
        $app = Request()->app_bnd;
        $j = Request()->jns_krdt;
        $kd = Request()->kd_kredit;
        $tgl = Request()->tgl_kredit;
        $nm = Request()->nama;
        $id_user = Request()->user_id;
        try {

            if($app == '1')
            {
                $notifikasi = [
                    'notif'=>'Pengajuan Kredit '.' '.$nm.' '.' disetujui',
                ];
                $data = [
                    'title'=>'Re : Notifikasi Pengajuan Kredit',
                    'to'=>'Kepada Yth. Sdr/i'.' '.$nm.' '.'',
                    'body'=>'',
                    'body1'=>'Salam Sejahtera,',
                    'body2'=>'Pengajuan Kredit'.' '.$j.''.' Anda dengan KODE '.' '.$kd.' '.'pada '.''.Carbon::parse($tgl)->isoFormat('dddd, DD MMMM Y HH:mm').'',
                    'isi'=>'Telah DI SETUJUI oleh Bendahara Koperasi. Selanjutnya mohon tunggu verifikasi oleh Ketua Koperasi.',
                    'body3'=>'',
                ];
            }else if ($app == '2')
            {
                $notifikasi = [
                    'notif'=>'Pengajuan Kredit '.' '.$nm.' '.' di tolak',
                ];
                $data = [
                    'title'=>'Re : Notifikasi Pengajuan Kredit',
                    'to'=>'Kepada Yth. Sdr/i'.' '.$nm.' '.'',
                    'body'=>'',
                    'body1'=>'Salam Sejahtera,',
                    'body2'=>'Kami mohon maaf pengajuan Kredit'.' '.$j.''.' Anda dengan KODE '.' '.$kd.' '.'pada '.''.Carbon::parse($tgl)->isoFormat('dddd, DD MMMM Y HH:mm').'',
                    'isi'=>'Telah DI TOLAK oleh Bendahara koperasi.',
                    'body3'=>'',
                ];
            }
            // notifikasi user
            if($j == 'BARANG')
            {
                $user = User::where('id', $id_user)->orWhereIn('level', [4,5])->get();
            }else if($j == 'KENDARAAN')
            {
                $user = User::where('id', $id_user)->orWhereIn('level', [4,6])->get();
            }else if($j == 'TUNAI')
            {
                $user = User::where('id', $id_user)->orWhereIn('level', [4,7])->get();
            }
            $userEmail = User::where('id', $id_user)->get();
            $kredit = KreditModel::where('id_kredit', $id)
            ->update([
                'nominal' => $nominals,
                'tenor'=> Request()->tenor,
                'bunga'=> Request()->bunga,
                'angsuran'=> Request()->angsuran,
                'total'=> Request()->total,
                'tempo'=> Request()->tempo,
                'tgl_bnd'=> now(),
                'nm_bnd'=> auth()->user()->name,
                'app_bnd'=> $app,
            ]);
            // dd($user);
            Notification::send($user, new UserNotification($notifikasi));
            Notification::send($userEmail, new NotifikasiKredit($data));
            return redirect('/bendahara/pengajuan-kredit-anggota')->with('sukses','Data berhasil di update')
            ->with('success','Berhasil');
        } catch (\Throwable $th) {
            return redirect()->back()->with('gagal','GAGAL. Silahkan coba lagi ')
            ->with('error','Gagal');

        }
    }

    public function updateKreditKetua(Request $request)
    {
        $id = Request()->kredit_id;
        $nom = Request()->nominal;
        $pattern = '/[^\w\s]/u';
        $replacement = '';
        $nominals = preg_replace($pattern, $replacement, $nom);
        $app = Request()->app_ket;
        $j = Request()->jns_krdt;
        $kd = Request()->kd_kredit;
        $tgl = Request()->tgl_kredit;
        $nm = Request()->nama;
        $id_user = Request()->user_id;
        try {

            if($app == '1')
            {
                $notifikasi = [
                    'notif'=>'Pengajuan Kredit '.' '.$nm.' '.' disetujui',
                ];
                $data = [
                    'title'=>'Re : Notifikasi Pengajuan Kredit',
                    'to'=>'Kepada Yth. Sdr/i'.' '.$nm.' '.'',
                    'body'=>'',
                    'body1'=>'Salam Sejahtera,',
                    'body2'=>'Pengajuan Kredit'.' '.$j.''.' Anda dengan KODE '.' '.$kd.' '.'pada '.''.Carbon::parse($tgl)->isoFormat('dddd, DD MMMM Y HH:mm').'',
                    'isi'=>'Telah DI SETUJUI oleh Ketua Koperasi.',
                    'body3'=>'',
                ];
            }else if ($app == '2')
            {
                $notifikasi = [
                    'notif'=>'Pengajuan Kredit '.' '.$nm.' '.' di tolak',
                ];
                $data = [
                    'title'=>'Re : Notifikasi Pengajuan Kredit',
                    'to'=>'Kepada Yth. Sdr/i'.' '.$nm.' '.'',
                    'body'=>'',
                    'body1'=>'Salam Sejahtera,',
                    'body2'=>'Kami mohon maaf pengajuan Kredit'.' '.$j.''.' Anda dengan KODE '.' '.$kd.' '.'pada '.''.Carbon::parse($tgl)->isoFormat('dddd, DD MMMM Y HH:mm').'',
                    'isi'=>'Telah DI TOLAK oleh Ketua koperasi.',
                    'body3'=>'',
                ];
            }
            // notifikasi user
            if($j == 'BARANG')
            {
                $user = User::where('id', $id_user)->orWhereIn('level', [3,5])->get();
            }else if($j == 'KENDARAAN')
            {
                $user = User::where('id', $id_user)->orWhereIn('level', [3,6])->get();
            }else if($j == 'TUNAI')
            {
                $user = User::where('id', $id_user)->orWhereIn('level', [3,7])->get();
            }
            $userEmail = User::where('id', $id_user)->get();
            $kredit = KreditModel::where('id_kredit', $id)
            ->update([
                'nominal' => $nominals,
                'tenor'=> Request()->tenor,
                'bunga'=> Request()->bunga,
                'angsuran'=> Request()->angsuran,
                'total'=> Request()->total,
                'tempo'=> Request()->tempo,
                'tgl_ket'=> now(),
                'nm_ket'=> auth()->user()->name,
                'app_ket'=> $app,
                'status'=> '1',
            ]);
            // dd($user);
            Notification::send($user, new UserNotification($notifikasi));
            Notification::send($userEmail, new NotifikasiKredit($data));
            return redirect('/ketua/pengajuan-kredit-anggota')->with('sukses','Data berhasil di update')
            ->with('success','Berhasil');
        } catch (\Throwable $th) {
            return redirect()->back()->with('gagal','GAGAL. Silahkan coba lagi ')
            ->with('error','Gagal');

        }
    }

    public function detailKredit($id_kredit)
    {
        
        $kredit = KreditModel::where('id_kredit',$id_kredit)
        ->leftJoin('users','tb_kredit.user_id','=','users.id')
        ->get();
        // dd($kredit);
        foreach ($kredit as $data)
            if($data->app_ket ==  null)
            {
                return back()->with('warning','Disposisi belum lengkap');
            }elseif($data->app_ket == 1)
            {
                if(auth()->user()->level == 4)
                {
                    return view('ketua.v_detailKredit',compact('kredit'));
                }elseif(auth()->user()->level == 5)
                {
                    return view('pb.v_detailKredit',compact('kredit'));
                }elseif(auth()->user()->level == 6)
                {
                    return view('pm.v_detailKredit',compact('kredit'));
                }elseif(auth()->user()->level == 7)
                {
                    return view('pt.v_detailKredit',compact('kredit'));
                }
            }else
            {
                return back()->with('error','Pengajuan tidak disetujui');
            }
    }

    public function updateStatusKredit(Request $request)
    {
        try {
            $idKredit = Request()->kredit_id;
            $kredit = KreditModel::where('id_kredit', $idKredit)
            ->update([
                'status' => Request()->status,
            ]);
            // dd($request->all());
            return back()->with('success','Berhasil di update')->with('sukses','Transaksi sukses');
        } catch (\Throwable $th) {
            return back()->with('error','Berhasil di update')->with('gagal','Silahkan coba kembali');

        }

    }

    public function cetakAkadBarang($id_kredit)
    {
        $kredit = KreditModel::where('id_kredit', $id_kredit)
        ->leftJoin('users','tb_kredit.nik_ktp','=','users.nik_ktp')
        ->get();
        $ketua = User::where('level',4)
        ->get();
        $bendahara = User::where('level',3)
        ->value('name');
        return view('v_cetakAkadBarang', compact('kredit','ketua','bendahara'));
    }

    public function cetakAkadMotor($id_kredit)
    {
        $kredit = KreditModel::where('id_kredit', $id_kredit)
        ->leftJoin('users','tb_kredit.nik_ktp','=','users.nik_ktp')
        ->get();

        $ketua = User::where('level',4)
        ->get();
        $bendahara = User::where('level',3)
        ->value('name');
        // dd($kredit);
        return view('v_cetakAkadMotor', compact('kredit','ketua','bendahara'));
    }

    public function aksesUser()
    {
        return view ('ketua.v_aksesUser');
    }
}
