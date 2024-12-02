@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<div class="dashboard-container">
    <h2 class="text-center mb-4" style="color: black; font-weight: bold; font-size: 24px;">Dashboard</h2>

    <div class="recent-attendances">
        <h2 style="color: black; font-weight: bold; font-size: 22px;">Últimos Atendimentos</h2>
        @if($recentAttendances->isNotEmpty())
            <table class="table table-bordered table-striped table-action">
                <thead>
                    <tr>
                        <th>Protocolo</th>
                        <th>Nome do Cliente</th>
                        <th>Data</th>
                        <th>Hora</th>
                        <th>Status</th>
                        <th>Tipo</th>
                        <th>Descrição</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recentAttendances as $attendance)
                        <tr>
                            <td>{{ $attendance->id }}</td>
                            <td>{{ $attendance->client->name }}</td>
                            <td>{{ \Carbon\Carbon::parse($attendance->date)->format('d/m/Y') }}</td>
                            <td>{{ $attendance->time }}</td>
                            <td>{{ $attendance->status }}</td>
                            <td>{{ $attendance->type->name }}</td>
                            <td>{{ $attendance->description }}</td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <a title="Ver Atendimento"
                                        href="{{ route('attendance.index', ['attendance_id' => $attendance->id]) }}"
                                        class="btn btn-sm mx-1">
                                        <span class="material-symbols-outlined list-icon">table_eye</span>
                                    </a>
                                </div>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Nenhum atendimento recente.</p>
        @endif
    </div>
    <div class="urgent-attendances" style="margin-top: 40px;">
        <h2 style="color: black; font-weight: bold; font-size: 22px;">Atendimentos Urgentes</h2>
        @if($urgentAttendances->isNotEmpty())
            <table class="table table-bordered table-striped table-action">
                <thead>
                    <tr>
                        <th>Protocolo</th>
                        <th>Nome do Cliente</th>
                        <th>Data</th>
                        <th>Hora</th>
                        <th>Status</th>
                        <th>Tipo</th>
                        <th>Descrição</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($urgentAttendances as $attendance)
                        <tr>
                            <td>{{ $attendance->id }}</td>
                            <td>{{ $attendance->client->name }}</td>
                            <td>{{ \Carbon\Carbon::parse($attendance->date)->format('d/m/Y') }}</td>
                            <td>{{ $attendance->time }}</td>
                            <td>{{ $attendance->status }}</td>
                            <td>{{ $attendance->type->name }}</td>
                            <td>{{ $attendance->description }}</td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <a title="Ver Atendimento"
                                        href="{{ route('attendance.index', ['attendance_id' => $attendance->id]) }}"
                                        class="btn btn-sm mx-1">
                                        <span class="material-symbols-outlined list-icon">table_eye</span>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Nenhum atendimento urgente.</p>
        @endif
    </div>
</div>
<br><br>

<body>
    <style>
        .table-action {
            border-radius: 20px;
        }

        .recent-attendances,
        .urgent-attendances {
            margin-top: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .recent-attendances table,
        .urgent-attendances table {
            width: 100%;
            border-collapse: collapse;
        }

        .recent-attendances th,
        .urgent-attendances th,
        .recent-attendances td,
        .urgent-attendances td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
        }

        .recent-attendances th,
        .urgent-attendances th {
            background-color: #007bff;
            color: white;
            font-weight: bold;
        }
    </style>
</body>

</html>
@endsection