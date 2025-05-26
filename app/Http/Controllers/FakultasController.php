<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use Illuminate\Http\Request;

class FakultasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() //menampilkan list data dari tabel fakultas
    {
        //panggil model Fakultas menggunakan eloquent
        $fakultas = Fakultas::all(); // perintah select * from fakultas (panggil model lalu panggil all)
        //dd($fakultas); //dump and die
        return view('fakultas.index', compact('fakultas')); //mengirim data ke view fakultas.index
        //selain compact bisa menggunakan with()
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() //menampilkan formulis tambah data fakultas
    {
        return view('fakultas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) //memproses penyimpanan data fakultas
    {
        // validasi input
        $input = $request->validate([
            'nama' => 'required|unique:fakultas',
            'singkatan' => 'required|max:5',
            'dekan' => 'required',
            'wakil_dekan' => 'required',
        ]);

        // simpan data ke tabel fakultas
        Fakultas::create($input);

        // redirect ke route fakultas.index
        return redirect()->route('fakultas.index')->with('success', 'Fakultas berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Fakultas $fakultas) //menampilkan detail data fakultas
    {
        $fakultas = Fakultas::findOrFail($fakultas);
        // dd($fakultas); //dump and die
        return view('fakultas.show', compact('fakultas')); //mengirim data ke view fakultas.show
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($fakultas) //menampilkan formulir edit data fakultas
    {
        $fakultas = Fakultas::findOrFail($fakultas);
        // dd($fakultas); //dump and die
        return view('fakultas.edit', compact('fakultas')); //mengirim data ke view fakultas.edit
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $fakultas) //memproses penyimpanan perubahan data yg ada pada formulir edit tadi
    {
        $fakultas = Fakultas::findOrFail($fakultas); //mencari data fakultas berdasarkan id  
        // validasi input
        $input = $request->validate([
            'nama' => 'required|unique:fakultas',
            'singkatan' => 'required|max:5',
            'dekan' => 'required',
            'wakil_dekan' => 'required',
        ]);
        $fakultas->update($input); //update data fakultas dengan input yang sudah divalidasi
        return redirect()->route('fakultas.index')->with('success', 'Fakultas berhasil diperbarui.'); //redirect ke route fakultas.index
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($fakultas) //menghapus data fakultas
    {
        $fakultas = Fakultas::findOrFail($fakultas);
        // dd($fakuktas); //dump and die

        // Hapus data fakultas
        $fakultas->delete();
        // Redirect ke route fakultas.index dengan pesan sukses
        return redirect()->route('fakultas.index')->with('success', 'Fakultas berhasil dihapus.');
    }
}