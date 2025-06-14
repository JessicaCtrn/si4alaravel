<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // panggil model mahasiswa menggunakan eloquent
        $mahasiswa = Mahasiswa::all(); // perintah sql select * from mahasiswa
        // dd($mahasiswa); // dump and die
        return view('mahasiswa.index', compact('mahasiswa')); // selain compact bisa gunakan with()
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prodi = Prodi::all(); // ambil semua data prodi
        return view('mahasiswa.create', compact('prodi'));
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
            'npm' => 'required|unique:mahasiswa',
            'nama' => 'required',
            'jk' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'asal_sma' => 'required',
            'prodi_id' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);
        // upload foto
        if ($request->hasFile('foto')) { // ambil file foto
            // $file = $request->file('foto');
            // $filename = time() . '.' . $file->getClientOriginalExtension();
            // $file->move(public_path('images'), $filename); // simpan foto ke folder public/images
            // $input['foto'] = $filename; // simpan nama file baru ke $input

            try {
                $file = $request->file('foto');
                $response = Http::asMultipart()->post(
                    'https://api.cloudinary.com/v1_1/' . env('CLOUDINARY_CLOUD_NAME') . '/image/upload',
                    [
                        [
                            'name'     => 'file',
                            'contents' => fopen($file->getRealPath(), 'r'),
                            'filename' => $file->getClientOriginalName(),
                        ],
                        [
                            'name'     => 'upload_preset',
                            'contents' => env('CLOUDINARY_UPLOAD_PRESET'),
                        ],
                    ]
                );

                $result = $response->json();
                if (isset($result['secure_url'])) {
                    $input['foto'] = $result['secure_url'];
                } else {
                    return back()->withErrors(['foto' => 'Cloudinary upload error: ' . ($result['error']['message'] ?? 'Unknown error')]);
                }
            } catch (\Exception $e) {
                return back()->withErrors(['foto' => 'Cloudinary error: ' . $e->getMessage()]);
            }
        }
        // simpan data ke database
        Mahasiswa::create($input); // insert data ke tabel mahasiswa
        // redirect ke halaman index
        return redirect()->route('mahasiswa.index')->with('success', 'Data Mahasiswa Berhasil Ditambahkan.'); // redirect ke halaman index dengan pesan sukses
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show($mahasiswa)
    {
        $mahasiswa = Mahasiswa::findOrFail($mahasiswa);
        // dd($mahasiswa); //dump and die
        return view('mahasiswa.show', compact('mahasiswa')); //mengirim data ke view mahasiswa.show
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($mahasiswa)
{
        $mahasiswa = Mahasiswa::findOrFail($mahasiswa);
        // dd($mahasiswa); //dump and die

        // hapus foto jika ada
        if($mahasiswa->foto) { // cek apakah ada foto
            $fotoPath = public_path('images/' . $mahasiswa->foto); // path foto
            if (file_exists($fotoPath)) { // cek apakah file foto ada
                unlink($fotoPath); // hapus file foto
            }
        }

        // Hapus data mahasiswa
        $mahasiswa->delete();
        // Redirect ke route mahasiswa.index dengan pesan sukses
        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil dihapus.');
    }
}
