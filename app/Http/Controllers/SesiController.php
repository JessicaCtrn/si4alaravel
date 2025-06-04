<?php

namespace App\Http\Controllers;

use App\Models\Sesi;
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
        return view('sesi.index')->with('sesi', $sesi);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sesi.create');
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
            'nama' => 'required|unique:sesi'
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
    public function show(Sesi $sesi)
    {
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
        $sesi = Sesi::findOrFail($sesi->id);
        return view('sesi.edit', compact('sesi')); //mengirim data ke view sesi.edit
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
        $sesi = Sesi::findOrFail($sesi->id);
        $input = $request->validate([
            'nama' => 'required|unique:sesi' . $sesi->id // validasi nama harus unik kecuali untuk sesi yang sedang diupdate
        ]);
        // update data sesi
        $sesi->update($input); // update data ke tabel sesi
        // redirect ke route sesi.index dengan pesan sukses
        return redirect()->route('sesi.index')->with('success', 'Sesi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sesi  $sesi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sesi $sesi)
    {
        $sesi->delete(); // hapus data sesi
        // redirect ke route sesi.index dengan pesan sukses
        return redirect()->route('sesi.index')->with('success', 'Sesi berhasil dihapus.');
    }
}

