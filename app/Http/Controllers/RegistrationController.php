<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index()
    {
        return view('registration.index', [
            'title' => 'Registration',
            'active' => 'registration'
        ]);
    }
}