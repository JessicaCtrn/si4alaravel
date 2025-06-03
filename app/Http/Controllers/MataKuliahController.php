<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use App\Models\MataKuliah;
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
        return view('matakuliah.create', compact('prodi'));
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
            'kode_mk' => 'required|unique:matakuliah',
            'nama' => 'required',
            'prodi_id' => 'required',

        ]);
        // simpan data ke database
        MataKuliah::create($input); // insert data ke tabel mata kuliah
        // redirect ke halaman index
        return redirect()->route('matakuliah.index')->with('success', 'Mata Kuliah Berhasil Ditambahkan.'); // redirect ke halaman index dengan pesan sukses
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MataKuliah  $matakuliah
     * @return \Illuminate\Http\Response
     */
    public function show(MataKuliah $matakuliah)
    {
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
        // dd($matakuliah); //dump and die
        $prodi = Prodi::all(); // ambil semua data prodi
        return view('matakuliah.edit', compact('matakuliah', 'prodi')); // mengirim data ke view matakuliah.edit
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
        $input = $request->validate([
            'kode_mk' => 'required',
            'nama' => 'required',
            'prodi_id' => 'required',
        ]);
        // update data ke database
        $matakuliah->update($input); // update data ke tabel mata kuliah
        // redirect ke halaman index
        return redirect()->route('matakuliah.index')->with('success', 'Mata Kuliah Berhasil Diupdate.'); // redirect ke halaman index dengan pesan sukses
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MataKuliah  $matakuliah
     * @return \Illuminate\Http\Response
     */
    public function destroy(MataKuliah $matakuliah)
{
        $matakuliah = MataKuliah::findOrFail($matakuliah);
        // dd($matakuliah); //dump and die

        // Hapus data sesi
        $matakuliah->delete();
        // Redirect ke route sesi.index dengan pesan sukses
        return redirect()->route('matakuliah.index')->with('success', 'Mata kuliah berhasil dihapus.');
    }
}
