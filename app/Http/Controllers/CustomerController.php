<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * index
     *
     *@return void
     */
    public function index(Request $request)
    {
        //get posts
        $customer = Customer::latest()->paginate(5);
        //render view with posts
        // Get the search query from the request
        $keyword = $request->input('keyword');

        // Check if a search query is present
        if ($keyword) {
            // Perform the search and paginate the results
            $customer = Customer::where('nama_customer', 'like', "%$keyword%")
                ->latest()
                ->paginate(5);

        } else {
            // If no search query is present, get all records
            $customer = Customer::latest()->paginate(5);
        }

        // Render the view with the posts
        return view('customer.index', compact('customer'));
    }
    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        return view('customer.create');
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
                'nama_customer' => 'required',
                'email' => 'required',
                'no_identitas' => 'required',
                'nomor_telepon' => 'required',
                'alamat' => 'required',
                'nama_institusi' => 'required',
                'password' => 'required'

            ]);
            //Fungsi Simpan Data ke dalam Database
            Customer::create([
                'nama_customer' => $request->nama_customer,
                'email' => $request->email,
                'no_identitas' => $request->no_identitas,
                'nomor_telepon' => $request->nomor_telepon,
                'alamat' => $request->alamat,
                'nama_institusi' => $request->nama_institusi,
                'password' => $request->password
            ]);

            return redirect()->route('customer.index')->with(['success' => 'Data Berhasil Disimpan!']);

        } catch (Exception $e) {
            return redirect()->route('customer.index')->with(['error' => 'Data Tidak Berhasil Disimpan!']);
        }
    }

    public function destroy($id)
    {
        try {
            $customer = Customer::find($id);
            $customer->delete();

            return redirect()->route('customer.index')->with(['success' => 'Data Berhasil Dihapus!']);
        } catch (Exception $e) {
            //Redirect jika gagal delete
            return redirect()->route('customer.index')->with(['error' => 'Data Tidak Berhasil Dihapus!']);
        }

    }

    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('customer.edit', ['old' => $customer]); // -> resources/views/stocks/edit.blade.php
    }

    public function update(Request $request, $id)
    {
        // Validation for required fields (and using some regex to validate our numeric value)
        $this->validate($request, [
            'nama_customer' => 'required',
            'email' => 'required',
            'no_identitas' => 'required',
            'nomor_telepon' => 'required',
            'alamat' => 'required',
            'nama_institusi' => 'required',
            'password' => 'required'
        ]);

        try {
            $customer = Customer::find($id);
            // Getting values from the blade template form
            $customer->nama_customer = $request->get('nama_customer');
            $customer->email = $request->get('email');
            $customer->no_identitas = $request->get('no_identitas');
            $customer->nomor_telepon = $request->get('nomor_telepon');
            $customer->alamat = $request->get('alamat');
            $customer->nama_institusi = $request->get('nama_institusi');
            $customer->password = $request->get('password');
            $customer->save();

            return redirect()->route('customer.index')->with(['success' => 'Data Berhasil Diupdate!']);
        } catch (Exception $e) {
            //Redirect jika gagal update
            return redirect()->route('customer.index')->with(['error' => 'Data Tidak Berhasil Diupdate!']);
        }



    }

    /*
    API NYA
    */

    public function getAllCustomer()
    {
        return response()->json([
            'message' => 'success',
            'data' => Customer::all()
        ], 200);
    }

    public function storeAllCustomer(Request $request)
    {
        $storeData = $request->all();
        $validate = Validator::make($storeData, [
            'nama_customer' => 'required',
            'email' => 'required',
            'no_identitas' => 'required',
            'nomor_telepon' => 'required',
            'alamat' => 'required',
            'nama_institusi' => 'required',
            'password' => 'required'
        ]);

        if ($validate->fails())
            return response(['message' => $validate->errors()], 400);

        $customer = Customer::create($storeData);
        return response([
            'message' => 'Add customer Success',
            'data' => $customer
        ], 200);
    }

    public function showAllCustomer($id)
    {
        $customer = Customer::find($id);

        if (!is_null($customer)) {
            return response([
                'message' => 'Retrieve Customer Success',
                'data' => $customer
            ], 200);
        }

        return response([
            'message' => 'Customer Not Found',
            'data' => null
        ], 404);
    }

    public function updateAllCustomer(Request $request, $id)
    {
        $customer = Customer::find($id);
        if (is_null($customer)) {
            return response([
                'message' => 'Customer Not Found',
                'data' => null
            ], 404);
        }

        $updateData = $request->all();
        $validate = Validator::make($updateData, [
            'nama_customer' => 'required',
            'email' => 'required',
            'no_identitas' => 'required',
            'nomor_telepon' => 'required',
            'alamat' => 'required',
            'nama_institusi' => 'required',
            'password' => 'required'
        ]);

        if ($validate->fails())
            return response(['message' => $validate->errors()], 400);

        $customer->nama_customer = $updateData['nama_customer'];
        $customer->email = $updateData['email'];
        $customer->no_identitas = $updateData['alamat'];
        $customer->nomor_telepon = $updateData['nomor_telepon'];
        $customer->alamat = $updateData['alamat'];
        $customer->nama_institusi = $updateData['nama_institusi'];
        $customer->password = $updateData['password'];

        if ($customer->save()) {
            return response([
                'message' => 'Update Customer Success',
                'data' => $customer
            ], 200);
        }

        return response([
            'message' => 'Update Customer Failed',
            'data' => null
        ], 400);

    }

    public function destroyAllCustomer($id)
    {
        $customer = Customer::find($id);

        if (is_null($customer)) {
            return response([
                'message' => 'Customer Not Found',
                'data' => null
            ], 404);
        }

        if ($customer->delete()) {
            return response([
                'message' => 'Delete Customer Success',
                'data' => $customer
            ], 200);
        }

        return response([
            'message' => 'Delete Customer Failed',
            'data' => null
        ], 400);
    }
}