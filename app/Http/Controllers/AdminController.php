<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Centro;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function admin()
    {
        $totalUsers = User::count();
        $totalCentros = Centro::count();
        $centrosActivos = Centro::where('estado', 'activo')->count();

        return view('admin.index', compact('totalUsers', 'totalCentros', 'centrosActivos'));
    }
}
