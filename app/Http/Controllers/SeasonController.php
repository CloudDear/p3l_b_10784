<?php

namespace App\Http\Controllers;

use App\Models\Season;
use Illuminate\Http\Request;

class SeasonController extends Controller
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
            $season = Season::where('nama_season', 'like', "%$keyword%")
                ->latest()
                ->paginate(5);

        } else {
            // If no search query is present, get all records
            $season = Season::latest()->paginate(5);
        }

        // Render the view with the posts
        return view('season.index', compact('season'));
    }



    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        return view('season.create');
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
                'nama_season' => 'required',
                'tanggal_mulai' => 'required',
                'tanggal_berakhir' => 'required'

            ]);
            //Fungsi Simpan Data ke dalam Database
            Season::create([
                'nama_season' => $request->nama_season,
                'tanggal_mulai' => $request->tanggal_mulai,
                'tanggal_berakhir' => $request->tanggal_berakhir
            ]);

            return redirect()->route('season.index')->with(['success' => 'Data Berhasil Disimpan!']);

        } catch (Exception $e) {
            return redirect()->route('season.index')->with(['error' => 'Data Tidak Berhasil Disimpan!']);
        }
    }

    public function destroy($id)
    {
        try {
            $season = Season::find($id);
            $season->delete();

            return redirect()->route('season.index')->with(['success' => 'Data Berhasil Dihapus!']);
        } catch (Exception $e) {
            //Redirect jika gagal delete
            return redirect()->route('season.index')->with(['error' => 'Data Tidak Berhasil Dihapus!']);
        }

    }

    public function edit($id)
    {
        $season = Season::find($id);
        return view('season.edit', ['old' => $season]); // -> resources/views/stocks/edit.blade.php
    }

    public function update(Request $request, $id)
    {
        // Validation for required fields (and using some regex to validate our numeric value)
        $this->validate($request, [
            'nama_season' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_berakhir' => 'required'
        ]);

        try {
            $season = Season::find($id);
            // Getting values from the blade template form
            $season->nama_season = $request->get('nama_season');
            $season->tanggal_mulai = $request->get('tanggal_mulai');
            $season->tanggal_berakhir = $request->get('tanggal_berakhir');
            $season->save();

            return redirect()->route('season.index')->with(['success' => 'Data Berhasil Diupdate!']);
        } catch (Exception $e) {
            //Redirect jika gagal update
            return redirect()->route('season.index')->with(['error' => 'Data Tidak Berhasil Diupdate!']);
        }



    }
}