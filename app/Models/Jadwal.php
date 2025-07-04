<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Sesi;
use App\Models\MataKuliah;
use App\Models\User; 

class Jadwal extends Model
{
    protected $table = 'jadwal'; // nama tabel

    protected $fillable = [
    'tahun_akademik', 'kode_smt', 'kelas', 'matakuliah_id', 'dosen_id', 'sesi_id'
    ];

    public function matakuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'matakuliah_id', 'id'); // belongsTo : 1 jadwal hanya memiliki 1 mata kuliah, 1 mata kuliah bisa memiliki banyak jadwal
    }
    public function sesi()
    {
        return $this->belongsTo(Sesi::class, 'sesi_id', 'id'); // belongsTo : 1 jadwal hanya memiliki 1 sesi, 1 sesi bisa memiliki banyak jadwal
    }
    public function dosen()
    {
        return $this->belongsTo(User::class, 'dosen_id', 'id');
    }

}
