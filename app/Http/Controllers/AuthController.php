<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login', [
            'title' => 'Login',
            'active' => 'login'
        ]);
    }
    public function dologin(Request $request)
    {
        // Validation
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (auth()->attempt($credentials)) {
            // Regenerate the session
            $request->session()->regenerate();

            // Get the user's role ID
            $role_id = auth()->user()->role_id;

            switch ($role_id) {
                case 1:
                    return redirect()->intended('/admin');
                    break;
                case 2:
                    return redirect()->intended('/sm');
                    break;
                case 3:
                    return redirect()->intended('/gm');
                    break;
                case 4:
                    return redirect()->intended('/owner');
                    break;
                case 5:
                    return redirect()->intended('/customer');
                    break;
                case 6:
                    return redirect()->intended('/fo');
                    break;
                default:
                    return redirect('/'); // Redirect to a default page or handle the case where the role doesn't match any of the cases.
            }
        }

        // If email or password is incorrect, send an error message.
        return back()->with('error', 'Email or password is incorrect');
    }


    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}