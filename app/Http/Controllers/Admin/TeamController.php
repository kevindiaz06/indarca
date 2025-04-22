<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class TeamController extends Controller
{
    /**
     * Constructor con middleware para asegurar que solo los administradores tengan acceso
     */
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin']);
    }

    /**
     * Mostrar listado de miembros del equipo
     */
    public function index()
    {
        $teamMembers = TeamMember::with('user')->orderBy('display_order')->get();
        return view('admin.team.index', compact('teamMembers'));
    }

    /**
     * Mostrar formulario para crear un nuevo miembro
     */
    public function create()
    {
        $users = User::where('role', 'trabajador')->whereDoesntHave('teamMember')->get();
        return view('admin.team.create', compact('users'));
    }

    /**
     * Almacenar un nuevo miembro en la base de datos
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'short_description' => 'nullable|string|max:150',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'user_id' => 'nullable|exists:users,id',
            'active' => 'nullable|boolean',
            'display_order' => 'integer',
            'social_networks' => 'nullable|array',
            'social_networks.*.name' => 'nullable|string',
            'social_networks.*.url' => 'nullable|url',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->except('image');

        // Manejo explícito del checkbox active
        $data['active'] = $request->has('active') ? true : false;

        // Asignar el siguiente número de orden si no se proporciona
        if (!isset($data['display_order'])) {
            $maxOrder = TeamMember::max('display_order');
            $data['display_order'] = $maxOrder !== null ? $maxOrder + 1 : 0;
        }

        // Manejo de la imagen
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('team', 'public');
            $data['image'] = $imagePath;
        }

        // Formato para redes sociales
        if (isset($data['social_networks'])) {
            $socialNetworks = [];
            foreach ($data['social_networks'] as $network) {
                // Solo añadir si ambos, nombre y URL, están presentes
                if (!empty($network['name']) && !empty($network['url'])) {
                    $socialNetworks[] = [
                        'name' => $network['name'],
                        'url' => $network['url'],
                        'icon' => $this->getSocialIcon($network['name']),
                    ];
                }
            }

            // Si hay redes sociales, guardarlas; si no, establecer como array vacío
            $data['social_networks'] = !empty($socialNetworks) ? $socialNetworks : [];
        } else {
            // Si no se proporcionan redes sociales, establecer como array vacío
            $data['social_networks'] = [];
        }

        TeamMember::create($data);

        return redirect()->route('admin.team.index')
            ->with('success', 'Miembro del equipo creado correctamente');
    }

    /**
     * Mostrar formulario para editar un miembro
     */
    public function edit(TeamMember $teamMember)
    {
        $users = User::where('role', 'trabajador')
            ->where(function($query) use ($teamMember) {
                $query->whereDoesntHave('teamMember')
                    ->orWhereHas('teamMember', function($q) use ($teamMember) {
                        $q->where('id', $teamMember->id);
                    });
            })
            ->get();

        return view('admin.team.edit', compact('teamMember', 'users'));
    }

    /**
     * Actualizar un miembro en la base de datos
     */
    public function update(Request $request, TeamMember $teamMember)
    {
        // Validar si la imagen es requerida solo cuando no existe imagen previa
        $imageRule = $teamMember->image ? 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' : 'required|image|mimes:jpeg,png,jpg,gif|max:2048';

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'short_description' => 'nullable|string|max:150',
            'image' => $imageRule,
            'user_id' => 'nullable|exists:users,id',
            'active' => 'nullable|boolean',
            'display_order' => 'integer',
            'social_networks' => 'nullable|array',
            'social_networks.*.name' => 'nullable|string',
            'social_networks.*.url' => 'nullable|url',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->except('image');

        // Manejo explícito del checkbox active
        $data['active'] = $request->has('active') ? true : false;

        // Manejo de la imagen
        if ($request->hasFile('image')) {
            // Eliminar imagen anterior si existe
            if ($teamMember->image) {
                Storage::disk('public')->delete($teamMember->image);
            }

            $imagePath = $request->file('image')->store('team', 'public');
            $data['image'] = $imagePath;
        }

        // Formato para redes sociales
        if (isset($data['social_networks'])) {
            $socialNetworks = [];
            foreach ($data['social_networks'] as $network) {
                // Solo añadir si ambos, nombre y URL, están presentes
                if (!empty($network['name']) && !empty($network['url'])) {
                    $socialNetworks[] = [
                        'name' => $network['name'],
                        'url' => $network['url'],
                        'icon' => $this->getSocialIcon($network['name']),
                    ];
                }
            }

            // Si hay redes sociales, guardarlas; si no, establecer como array vacío
            $data['social_networks'] = !empty($socialNetworks) ? $socialNetworks : [];
        } else {
            // Si no se proporcionan redes sociales, establecer como array vacío
            $data['social_networks'] = [];
        }

        $teamMember->update($data);

        return redirect()->route('admin.team.index')
            ->with('success', 'Miembro del equipo actualizado correctamente');
    }

    /**
     * Eliminar un miembro del equipo
     */
    public function destroy(TeamMember $teamMember)
    {
        // Eliminar imagen si existe
        if ($teamMember->image) {
            Storage::disk('public')->delete($teamMember->image);
        }

        $teamMember->delete();

        return redirect()->route('admin.team.index')
            ->with('success', 'Miembro del equipo eliminado correctamente');
    }

    /**
     * Actualizar el orden de visualización de los miembros
     */
    public function updateOrder(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'order' => 'required|array',
            'order.*' => 'exists:team_members,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }

        foreach ($request->order as $index => $id) {
            TeamMember::where('id', $id)->update(['display_order' => $index]);
        }

        return response()->json(['success' => true]);
    }

    /**
     * Obtener el ícono correspondiente para una red social
     */
    private function getSocialIcon($name)
    {
        $icons = [
            'facebook' => 'bi bi-facebook',
            'x' => 'bi bi-twitter-x',
            'instagram' => 'bi bi-instagram',
            'linkedin' => 'bi bi-linkedin',
            'youtube' => 'bi bi-youtube',
            'github' => 'bi bi-github',
        ];

        $name = strtolower($name);

        if (array_key_exists($name, $icons)) {
            return $icons[$name];
        }

        // Intentar coincidencias parciales
        foreach ($icons as $key => $icon) {
            if (strpos($name, $key) !== false) {
                return $icon;
            }
        }

        // Icono predeterminado
        return 'bi bi-link';
    }
}
