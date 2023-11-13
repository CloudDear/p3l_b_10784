<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Tarif;
use Illuminate\Http\Request;

class KamarController extends Controller
{
    /**
     * index
     *
     *@return void
     */
    public function index(Request $request)
    {
        // Get the search query from the request
        $keyword = $request->input('keyword');

        // Check if a search query is present
        if ($keyword) {
            // Perform the search and paginate the results
            $kamar = Kamar::where('jenis_kamar', 'like', "%$keyword%")
                ->latest()
                ->paginate(5);

        } else {
            // If no search query is present, get all records
            $kamar = Kamar::latest()->paginate(5);
        }

        // Render the view with the posts
        $user = auth()->user();
        return view('kamar.index', compact('kamar', 'user'));
    }

    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        $tarif = Tarif::all();
        return view('kamar.create', compact('tarif'));
    }

    /**
     * store
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        try {
            //Validasi Formulir
            $this->validate($request, [
                'jenis_kamar' => 'required',
                'tipe_tempat_tidur' => 'required',
                'tarif_awal' => 'required',
                'ukuran_kamar' => 'required',
                'kapasitas_kamar' => 'required',
                'rincian_kamar' => 'required',
                'detail_kamar' => 'required',
                'tarif_id' => 'required'

            ]);
            //Fungsi Simpan Data ke dalam Database
            Kamar::create([
                'jenis_kamar' => $request->jenis_kamar,
                'tipe_tempat_tidur' => $request->tipe_tempat_tidur,
                'tarif_awal' => $request->tarif_awal,
                'ukuran_kamar' => $request->ukuran_kamar,
                'kapasitas_kamar' => $request->kapasitas_kamar,
                'rincian_kamar' => $request->rincian_kamar,
                'detail_kamar' => $request->detail_kamar,
                'tarif_id' => $request->tarif_id
            ]);
            return redirect()->route('kamar.index')->with(['success' => 'Data Berhasil Disimpan!']);

        } catch (Exception $e) {
            return redirect()->route('kamar.index')->with(['error' => 'Data Tidak Berhasil Disimpan!']);
        }
    }

    public function destroy($id)
    {
        try {
            $kamar = Kamar::find($id);
            $kamar->delete();

            return redirect()->route('kamar.index')->with(['success' => 'Data Berhasil Dihapus!']);
        } catch (Exception $e) {
            //Redirect jika gagal delete
            return redirect()->route('kamar.index')->with(['error' => 'Data Tidak Berhasil Dihapus!']);
        }

    }

    public function edit($id)
    {
        $kamar = Kamar::find($id);
        $tarif = Tarif::all();
        return view('kamar.edit', ['old' => $kamar], compact('tarif')); // -> resources/views/stocks/edit.blade.php
    }

    public function update(Request $request, $id)
    {
        // Validation for required fields (and using some regex to validate our numeric value)
        $this->validate($request, [
            'jenis_kamar' => 'required',
            'tipe_tempat_tidur' => 'required',
            'tarif_awal' => 'required',
            'ukuran_kamar' => 'required',
            'kapasitas_kamar' => 'required',
            'rincian_kamar' => 'required',
            'detail_kamar' => 'required',
            'tarif_id' => 'required'
        ]);

        try {
            $kamar = Kamar::find($id);
            $tarif = Tarif::all();
            // Getting values from the blade template form
            $kamar->jenis_kamar = $request->get('jenis_kamar');
            $kamar->tipe_tempat_tidur = $request->get('tipe_tempat_tidur');
            $kamar->tarif_awal = $request->get('tarif_awal');
            $kamar->ukuran_kamar = $request->get('ukuran_kamar');
            $kamar->kapasitas_kamar = $request->get('kapasitas_kamar');
            $kamar->rincian_kamar = $request->get('rincian_kamar');
            $kamar->detail_kamar = $request->get('detail_kamar');
            $kamar->tarif_id = $request->get('tarif_id');
            $kamar->save();

            return redirect()->route('kamar.index')->with(['success' => 'Data Berhasil Diupdate!']);
        } catch (Exception $e) {
            //Redirect jika gagal update
            return redirect()->route('kamar.index')->with(['error' => 'Data Tidak Berhasil Diupdate!']);
        }

    }

}