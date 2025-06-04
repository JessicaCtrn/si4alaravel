<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Sesi;
use App\Models\MataKuliah;
use App\Models\Jadwal;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // panggil model jadwal menggunakan eloquent
        $jadwal = Jadwal::all(); // perintah sql select * from jadwal
        // dd($jadwal); // dump and die
        return view('jadwal.index')->with('jadwal', $jadwal); // mengirim data jadwal ke view jadwal.index
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $matakuliah = MataKuliah::all(); // ambil semua data mata kuliah
        $sesi = Sesi::all(); // ambil semua data sesi
        $dosen = User::where('role', 'dosen')->get(); // ambil semua data dosen dengan role 'dosen'
        return view('jadwal.create', compact('matakuliah', 'sesi', 'dosen')); // mengirim data ke view jadwal.create
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
            'tahun_akademik' => 'required',
            'kode_smt' => 'required',
            'kelas' => 'required',
            'matakuliah_id' => 'required',
            'dosen_id' => 'required',
            'sesi_id' => 'required',

        ]);
        Jadwal::create($input); // insert data ke tabel jadwal
        // redirect ke halaman index
        return redirect()->route('jadwal.index')->with('success', 'Jadwal Berhasil Ditambahkan.'); // redirect ke halaman index dengan pesan sukses
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function show(Jadwal $jadwal)
    {
        $jadwal = Jadwal::findOrFail($jadwal->id);
        // dd($jadwal); //dump and die
        return view('jadwal.show', compact('jadwal')); //mengirim data ke view jadwal.show
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function edit(Jadwal $jadwal)
    {
        $jadwal = Jadwal::findOrFail($jadwal->id); // ambil data jadwal berdasarkan id
        $matakuliah = MataKuliah::all(); // ambil semua data mata kuliah
        $sesi = Sesi::all(); // ambil semua data sesi
        $dosen = User::where('role', 'dosen')->get(); // ambil semua data dosen dengan role 'dosen'
        return view('jadwal.edit', compact('jadwal', 'matakuliah', 'sesi', 'dosen')); // mengirim data ke view jadwal.edit
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jadwal $jadwal)
    {
        $input = $request->validate([
            'tahun_akademik' => 'required',
            'kode_smt' => 'required',
            'kelas' => 'required',
            'matakuliah_id' => 'required',
            'dosen_id' => 'required',
            'sesi_id' => 'required',
        ]);

        // Update data jadwal
        $jadwal->update($input);
        // Redirect ke route mahasiswa.index dengan pesan sukses
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jadwal$jadwal)
{
        $jadwal = Jadwal::findOrFail($jadwal);
        // dd($jadwal); //dump and die

        // Hapus data jadwal
        $jadwal->delete();
        // Redirect ke route mahasiswa.index dengan pesan sukses
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil dihapus.');
    }
}
