<?php

namespace App\Http\Controllers;

use App\Models\Attendance; // Certifique-se de que o modelo Attendance está importado
use App\Models\Client; // Certifique-se de que o modelo Client está importado
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $clientId = $request->get('client_id');

        if ($clientId) {
            $attendances = Attendance::where('client_id', $clientId)->get();
        } else {
            $attendances = Attendance::all();
        }

        return view('attendance.index', compact('attendances'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('attendance.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $attendance = Attendance::create($request->toArray());

        return view("attendance.create", compact('attendance'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $attendance = Attendance::findOrFail($id);
        $clients = Client::all(); // Se precisar listar clientes para seleção
        return view('attendance.edit', compact('attendance', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $attendance = Attendance::findOrFail($id);
        $attendance->update($request->only(['client_id', 'type_id', 'date', 'status', 'description']));

        return redirect()->route('attendance.index')->with('message', 'Atendimento atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function desactivate(string $id)
    {
        //
    }
}
