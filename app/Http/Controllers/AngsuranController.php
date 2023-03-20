<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AngsuranModel;
use App\Models\KreditModel;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Notification;
use App\Notifications\NotifikasiKredit;
use App\Notifications\UserNotification;
use Illuminate\Support\Facades\DB;

class AngsuranController extends Controller
{
    public function __construct()
    {
        $this->AngsuranModel = new AngsuranModel();
        $this->middleware(['auth','verified']);
    }

    public function tambahAngsuran($id_kredit)
    {
        $kredit = KreditModel::where('id_kredit',$id_kredit)

        ->get();
        foreach($kredit as $data)
        $kode = $data->kd_kredit;

        $kredit = KreditModel::where('id_kredit', $id_kredit)->get();
        $ttlKredit = KreditModel::where('id_kredit',$id_kredit)->value('total');
        $ttlAngsuran = AngsuranModel::where('kredit_kd', $kode)
        ->select(DB::raw('SUM(jml_angsuran) as ttl_angsuran'))
        ->value('ttl_angsuran');
        // dd($ttlAngsuran);
        return view('bendahara.v_tambahAngsuran', compact('kredit','ttlKredit','ttlAngsuran'));
    }

    public function storeAngsuran(Request $request)
    { 
        $kdKredit = Request()->kredit_kd;
        $idUser = Request()->user_id;
        $userEmail = User::where('id', $idUser)->get();
        $user = User::whereIn('id',[$idUser])->get();

        $ttlK = Request()->ttl_kredit;
        $ttlA = Request()->ttl_angsuran;
        $sisa = $ttlK-$ttlA;

        $nm = Request()->nama;
        $ang = Request()->jml_angsuran;
        $tglAngsuran = Request()->tgl_angsuran;
        $mtde = Request()->metode;
        $pattern = '/[^\w\s]/u';
        $replacement = '';
        $jmlAngsur = preg_replace($pattern, $replacement, $ang);
        $token = Str::random(12);

        $notifikasi = [
            'notif'=>'Pembayaran Kredit No. '.' '.$kdKredit.' '.' Sukses',
        ];
        $data = [
            'title'=>'Pembayaran Angsuran Kredit',
            'to'=>'Kepada Yth. Sdr/i'.' '.$nm.' '.'',
            'body'=>'',
            'body1'=>'',
            'body2'=>'Pembayaran Kredit Anda Nomor : '.' '.$kdKredit.' '.' telah diterima oleh bendahara koperasi pada '.''.Carbon::parse($tglAngsuran)->isoFormat('dddd, DD MMMM Y').' ',
            'isi'=>'No Referensi : '.''.$token.'',
            'body3'=>'',
        ];
        // dd($jmlAngsur);

        try {
            if($jmlAngsur>$sisa)
            {
                return redirect()->back()->with('gagal','Nilai yang dimasukan tidak boleh melebihi sisa angsuran')
                ->with('error','Gagal');
            }else{
                $angsuran = AngsuranModel::create([
                    'kredit_kd' => $kdKredit,
                    'user_id' => $idUser,
                    'nama' => $nm,
                    'tgl_angsuran' => $tglAngsuran,
                    'jml_angsuran' => $jmlAngsur,
                    'noref' => $token,
                    'metode' => $mtde,
                ]);
        
                Notification::send($user, new UserNotification($notifikasi));
                Notification::send($userEmail, new NotifikasiKredit($data));
                return redirect('/bendahara/kredit-anggota')->with('sukses','Transaksi pembayaran kredit nomor '.''.$kdKredit.''.' berhasil di simpan')
                ->with('success','Sukses');
            }
            
        } catch (\Throwable $th) {
            return redirect()->back()->with('gagal','Transaksi gagal di simpan')
            ->with('error','Gagal');
        }

        

    }
}
