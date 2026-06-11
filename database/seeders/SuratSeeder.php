<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Surat;
use App\Models\Penduduk;

class SuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('surats')->truncate();
        $warga1 = Penduduk::first();
        $warga2 = Penduduk::find(2);
        
        if ($warga1){
            Surat::create([
                'nomor_surat' => '001/MK/2026',
                'jenis_surat' => 'Surat Keterangan Usaha (SKU)',
                'tanggal_ajuan' => '2026-05-15',
                'penduduk_id' => $warga1->id
            ]);
            Surat::create([
                'nomor_surat' => '002/MK/2026',
                'jenis_surat' => 'Surat Pengantar SKCK',
                'tanggal_ajuan' => '2026-05-27',
                'penduduk_id' => $warga1->id
            ]);
            
        }
        
        if ($warga2){
            Surat::create([
                'nomor_surat' => '003/MK/2026',
                'jenis_surat' => 'Pengajuan Akta Kelahiran',
                'tanggal_ajuan' => '2026-05-15',
                'penduduk_id' => $warga2->id
            ]);
        }
    
            Surat::create([
                'nomor_surat' => '004/MK/2026',
                'jenis_surat' => 'Surat Pengurusan NIK',
                'tanggal_ajuan' => '2026-05-17',
                'penduduk_id' => 3
            ]);
            
        
    }
}
