<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth'); // Ensure the user is authenticated
    }

    /**
     * Show the application dashboard or redirect based on user role.
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();

        // Redirect based on the user's role
        if ($user->role == 'admin') {
            return view('layouts.admin');
        } elseif ($user->role == 'author') {
            return view('layouts.author');
        } elseif ($user->role == 'user') {
            return view('layouts.app');
        }

        // If the role doesn't match any of the expected roles, redirect to home
        return redirect('/');
    }
}
