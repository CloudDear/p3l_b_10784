<?php

namespace App\Http\Controllers;

use App\Models\LayananKamar;
use Illuminate\Http\Request;

class LayananKamarController extends Controller
{
    /**
     * index
     *
     *@return void
     */

    public function index()
    {
        //get posts
        $layanan_kamar = LayananKamar::latest()->paginate(5);
        //render view with posts
        return view('layanan_kamar.index', compact('layanan_kamar'));
    }

    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        return view('layanan_kamar.create');
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
                'nama_layanan' => 'required',
                'tarif_layanan' => 'required'

            ]);
            //Fungsi Simpan Data ke dalam Database
            LayananKamar::create([
                'nama_layanan' => $request->nama_layanan,
                'tarif_layanan' => $request->tarif_layanan
            ]);

            return redirect()->route('layanan_kamar.index')->with(['success' => 'Data Berhasil Disimpan!']);

        } catch (Exception $e) {
            return redirect()->route('layanan_kamar.index')->with(['error' => 'Data Tidak Berhasil Disimpan!']);
        }
    }

    public function destroy($id)
    {
        try {
            $layanan_kamar = LayananKamar::find($id);
            $layanan_kamar->delete();

            return redirect()->route('layanan_kamar.index')->with(['success' => 'Data Berhasil Dihapus!']);
        } catch (Exception $e) {
            //Redirect jika gagal delete
            return redirect()->route('layanan_kamar.index')->with(['error' => 'Data Tidak Berhasil Dihapus!']);
        }

    }

    public function edit($id)
    {
        $layanan_kamar = LayananKamar::find($id);
        return view('layanan_kamar.edit', ['old' => $layanan_kamar]); // -> resources/views/stocks/edit.blade.php
    }

    public function update(Request $request, $id)
    {
        // Validation for required fields (and using some regex to validate our numeric value)
        $this->validate($request, [
            'nama_layanan' => 'required',
            'tarif_layanan' => 'required'
        ]);

        try {
            $layanan_kamar = LayananKamar::find($id);
            // Getting values from the blade template form
            $layanan_kamar->nama_layanan = $request->get('nama_layanan');
            $layanan_kamar->tarif_layanan = $request->get('tarif_layanan');
            $layanan_kamar->save();

            return redirect()->route('layanan_kamar.index')->with(['success' => 'Data Berhasil Diupdate!']);
        } catch (Exception $e) {
            //Redirect jika gagal update
            return redirect()->route('layanan_kamar.index')->with(['error' => 'Data Tidak Berhasil Diupdate!']);
        }



    }
}