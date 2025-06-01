<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sesi extends Model
{
    protected $table = 'sesi'; //nama tabel

    protected $fillable = [
        'id', 'nama', 'created_at', 'updated_at'
    ];
    public $timestamps = true; // Aktifkan created_at dan updated_at otomatis

    public function mahasiswa() 
    {
        return $this->belongsTo(Mahasiswa::class, 'Mahasiswa_id', 'id'); //relasi ke tabel mahasiswa
        //belongsTo : 1 mahasiswa hanya 1 sesi
    }
}