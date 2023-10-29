<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SMController extends Controller
{
    public function index()
    {
        return view('sm.index');
    }
}