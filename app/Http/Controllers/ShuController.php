<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShuModel;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ShuImport;
use Dompdf\Dompdf;
use Dompdf\Options;
class ShuController extends Controller
{
    public function __construct()
    {
        $this->ShuModel = new ShuModel();
        $this->middleware(['auth','verified']);
    }

    public function indexBendahara()
    {
        $shu = ShuModel::select('thn_buku',DB::raw('SUM(jml_shu) as total'))->groupBy('thn_buku')->get();
        // dd($shu);
        return view('bendahara.v_shu', compact('shu'));
    }

    public function importShu(Request $request)
    {
        try {
            $file = $request->file('file');
            $namaFile = date(date('d-m-Y')).$file->getClientOriginalName();
    
            Excel::import(new ShuImport, $request->file('file')->store('FileImport'));
            $file->move('storage/FileImport', $namaFile);
            return redirect()->back()->with('sukses', 'Data berhasil diupload')->with('success','Berhasil');
        } catch (\Throwable $th) {
            return redirect()->back()->with('gagal', 'Gagal upload data')->with('error','Gagal');
        }
    }

    public function listThn($thn_buku)
    {
        
        $shu = ShuModel::where('thn_buku', $thn_buku)
        ->get();
        // dd($thn_buku);
        return view('bendahara.v_listShu', compact('shu','thn_buku'));
    }

    public function detailShu($id_shu)
    {
        
        $shu = ShuModel::where('id_shu', $id_shu)
        ->get();
        // dd($shu);
        return view('bendahara.v_detailShu', compact('shu'));
    }

    public function updateShu(Request $request)
    {
        $id_shu = Request()->shu_id;
        $pk = Request()->peran_krdt;
        $pp = Request()->peran_peng;

        $pattern = '/[^\w\s]/u';
        $replacement = '';
        $pk1 = preg_replace($pattern, $replacement, $pk);
        $pp1 = preg_replace($pattern, $replacement, $pp);

        $jml = $pk1+$pp1;

        try {
            $shu = ShuModel::where('id_shu', $id_shu)
            ->update([
                'tgl_shu' => Request()->tgl_shu,
                'nm_bank'=> Request()->nm_bank,
                'no_rek'=> Request()->no_rek,
                'peran_krdt'=> $pk1,
                'peran_peng'=> $pp1,
                'jml_shu'=> $jml,
            ]);
    
            // dd($jml);
            return redirect()->back()->with('sukses', 'Data berhasil di update')->with('success','Berhasil');
        } catch (\Throwable $th) {
            return redirect()->back()->with('gagal', 'Gagal update data')->with('error','Gagal');

        }
    }

    public function shuSaya($nik_ktp)
    {
        $shu = ShuModel::where('nik_ktp', $nik_ktp)->get();
        // dd($shu);
        if(auth()->user()->level == 2)
        {
            return view('anggota.v_shu', compact('shu'));
        }else{
            return view('v_shuPengurus', compact('shu'));
        }
    }

    public function downloadSlip($id_shu)

    {
        $path = base_path('/public/logo-min.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $pict = 'data:image/' . $type . ';base64,' . base64_encode($data);
        $shu = ShuModel::where('id_shu', $id_shu)->get();
        $html = view('v_slipShu', compact('shu','pict'));
        


        $options = new Options();
        $options->set('defaultFont', 'Courier');
        $options->set('chroot', realpath(''));
        $card = new Dompdf($options);

        $card->loadHtml($html);
        $card->setPaper('A4', 'portrait');
        $card->render();
        $card->stream();
    }

}
