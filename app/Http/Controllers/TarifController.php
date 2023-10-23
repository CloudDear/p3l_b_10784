<?php

namespace App\Http\Controllers;

use App\Models\Tarif;
use App\Models\Season;
use App\Models\Kamar;
use Illuminate\Http\Request;

class TarifController extends Controller
{
    /**
     * index
     *
     *@return void
     */

    public function index()
    {
        //get posts
        $tarif = Tarif::latest()->paginate(5);
        //render view with posts
        return view('tarif.index', compact('tarif'));
    }

    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        $season = Season::all();
        $kamar = Kamar::all();
        return view('tarif.create', compact('season', 'kamar'));
    }

    /**
     * store
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        //dd($request);
        try {
            //Validasi Formulir
            $this->validate($request, [
                'tarif_terpasang' => 'required',
                'season_id' => 'required'
            ]);
            //Fungsi Simpan Data ke dalam Database
            Tarif::create([
                'tarif_terpasang' => $request->tarif_terpasang,
                'season_id' => $request->season_id
            ]);

            return redirect()->route('tarif.index')->with(['success' => 'Data Berhasil Disimpan!']);

        } catch (Exception $e) {
            return redirect()->route('tarif.index')->with(['error' => 'Data Tidak Berhasil Disimpan!']);
        }
    }


    public function destroy($id)
    {
        try {
            $tarif = Tarif::find($id);
            $tarif->delete();

            return redirect()->route('tarif.index')->with(['success' => 'Data Berhasil Dihapus!']);
        } catch (Exception $e) {
            //Redirect jika gagal delete
            return redirect()->route('tarif.index')->with(['error' => 'Data Tidak Berhasil Dihapus!']);
        }

    }

    public function edit($id)
    {
        $tarif = Tarif::find($id);
        $season = Season::all();
        $kamar = Kamar::all();
        return view('tarif.edit', ['old' => $tarif], compact('season', 'kamar')); // -> resources/views/stocks/edit.blade.php
    }

    public function update(Request $request, $id)
    {
        // Validation for required fields (and using some regex to validate our numeric value)
        $this->validate($request, [
            'tarif_terpasang' => 'required',
            'season_id' => 'required'
        ]);

        try {
            $tarif = Tarif::find($id);
            $season = Season::all();
            // Getting values from the blade template form
            $tarif->tarif_terpasang = $request->get('tarif_terpasang');
            $tarif->season_id = $request->get('season_id');
            $tarif->save();

            return redirect()->route('tarif.index')->with(['success' => 'Data Berhasil Diupdate!']);
        } catch (Exception $e) {
            //Redirect jika gagal update
            return redirect()->route('tarif.index')->with(['error' => 'Data Berhasil Diupdate!']);
        }



    }
}