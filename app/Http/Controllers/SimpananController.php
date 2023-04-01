<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SimpananModel;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\SimpananImport;

class SimpananController extends Controller
{
    public function __construct()
    {
        $this->SimpananModel = new SimpananModel();
        $this->middleware(['auth','verified']);
    }

    public function indexBendahara()
    {
        $users = User::leftJoin('tb_simpanan', 'users.nik_ktp','=','tb_simpanan.nik_ktp')
        ->select('users.nik_ktp as nikKtp','name','nik_kry','alamat',DB::raw('SUM(CASE WHEN stts = 1 THEN jml_simpanan ELSE 0 END) AS simpananMasuk'), DB::raw('SUM(CASE WHEN stts = 0 THEN jml_simpanan ELSE 0 END) AS simpananKeluar'))
        ->groupBy('nikKtp','name','nik_kry','alamat')
        ->where('level','<>', 1)
        ->orderBy('name','asc')
        ->get();
        // dd($users);
        return view('bendahara.v_simpanan', compact('users'));
    }
    public function simpananAnggota()
    {
        $simpanan = SimpananModel::where('nik_ktp', auth()->user()->nik_ktp)
        ->get();
        $saldo = User::where('users.nik_ktp', auth()->user()->nik_ktp)
        ->leftJoin('tb_simpanan', 'users.nik_ktp','=','tb_simpanan.nik_ktp')
        ->select('users.nik_ktp as nikKtp','name',DB::raw('SUM(CASE WHEN stts = 1 THEN jml_simpanan ELSE 0 END) AS simpananMasuk'), DB::raw('SUM(CASE WHEN stts = 0 THEN jml_simpanan ELSE 0 END) AS simpananKeluar'))
        ->groupBy('nikKtp','name',)
        ->get();
        return view('anggota.v_simpanan', compact('simpanan','saldo'));
    }

    public function simpananPetugas()
    {
        $simpanan = SimpananModel::where('nik_ktp', auth()->user()->nik_ktp)
        ->get();
        $saldo = User::where('users.nik_ktp', auth()->user()->nik_ktp)
        ->leftJoin('tb_simpanan', 'users.nik_ktp','=','tb_simpanan.nik_ktp')
        ->select('users.nik_ktp as nikKtp','name',DB::raw('SUM(CASE WHEN stts = 1 THEN jml_simpanan ELSE 0 END) AS simpananMasuk'), DB::raw('SUM(CASE WHEN stts = 0 THEN jml_simpanan ELSE 0 END) AS simpananKeluar'))
        ->groupBy('nikKtp','name',)
        ->get();
        return view('v_simpananSaya', compact('simpanan','saldo'));
    }

    public function detailSimpanan($nikKtp)
    {
        $users = User::where('nik_ktp', $nikKtp)->get();
        $simpanan = SimpananModel::where('nik_ktp', $nikKtp)
        ->get();
        $saldo = User::where('users.nik_ktp', $nikKtp)
        ->leftJoin('tb_simpanan', 'users.nik_ktp','=','tb_simpanan.nik_ktp')
        ->select('users.nik_ktp as nikKtp','name',DB::raw('SUM(CASE WHEN stts = 1 THEN jml_simpanan ELSE 0 END) AS simpananMasuk'), DB::raw('SUM(CASE WHEN stts = 0 THEN jml_simpanan ELSE 0 END) AS simpananKeluar'))
        ->groupBy('nikKtp','name',)
        ->get();

        // dd($saldo);
        return view('bendahara.v_detailSimpanan', compact('simpanan','users','saldo'));
    }

    public function editSimpanan($id_simpanan)
    {
        $simpanan = SimpananModel::where('id_simpanan', $id_simpanan)
        ->get();
        foreach($simpanan as $data)
        $users = User::where('nik_ktp', $data->nik_ktp)->get();
        // dd($users);
        return view('bendahara.v_editSimpanan', compact('simpanan','users'));
    }

    public function storeSimpanan(Request $request)
    {
        Request()->validate([
            'tgl_simpanan' => 'required',
            'nik_ktp' => 'required',
            'nama' => 'required',
            'jml_simpanan' => 'required',
            'stts' => 'required',
        ],[
            'tgl_simpanan.required' => 'Tanggal kosong',
            'nik_ktp.required' => 'No. KTP kosong',
            'nama.required' => 'Nama kosong',
            'jml_simpanan.required' => 'Nominal kosong',
            'stts.required' => 'Jenis transaksi kosong',
        ]);

        $nom = Request()->jml_simpanan;
        $pattern = '/[^\w\s]/u';
        $replacement = '';
        $nominal = preg_replace($pattern, $replacement, $nom);

        try {
            $simpanan = SimpananModel::create([
                'tgl_simpanan' => Request()->tgl_simpanan,
                'nama' => Request()->nama,
                'nik_ktp' => Request()->nik_ktp,
                'jml_simpanan' => $nominal,
                'stts' => Request()->stts,
                'ket' => Request()->ket,
            ]);
        // dd($simpanan);

            return redirect()->back()->with('sukses', 'Transaksi berhasil disimpan')->with('success','Berhasil');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error','Gagal disimpan')->with('gagal','Transaksi gagal disimpan');
        }

    }

    public function updateSimpanan(Request $request)
    {
        $request->validate([
            'tgl_simpanan' => 'required',
            'jml_simpanan' => 'required',
            'ket' => 'required',
        ],[
            'tgl_simpanan.required' => 'Tanggal tidak boleh kosong',
            'jml_simpanan.required' => 'Jumlah nominal tidak boleh kosong',
            'ket.required' => 'Keterangan wajib diisi',
        ]);

        $nik = Request()->nik_ktp;
        $simpanId = Request()->simpanan_id;
        $nom = Request()->jml_simpanan;
        $pattern = '/[^\w\s]/u';
        $replacement = '';
        $nominal = preg_replace($pattern, $replacement, $nom);

        try {
        
            $data = SimpananModel::where('id_simpanan', $simpanId)->update([
                'tgl_simpanan'=> Request()->tgl_simpanan,
                'jml_simpanan'=> $nominal,
                'stts'=> Request()->stts,
                'ket'=> Request()->ket,
            ]);

            // dd($data);
            // $this->SimpananModel->updateSimpanan($simpanId, $data); 
            return redirect('/bendahara/detail-simpanan-anggota/'.$nik)->with('sukses','Data berhasil diupdate')
            ->with('success','Berhasil');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error','Gagal')->with('gagal','Silahkan coba kembali');
        }
    }

    public function hapusSimpanan($id_simpanan)
    {
        try {
            $simpanan = SimpananModel::where('id_simpanan', $id_simpanan)
            ->delete();
            return redirect()->back()->with('sukses', 'Data berhasil dihapus')->with('success','Berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('gagal', 'Gagal hapus data')->with('error','Gagal');
        }
       
    }

    public function importSimpanan(Request $request)
    {

        try {
            $file = $request->file('file');
            $namaFile = date(date('d-m-Y')).$file->getClientOriginalName();
    
            Excel::import(new SimpananImport, $request->file('file')->store('FileImport'));
            $file->move('storage/FileImport', $namaFile);
            return redirect()->back()->with('sukses', 'Data berhasil diupload')->with('success','Berhasil');
        } catch (\Throwable $th) {
            return redirect()->back()->with('gagal', 'Gagal upload data')->with('error','Gagal');
        }
        
    }
}
