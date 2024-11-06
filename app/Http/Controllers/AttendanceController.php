<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Client;
use App\Models\Type;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendances = Attendance::all();
        return view('attendance.index', compact('attendances'));
    }

    public function create()
    {
        $clients = Client::all();
        $types = Type::all();
        return view('attendance.create', compact('clients', 'types'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'type_id' => 'required|exists:types,id',
            'date' => 'required|date',
            'status' => 'required|boolean',
            'description' => 'required|string|max:255',
        ]);

        Attendance::create($request->all());

        return redirect()->route('attendance.index')->with('success', 'Atendimento criado com sucesso.');
    }

    public function show(Attendance $attendance)
    {
        return view('attendance.show', compact('attendance'));
    }

    public function edit(Attendance $attendance)
    {
        $clients = Client::all();
        $types = Type::all();
        return view('attendance.edit', compact('attendance', 'clients', 'types'));
    }

    public function update(Request $request, Attendance $attendance)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'type_id' => 'required|exists:types,id',
            'date' => 'required|date',
            'status' => 'required|boolean',
            'description' => 'required|string|max:255',
        ]);

        $attendance->update($request->all());

        return redirect()->route('attendance.index')->with('success', 'Atendimento atualizado com sucesso.');
    }

    public function destroy(Attendance $attendance)
    {
        $attendance->delete();

        return redirect()->route('attendance.index')->with('success', 'Atendimento excluído com sucesso.');
    }
}
