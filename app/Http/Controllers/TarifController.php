<?php

namespace App\Http\Controllers;

use App\Models\Tarif;
use App\Models\Season;
use Illuminate\Http\Request;

class TarifController extends Controller
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
            $tarif = Tarif::where('tarif_terpasang', 'like', "%$keyword%")
                ->latest()
                ->paginate(5);

        } else {
            // If no search query is present, get all records
            $tarif = Tarif::latest()->paginate(5);
        }

        // Render the view with the posts
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
        return view('tarif.create', compact('season'));
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
        return view('tarif.edit', ['old' => $tarif], compact('season')); // -> resources/views/stocks/edit.blade.php
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