<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa'; // nama tabel

    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodi_id', 'id'); // belongsTo : 1 prodi hny pny 1 fakultas, 1 fakultas pny bnyk prodi
    }
}
