<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    protected $table = 'prodi'; // nama tabel

    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class, 'fakultas_id', 'id'); // belongsTo : 1 prodi hny pny 1 fakultas, 1 fakultas pny bnyk prodi
    }
}

