<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Surat;
use App\Models\Penduduk;
use Barryvdh\DomPDF\Facade\Pdf;

class SuratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $semuaSurat = Surat::with('penduduk')->get();

        return view('surat.index',compact('semuaSurat'));
        @dd($semuaSurat);
    }

    public function cetakPdf($id)
    {
        $surat = Surat::findOrFail($id);

        $pdf = Pdf::loadView('surat.cetak', compact('surat'));

        return $pdf->stream('Surat_Kelurahan_' and $surat->nomor_surat . '.pdf');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $penduduk=Penduduk::all();
        return view('surat.create',compact('penduduk'));
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
{
    $validatedData = $request->validate([
        'nomor_surat' => 'required|unique:surats,nomor_surat',
        'jenis_surat' => 'required',
        'tanggal_ajuan' => 'required|date',
        'berkas_pendukung' => 'nullable|file|mimes:jpg,png,pdf|max:2048',
        'penduduk_id' => 'required|numeric',
    ]);

    if ($request->hasFile('berkas_pendukung')) {
        $namaFile = time() . '_' . $request->file('berkas_pendukung')->getClientOriginalName();
        $path = $request->file('berkas_pendukung')->storeAs('berkas_surat', $namaFile, 'public');

        $validatedData['berkas_pendukung'] = $path;
    }

    Surat::create($validatedData);

    return redirect()->route('surat.index')->with('sukses', 'Data permohonan surat berhasil dikirim!');
}



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $surat = Surat::findOrFail($id);
        return view('surat.edit', compact('surat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
     $surat = Surat::findOrFail($id);
     $validatedData = $request->validate([
        'nomor_surat' => 'required|max:50|unique:surats,nomor_surat,' . $surat->id,
        'jenis_surat' => 'required',
        'tanggal_ajuan' => 'required|date'
    ], [
        'nomor_surat.required' => 'Nomor surat wajib diisi.',
        'nomor_surat.unique' => 'Nomor surat ini telah terdaftar pada sistem.'
    ]);

     $surat -> update($validatedData);

         return redirect()->route('surat.index')->with('sukses', 'Data surat berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $surat = Surat::findOrFail($id);
        $surat -> delete();

        return redirect()->route('surat.index')-> with('sukses','data berhasil dihapus!');
    }


}
