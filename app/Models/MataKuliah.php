<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    protected $table = 'matakuliah'; //nama tabel

    protected $fillable = [
        'id', 'kode_mk', 'nama', 'prodi_id', 'created_at', 'updated_at'

    ];
    public $timestamps = true; // Aktifkan created_at dan updated_at otomatis

    public function prodi() 
    {
        return $this->belongsTo(Prodi::class, 'Prodi_id', 'id'); //relasi ke tabel prodi
       
    }
}