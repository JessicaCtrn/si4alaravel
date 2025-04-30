<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use Illuminate\Http\Request;

class FakultasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() // tampil list data dari fakultas
    {
        // panggil model fakultas menggunakan eloquent
        $fakultas = Fakultas::all(); // perintah sql select * from fakultas
        // dd($fakultas); // dump and die
        return view('fakultas.index', compact('fakultas')); // selain compact bisa gunakan with()
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() // tampil formulir tambah data fakultas
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) // memproses penyimpanan data fakultas
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fakultas  $fakultas
     * @return \Illuminate\Http\Response
     */
    public function show(Fakultas $fakultas) // menampilkan detail data fakultas
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fakultas  $fakultas
     * @return \Illuminate\Http\Response
     */
    public function edit(Fakultas $fakultas) // menampilkan formulir edit data fakultas
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fakultas  $fakultas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fakultas $fakultas) // memproses penyimpanan perubahan data yang ada pada formulir edit td
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fakultas  $fakultas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fakultas $fakultas) // menghapus data fakultas
    {
        //
    }
}
