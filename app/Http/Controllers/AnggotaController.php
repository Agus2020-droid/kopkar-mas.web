<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
