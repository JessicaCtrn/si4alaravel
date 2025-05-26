<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Models\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //panggil model prodi menggunakan eloquent
        $prodi = Prodi::all(); // perintah select * from prodi (panggil model lalu panggil all)
        //dd($prodi); // dd adalah dump and die, untuk menampilkan data dan menghentikan eksekusi
        return view('prodi.index', compact('prodi')); //selain compact bisa gunakan with()
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fakultas = Fakultas::all(); // ambil semua data fakultas
        return view('prodi.create', compact('fakultas')); // kirim data fakultas ke view prodi.create
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validasi input
        $input = $request->validate([
            'nama' => 'required|unique:prodi',
            'singkatan' => 'required|max:5',
            'kaprodi' => 'required',
            'sekretaris' => 'required',
            'fakultas_id' => 'required',
        ]);

        // simpan data ke tabel prodi
        Prodi::create($input);

        // redirect ke route prodi.index
        return redirect()->route('prodi.index')->with('success', 'Prodi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($prodi)
    {
        $prodi = Prodi::findOrFail($prodi);
        // dd($prodi); //dump and die
        return view('prodi.show', compact('prodi')); //mengirim data ke view prodi.show
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prodi $prodi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prodi $prodi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($prodi)
    {
        $prodi = Prodi::findOrFail($prodi);
        // dd($prodi); //dump and die

        // Hapus data prodi
        $prodi->delete();
        // Redirect ke route prodi.index dengan pesan sukses
        return redirect()->route('prodi.index')->with('success', 'Prodi berhasil dihapus.');
    }
}