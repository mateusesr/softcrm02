<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Client;
use App\Models\Type;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
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

    public function create()
    {
        return view('attendance.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'status' => 'required|boolean',
            // Adicione outras validações conforme necessário
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
        return view('attendance.edit', compact('attendance', 'clients'));
    }

    public function update(Request $request, Attendance $attendance)
    {
        $request->validate([
            'date' => 'required|date',
            'status' => 'required|boolean',
            // Adicione outras validações conforme necessário
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