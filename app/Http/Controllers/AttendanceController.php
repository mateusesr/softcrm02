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
        $client_id = $request->get('client_id');
        if ($client_id) {
            $attendances = Attendance::where('client_id', $client_id)->get();
        } else {
            $attendances = Attendance::all();
        }
        return view('attendance.index', compact('attendances'));
    }

    public function create(Request $request)

    {
        $client_id = $request->get('client_id'); 
        $clients = Client::all(); 
        $types = Type::all(); 

        return view('attendance.create', compact('client_id', 'clients', 'types'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'date' => 'required|date',
            'status' => 'required|in:1,2,3',
            'type_id' => 'required|exists:types,id',
            'description' => 'required|string|max:255',
        ]);

        Attendance::create($request->all());

        return redirect()->route('attendance.index', ['client_id' => $request->client_id])->with('success', 'Atendimento criado com sucesso.');
    }

    public function show(Attendance $attendance)
    {
        return view('attendance.show', compact('attendance'));
    }

    public function edit(Request $request, Attendance $attendance)
    {
        $client_id = $request->get('client_id'); 
        $clients = Client::all();
        $types = Type::all();
        return view('attendance.edit', compact('attendance', 'client_id', 'clients', 'types'));
    }

    public function update(Request $request, Attendance $attendance)
    {
        $request->validate([
            'date' => 'required|date',
            'status' => 'required|boolean',
        ]);

        $attendance->update($request->all());

        return redirect()->route('attendance.index', ['client_id' => $request->client_id])->with('success', 'Atendimento criado com sucesso.');
    }

    public function destroy(Request $request, Attendance $attendance)
    {
        $attendance->delete();

        return redirect()->route('attendance.index', ['client_id' => $request->client_id])->with('success', 'Atendimento criado com sucesso.');
    }
}
