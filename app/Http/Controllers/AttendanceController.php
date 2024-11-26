<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Client;
use App\Models\Type;
use App\Models\Comment;
use Illuminate\Http\Request;


class AttendanceController extends Controller
{
    public function index(Request $request)
    {
        
        // Consulta inicial com relacionamentos
        $query = Attendance::with('type');

        if ($request->has('attendance_id') && $request->attendance_id !== '') {
            $query->where('id', $request->attendance_id);
        }
        // Filtrar por status
        if ($request->has('status') && $request->status !== '') {
            switch ($request->status) {
                case 'pendente':
                    $query->where('status', 'pendente');
                    break;
                case 'urgente':
                    $query->where('status', 'urgente');
                    break;
                case 'finalizado':
                    $query->where('status', 'finalizado');
                    break;
            }
        }

        if ($request->has('sort') && $request->has('direction')) {
            $query->orderBy($request->sort, $request->direction);
        }
        // Filtrar por client_id, se fornecido
        if ($request->has('client_id') && $request->client_id !== '') {
            $query->where('client_id', $request->client_id);
        }

        $attendances = $query->paginate(10);

        // Enviar os resultados para a view
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

        $client_id = $request->get('client_id');
        $types = Type::all();
        $clients = Client::all();
        $attendance = Attendance::create($request->toArray());
        return view("attendance.create", compact('attendance', 'clients', 'types', 'client_id'));
    }

    public function show(Attendance $attendance)
    {

        return view('attendance.show', compact('attendance'));
    }

    public function edit($id)
    {
        $attendance = Attendance::findOrFail($id);
        $clients = Client::all(); // Se precisar listar clientes para seleção
        $types = Type::all(); // Obter todos os tipos
        return view('attendance.edit', compact('attendance', 'clients', 'types'));
    }

    public function getRecentAttendances($limit = 5)
    {
        return Attendance::with('client', 'type')
            ->orderBy('date', 'desc') // Ordena pela data mais recente
            ->take($limit) // Limita os resultados
            ->get();
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'date' => 'required|date',
            'status' => 'required|in:1,2,3',
            'type_id' => 'required|exists:types,id',
            'description' => 'required|string|max:255',
        ]);

        $attendance = Attendance::findOrFail($id);
        $attendance->update($request->all());

        return redirect()->route('attendance.index', ['client_id' => $attendance->client_id])->with('success', 'Atendimento atualizado com sucesso.');
    }

    public function destroy(Request $request, Attendance $attendance)
    {
        $client_id = $request->input('client_id');
        $attendance->delete();

        return redirect()->route('attendance.index', ['client_id' => $client_id])
            ->with('success', 'Atendimento excluído com sucesso.');
    }
}
