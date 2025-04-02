<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PoliticasPrivacidadController extends Controller
{
    public function index()
    {
        return view('politicas-privacidad');
    }
}