<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function cek()
    {
        if (auth()->check()) {
            $role_id = auth()->user()->role_id;
            switch ($role_id) {
                case 1:
                    return redirect('/admin');
                    break;
                case 2:
                    return redirect('/sm');
                    break;
                case 3:
                    return redirect('/gm');
                    break;
                case 4:
                    return redirect('/owner');
                    break;
                case 5:
                    return redirect('/customer');
                    break;
                case 6:
                    return redirect('/fo');
                    break;
                default:
                    return redirect('/'); // Redirect to a default page or handle the case where the role doesn't match any of the cases.
            }
        } else {
            return redirect('/'); // Redirect to the login page if the user is not authenticated.
        }

    }
}