<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        //Cara 1 : sql querry
        $mahasiswaprodi = DB::select('
        SELECT prodi.nama, COUNT(*) as jumlah
        FROM `mahasiswa`
        JOIN prodi ON mahasiswa.prodi_id = prodi_id
        GROUP BY prodi.nama');
        // Render the dashboard view
        return view('dashboard.index', compact('mahasiswaprodi'));
    }
}