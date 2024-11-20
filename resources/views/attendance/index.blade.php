@extends('layouts.app')

@section('content')
<div class="main">
    <div class="attendance-container" id="attendance-container">
        <h2 class="text-center mb-4" style="color: black; font-weight: bold; font-size: 24px;">Atendimentos</h2>

        @if (request()->get('client_id'))
        <h4 class="text-center mb-4" style="color: gray; font-size: 15px;">Atendimentos para o Cliente ID:
            {{ request()->get('client_id') }}
        </h4>
        @endif

        <form method="GET" action="{{ route('attendance.index') }}" class="mb-3 d-flex justify-content-center"
            style="padding: 20px;">
            <select name="status" class="form-select me-2"
                style="width: 150px; border-radius: 8px; padding: 8px; font-size: 16px; color: #333;">
                <option value="" style="background-color: #f9f9f9;">Todos</option>
                <option value="pendente" {{ request('status') == 'pendente' ? 'selected' : '' }}
                    style="background-color: yellow;">Pendentes</option>
                <option value="urgente" {{ request('status') == 'urgente' ? 'selected' : '' }}
                    style="background-color:  #f8d7da; ">Urgentes</option>
                <option value="finalizado" {{ request('status') == 'finalizado' ? 'selected' : '' }}
                    style="background-color:  #c6f6d5; ">Finalizados</option>
            </select>
            <button type="submit" class="btn btn-primary ms-2"
                style="border-radius: 8px; padding: 8px; font-size: 16px;">
                Filtrar Atendimentos por Status
            </button>
        </form>


        <div class="table-container">
            @if (request()->get('client_id'))
            <div class="d-flex justify-content-center mb-3 table-action">
                <a href="{{ route('attendance.create', ['client_id' => request()->get('client_id')]) }}"
                    class="btn btn-primary">Novo Atendimento</a>
                @endif
            </div>
            <table class="table table-bordered table-hover table-striped text-center align-middle"
                style="background-color: white; border-radius: 8px; overflow: hidden;">
                <thead class="thead-dark">
                    <tr>
                        <th>Protocolo</th>
                        <th>Cliente</th>
                        <th>Data</th>
                        <th>Status</th>
                        <th>Tipo</th>
                        <th>Descrição</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <div class="d-flex justify-content-center mb-3 margin-left table-action">
                        <button class="no-print btn btn-primary" onclick="imprimirPagina()">Imprimir</button>
                    </div>
                    @foreach ($attendances as $attendance)
                    <tr>
                        <td>{{ $attendance->id }}</td>
                        <td>{{ $attendance->client->name }}</td>
                        <td>{{ \Carbon\Carbon::parse($attendance->date)->format('d/m/Y') }}</td>
                        <td>{{ $attendance->status }}</td>
                        <td>{{ $attendance->type->name }}</td>
                        <td>{{ $attendance->description }}</td>

                        <td>
                            <div class="d-flex justify-content-center">
                                <a title="Editar Atendimento" href="{{ route('attendance.edit', $attendance->id) }}"
                                    class="btn btn-sm mx-1"><span
                                        class="material-symbols-outlined list-icon-edit list-icon">
                                        stylus
                                    </span></a>
                                <form action="{{ route('attendances.destroy', $attendance->id) }}" method="POST"
                                    onsubmit="return confirm('Tem certeza que deseja excluir este atendimento?');">
                                    @csrf
                                    @method('DELETE')
                                    <button title="Excluir Atendimento" type="submit" class="btn btn-sm mx-1"><span
                                            class="material-symbols-outlined list-icon-delete list-icon">
                                            delete
                                        </span></button>
                                </form>

                                <a title="Ver Comentários Desse Atendimento"
                                    href="{{ route('comment.index', ['attendance_id' => $attendance->id]) }}"
                                    class="btn"><span class="material-symbols-outlined list-icon">
                                        forum
                                    </span></a>

                                <a title="Criar Comentário Sobre o Atendimento"
                                    href="{{ route('comment.create', ['attendance_id' => $attendance->id]) }}"
                                    class="btn"><span class="material-symbols-outlined list-icon-add list-icon">
                                        note_add
                                    </span></a>

                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="d-flex justify-content-center">
                {{ $attendances->links() }}
            </div> <br><br>

        </div>



        <script src="{{asset('js/imprimir.js')}}"></script>
    </div>

    <style>
        .main {
            display: flex;
            justify-content: center;
        }

        .attendance-container {
            display: flex;
            flex-direction: column;
            width: 100%;
            max-width: 1000px;
        }

        .form-select:focus {
            border-color: #007bff;
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.5);
        }

        .form-select {
            width: 250px;
            padding: 10px;
            border: 2px solid #ccc;
            border-radius: 25px;
            font-size: 16px;
            outline: none;
        }

        .btn-search:focus {
            outline: none;
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.5);
        }

        .row {
            display: flex;
            align-items: baseline;
            gap: 5px;
            margin: 20px 0px;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.5);
        }

        .form-control {
            width: 250px;
            padding: 10px;
            border: 2px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
            outline: none;
        }

        .no-print {
            margin: 0 5px;
        }

        .table-action {
            display: flex;
            justify-content: space-between;
            margin: 0 10px;
        }

        .imprimir .btn {
            display: none;
        }

        .imprimir th:last-child {
            display: none;
        }

        .imprimir .table-action {
            display: none;
        }


        h2 {
            font-weight: bold;
            color: #343a40;
            margin-bottom: 20px;
        }

        table th,
        table td {
            vertical-align: middle;
            padding: 15px 10px;
            border-bottom: 1px solid #dee2e6;
        }

        table th {
            background-color: #007bff;
            color: #fff;
        }


        .client-container {
            max-width: max-content;
            margin: 0 auto;
        }

        .margin-left {
            margin-left: 15px !important;
        }

        .table {
            width: 100%;
            max-width: 1000px;
            margin: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-collapse: separate;
            border-spacing: 0;
        }

        .table td:first-child {
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
        }

        .table td:last-child {
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
        }

        .btn {
            margin: 0 8px;
            padding: 8px 16px;
            border-radius: 5px;
            font-size: 14px;
        }

        .btn-group {
            display: flex;
            justify-content: center;
        }

        .table-container {
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            flex-wrap: wrap;
            align-content: center;
            justify-content: center;
        }

        .btn-warning {
            background-color: #ffc107;
            border-color: #ffc107;
            color: #212529;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
            color: white;
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
            color: white;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            color: white;
        }



        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
            color: white;
        }
    </style>
    @endsection