<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use Illuminate\Http\Request;

class KamarController extends Controller
{
    /**
     * index
     *
     *@return void
     */

    public function index()
    {
        //get posts
        $kamar = Kamar::latest()->paginate(5);
        //render view with posts
        return view('kamar.index', compact('kamar'));
    }

    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        return view('kamar.create');
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
                'detail_kamar' => 'required'

            ]);
            //Fungsi Simpan Data ke dalam Database
            Kamar::create([
                'jenis_kamar' => $request->jenis_kamar,
                'tipe_tempat_tidur' => $request->tipe_tempat_tidur,
                'tarif_awal' => $request->tarif_awal,
                'ukuran_kamar' => $request->ukuran_kamar,
                'kapasitas_kamar' => $request->kapasitas_kamar,
                'rincian_kamar' => $request->rincian_kamar,
                'detail_kamar' => $request->detail_kamar
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
        return view('kamar.edit', ['old' => $kamar]); // -> resources/views/stocks/edit.blade.php
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
            'detail_kamar' => 'required'
        ]);

        try {
            $kamar = Kamar::find($id);
            // Getting values from the blade template form
            $kamar->jenis_kamar = $request->get('jenis_kamar');
            $kamar->tipe_tempat_tidur = $request->get('tipe_tempat_tidur');
            $kamar->tarif_awal = $request->get('tarif_awal');
            $kamar->ukuran_kamar = $request->get('ukuran_kamar');
            $kamar->kapasitas_kamar = $request->get('kapasitas_kamar');
            $kamar->rincian_kamar = $request->get('rincian_kamar');
            $kamar->detail_kamar = $request->get('detail_kamar');
            $kamar->save();

            return redirect()->route('kamar.index')->with(['success' => 'Data Berhasil Diupdate!']);
        } catch (Exception $e) {
            //Redirect jika gagal update
            return redirect()->route('kamar.index')->with(['error' => 'Data Tidak Berhasil Diupdate!']);
        }



    }
}