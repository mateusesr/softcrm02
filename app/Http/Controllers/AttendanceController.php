<?php

namespace App\Http\Controllers;

use App\Models\Attendance; // Certifique-se de que o modelo Attendance está importado
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $clientId = $request->get('client_id'); // Obtém o ID do cliente da requisição

        if ($clientId) {
            $attendances = Attendance::where('client_id', $clientId)->get(); // Filtra atendimentos pelo ID do cliente
        } else {
            $attendances = Attendance::all(); // Caso não tenha ID, busca todos os atendimentos
        }

        return view('attendance.index', compact('attendances')); // Retorna a view com os atendimentos filtrados
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
