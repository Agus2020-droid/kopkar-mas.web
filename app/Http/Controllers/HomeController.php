<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KreditModel;
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
            $ttlKredit = KreditModel::where('user_id',auth()->user()->id)
            ->sum('total');
            $ttlAngsuran = AngsuranModel::where('user_id', auth()->user()->id)
            ->select(DB::raw('SUM(jml_angsuran) as ttl_angsuran'))
            ->value('ttl_angsuran');
            return view('anggota.v_home2', compact('ttlKredit','ttlAngsuran'));
        }else{
            return view('v_home');
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

    public function statistik()
    {
        
        return view('v_statistik');    
    }

}
