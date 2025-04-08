<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;
use Illuminate\Http\Request;

class SobreNosotrosController extends Controller
{
    public function index()
    {
        // Cargar miembros del equipo activos ordenados por el campo display_order
        $teamMembers = TeamMember::where('active', true)
                                ->orderBy('display_order')
                                ->get();

        return view('sobreNosotros', compact('teamMembers'));
    }
}
