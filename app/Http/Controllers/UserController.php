<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
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
            $user = User::where('name', 'like', "%$keyword%")
                ->latest()
                ->paginate(5);

        } else {
            // If no search query is present, get all records
            $user = User::latest()->paginate(5);
        }

        // Render the view with the posts
        return view('user.index', compact('user'));
    }

    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        $role = Role::all();
        return view('user.create', compact('role'));
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
                'name' => 'required',
                'email' => 'required',
                'no_identitas' => 'required',
                'nomor_telepon' => 'required',
                'alamat' => 'required',
                'nama_institusi' => 'required',
                'password' => 'required',
                'role_id' => 'required'

            ]);
            //Fungsi Simpan Data ke dalam Database
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'no_identitas' => $request->no_identitas,
                'nomor_telepon' => $request->nomor_telepon,
                'alamat' => $request->alamat,
                'nama_institusi' => $request->nama_institusi,
                'password' => $request->password,
                'role_id' => $request->role_id
            ]);

            return redirect()->route('user.index')->with(['success' => 'Data Berhasil Disimpan!']);

        } catch (Exception $e) {
            return redirect()->route('user.index')->with(['error' => 'Data Tidak Berhasil Disimpan!']);
        }
    }

    public function destroy($id)
    {
        try {
            $user = User::find($id);
            $user->delete();

            return redirect()->route('user.index')->with(['success' => 'Data Berhasil Dihapus!']);
        } catch (Exception $e) {
            //Redirect jika gagal delete
            return redirect()->route('user.index')->with(['error' => 'Data Tidak Berhasil Dihapus!']);
        }

    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('user.edit', ['old' => $user]); // -> resources/views/stocks/edit.blade.php
    }

    public function update(Request $request, $id)
    {
        // Validation for required fields (and using some regex to validate our numeric value)
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'no_identitas' => 'required',
            'nomor_telepon' => 'required',
            'alamat' => 'required',
            'nama_institusi' => 'required',
            'password' => $request->password,
            'role_id' => $request->role_id
        ]);

        try {
            $user = User::find($id);
            // Getting values from the blade template form
            $user->name = $request->get('name');
            $user->email = $request->get('email');
            $user->no_identitas = $request->get('no_identitas');
            $user->nomor_telepon = $request->get('nomor_telepon');
            $user->alamat = $request->get('alamat');
            $user->nama_institusi = $request->get('nama_institusi');
            $user->password = $request->get('password');
            $user->role_id = $request->get('role_id');
            $user->save();

            return redirect()->route('user.index')->with(['success' => 'Data Berhasil Diupdate!']);
        } catch (Exception $e) {
            //Redirect jika gagal update
            return redirect()->route('user.index')->with(['error' => 'Data Tidak Berhasil Diupdate!']);
        }



    }
}