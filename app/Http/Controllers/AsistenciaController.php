<?php

namespace App\Http\Controllers;

use App\Models\Asistencia;
use App\Models\Estudiante;
use App\Models\EstudianteGrupo;
use App\Models\Grupo;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AsistenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Asistencia::query();

        if ($request->has('estudiante_id') && is_numeric($request->estudiante_id)) {
            $query->where('estudiante_id', $request->estudiante_id);
        }
        if ($request->has('grupo_id') && is_numeric($request->grupo_id)) {
            $query->where('grupo_id', $request->grupo_id);
        }

        //ordner la query de estudiante y grupo por id desc y con un simple paginado de 10
        $asistencias = $query->with('estudiante', 'grupo')->orderBy('id', 'desc')->simplePaginate(10);

        $estudiantes = Estudiante::all();
        $grupos = Grupo::all();

        return view('asistencias.index', compact('asistencias', 'estudiantes', 'grupos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $estudiantes = Estudiante::all();
        $grupos = Grupo::all();
        return view('asistencias.create', compact('estudiantes', 'grupos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Verificar que se haya enviado el PIN del estudiante
        $request->validate([
            'pin' => 'required|string',
        ]);

        // Buscar el estudiante por el PIN

        $estudiante = Estudiante::where('pin', $request->pin)->first();

        // Verificar que el estudiante exista
        if (!$estudiante) {
            return response()->json(['error' => 'Estudiante no encontrado'], 404);
        }
        $estudianteGrupo=  EstudianteGrupo::where('estudiante_id',$estudiante->id)->first();
        // Verificar que el estudiante tenga un grupo asignado
        if (!$estudianteGrupo->grupo_id) {
            return response()->json(['error' => 'El estudiante no tiene un grupo asignado'], 404);
        }

        // Crear la asistencia con la fecha y hora actual
        $asistencia = Asistencia::create([
            'estudiante_id' => $estudiante->id,
            'grupo_id' => $estudianteGrupo->grupo_id,
            'fecha' => Carbon::now()->toDateString(),
            'hora_entrada' => Carbon::now()->toTimeString(),
        ]);

        return redirect()->route('asistencias.index')->with('success', 'Asistencia creada correctamente');
    }
}
