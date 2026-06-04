<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penduduk;
use App\Models\Surat;

class KelurahanController extends Controller
{
    public function dataPenduduk(){
        $warga = Penduduk::all();
        return view('penduduk_index', compact('warga'));
    }

    public function daftarSurat(){
        $semuaSurat = Surat::with('penduduk')->get();
        return view('surat_index',compact('semuaSurat'));
    }
}
