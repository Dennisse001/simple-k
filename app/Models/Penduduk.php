<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Penduduk extends Model
{
    protected $fillable = ['nomor_surat', 'jenis_surat', 'tanggal_ajuan', 'penduduk_id'];
    public function surats():HasMany{
        return $this->hasMany(Surat::class);
    }
}
