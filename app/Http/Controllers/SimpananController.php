<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SimpananModel;
use Illuminate\Support\Facades\DB;

class SimpananController extends Controller
{
    public function __construct()
    {
        $this->SimpananModel = new SimpananModel();
        $this->middleware(['auth','verified']);
    }

    public function simpananAnggota()
    {
        return view('anggota.v_simpanan');
    }
}
