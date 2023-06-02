<?php

namespace App\Http\Controllers;

use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->hasRole('admin')) {
            return redirect()->route('admin.dasboard');
        } elseif (Auth::user()->hasRole('doctor')) {
            return redirect()->route('doctor.dasboard');
        } elseif (Auth::user()->hasRole('patient')) {
            return redirect()->route('patient.dasboard');
        } else {
            abort(403, 'Unauthorized action.');
        }
    }
}
