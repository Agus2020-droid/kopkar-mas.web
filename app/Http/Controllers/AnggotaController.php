<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function index() {
        return view('v_anggota');
    }

    public function profileAnggota() {
        return view('Anggota.v_profile');
    }
}
