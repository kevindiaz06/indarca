<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmpresaController extends Controller
{
    /**
     * Constructor para aplicar middleware de autenticación y roles
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin,trabajador');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = Empresa::all();

        // Verificar si la solicitud viene del panel de administración
        if (request()->is('admin*')) {
            return view('admin.empresas.index', compact('empresas'));
        }

        return view('empresas.index', compact('empresas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Verificar si la solicitud viene del panel de administración
        if (request()->is('admin*')) {
            return view('admin.empresas.create');
        }

        return view('empresas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tipo_cliente' => 'required|in:Cliente Habitual,Colaborador,Patrocinador',
            'destacado' => 'nullable|boolean',
        ]);

        $data = [
            'nombre' => $request->nombre,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
            'tipo_cliente' => $request->tipo_cliente,
            'destacado' => $request->has('destacado'),
        ];

        // Manejo de la imagen
        if ($request->hasFile('logo')) {
            $archivo = $request->file('logo');
            $nombreArchivo = time() . '_' . $archivo->getClientOriginalName();

            // Guardar en storage/app/public/logos
            $path = $archivo->storeAs('logos', $nombreArchivo, 'public');
            $data['logo'] = $path;
        }

        Empresa::create($data);

        // Verificar si la solicitud viene del panel de administración
        if (request()->is('admin*')) {
            return redirect()->route('admin.empresas')
                ->with('success', 'Empresa creada exitosamente.');
        }

        return redirect()->route('empresas.index')
            ->with('success', 'Empresa creada exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empresa = Empresa::findOrFail($id);

        // Verificar si la solicitud viene del panel de administración
        if (request()->is('admin*')) {
            return view('admin.empresas.show', compact('empresa'));
        }

        return view('empresas.show', compact('empresa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empresa = Empresa::findOrFail($id);

        // Verificar si la solicitud viene del panel de administración
        if (request()->is('admin*')) {
            return view('admin.empresas.edit', compact('empresa'));
        }

        return view('empresas.edit', compact('empresa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $empresa = Empresa::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tipo_cliente' => 'required|in:Cliente Habitual,Colaborador,Patrocinador',
            'destacado' => 'nullable|boolean',
        ]);

        $empresa->nombre = $request->nombre;
        $empresa->direccion = $request->direccion;
        $empresa->telefono = $request->telefono;
        $empresa->tipo_cliente = $request->tipo_cliente;
        $empresa->destacado = $request->has('destacado');

        // Manejo de la imagen
        if ($request->hasFile('logo')) {
            // Eliminar imagen anterior si existe
            if ($empresa->logo && \Storage::disk('public')->exists($empresa->logo)) {
                \Storage::disk('public')->delete($empresa->logo);
            }

            $archivo = $request->file('logo');
            $nombreArchivo = time() . '_' . $archivo->getClientOriginalName();

            // Guardar en storage/app/public/logos
            $path = $archivo->storeAs('logos', $nombreArchivo, 'public');
            $empresa->logo = $path;
        }

        $empresa->save();

        // Verificar si la solicitud viene del panel de administración
        if (request()->is('admin*')) {
            return redirect()->route('admin.empresas')
                ->with('success', 'Empresa actualizada exitosamente.');
        }

        return redirect()->route('empresas.index')
            ->with('success', 'Empresa actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empresa = Empresa::findOrFail($id);
        $empresa->delete();

        if (request()->is('admin*')) {
            return redirect()->route('admin.empresas')
                ->with('success', 'Empresa eliminada exitosamente.');
        }

        return redirect()->route('empresas.index')
            ->with('success', 'Empresa eliminada exitosamente.');
    }
}
