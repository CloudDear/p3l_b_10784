<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HalamanCustomerController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('halamanCustomer.index', compact('user'));
    }
}