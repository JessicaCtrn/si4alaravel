<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Models\Sesi;
use App\Models\Prodi;
use App\Models\MataKuliah;
use App\Models\Jadwal;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // panggil model mata kuliah menggunakan eloquent
        $matakuliah = MataKuliah::all(); // perintah sql select * from mata kuliah
        // dd($matakuliah); // dump and die
        return view('matakuliah.index', compact('matakuliah')); // selain compact bisa gunakan with()
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
            'id' => 'required|unique:sesi',
            'nama' => 'required|string|max:255',
            'prodi_id' => 'required',
            'kode_mk' => 'required',
            'created_at' => 'required',
            'updated_at' => 'required',
        ]);
        // simpan data ke database
        MataKuliah::create($input); // insert data ke tabel mata kuliah
        // redirect ke halaman index
        return redirect()->route('sesi.index')->with('success', 'Mata Kuliah Berhasil Ditambahkan.'); // redirect ke halaman index dengan pesan sukses
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MataKuliah  $matakuliah
     * @return \Illuminate\Http\Response
     */
    public function show($matakuliah)
    {
        $matakuliah = MataKuliah::findOrFail($matakuliah);
        // dd($matakuliah); //dump and die
        return view('matakuliah.show', compact('matakuliah')); //mengirim data ke view matakuliah.show
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MataKuliah  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit(MataKuliah $matakuliah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MataKuliah  $sesi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MataKuliah $matakuliah)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MataKuliah  $matakuliah
     * @return \Illuminate\Http\Response
     */
    public function destroy($matakuliah)
{
        $matakuliah = MataKuliah::findOrFail($matakuliah);
        // dd($matakuliah); //dump and die

        // Hapus data sesi
        $matakuliah->delete();
        // Redirect ke route sesi.index dengan pesan sukses
        return redirect()->route('matakuliah.index')->with('success', 'Mata kuliah berhasil dihapus.');
    }
}
