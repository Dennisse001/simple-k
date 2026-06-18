<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penduduk;
use App\Models\User;
use App\Models\Surat;

class KelurahanController extends Controller
{
    public function dataPenduduk(){
        $warga = Penduduk::all();
        $user = User::all();
    return view('penduduk_index', compact('warga','user'));
    }

    public function daftarSurat(){

    }


}
