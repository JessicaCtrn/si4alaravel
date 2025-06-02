<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Models\Sesi;
use App\Models\Prodi;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use App\Models\Jadwal;
use Illuminate\Http\Request;

class SesiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // panggil model sesi menggunakan eloquent
        $sesi = Sesi::all(); // perintah sql select * from sesi
        // dd($sesi); // dump and die
        return view('sesi.index', compact('sesi')); // selain compact bisa gunakan with()
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prodi = Prodi::all(); // ambil semua data prodi
        return view('sesi.create', compact('prodi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'nama' => 'required|string|max:255',
        ]);
        // simpan data ke database
        Sesi::create($input); // insert data ke tabel sesi
        // redirect ke halaman index
        return redirect()->route('sesi.index')->with('success', 'Sesi Berhasil Ditambahkan.'); // redirect ke halaman index dengan pesan sukses
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sesi  $sesi
     * @return \Illuminate\Http\Response
     */
    public function show($sesi)
    {
        $sesi = Sesi::findOrFail($sesi);
        // dd($sesi); //dump and die
        return view('sesi.show', compact('sesi')); //mengirim data ke view sesi.show
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sesi  $sesi
     * @return \Illuminate\Http\Response
     */
    public function edit(Sesi $sesi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sesi  $sesi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sesi $sesi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sesi  $sesi
     * @return \Illuminate\Http\Response
     */
    public function destroy($sesi)
{
        $sesi = Sesi::findOrFail($sesi);
        // dd($sesi); //dump and die

        // Hapus data sesi
        $sesi->delete();
        // Redirect ke route sesi.index dengan pesan sukses
        return redirect()->route('sesi.index')->with('success', 'Sesi berhasil dihapus.');
    }
}
