@extends('layouts.app')

@section('content')
<div class="client-container">
  <h2 class="text-center mb-4" style="color: black; font-size: 24px;">Listagem de Clientes</h2>
  <button class="no-print" onclick="imprimirPagina()">Imprimir</button>
  <form method="GET" action="{{ route('client.index') }}" class="mb-3 d-flex justify-content-center" style="padding: 20px;">
    <select name="status" class="form-select me-2"
      style="width: 150px; border-radius: 8px; padding: 8px; font-size: 16px; color: #333;">
      <option value="" style="background-color: #f9f9f9;">Todos</option>
      <option value="ativo" {{ request('status') == 'ativo' ? 'selected' : '' }} style="background-color: #c6f6d5;">
        Ativos</option>
      <option value="inativo" {{ request('status') == 'inativo' ? 'selected' : '' }}
        style="background-color: #f8d7da;">Inativos</option>
    </select>
    <button type="submit" class="btn btn-primary ms-2"
      style="border-radius: 8px; padding: 8px; font-size: 16px;">Filtrar</button>
  </form>

  <div class="table-container">
    <table class="table table-bordered table-hover table-striped text-center align-middle"
      style="background-color: white; border-radius: 8px; overflow: hidden;">
      <thead class="thead-dark">
        <tr>
          <th>ID</th>
          <th>Nome</th>
          <th>Email</th>
          <th>Telefone</th>
          <th>Cidade</th>
          <th>Status</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>

        <div class="d-flex justify-content-center mb-3 margin-left">
          <a href="{{ route('clients.create') }}" class="btn btn-primary">Novo Cliente</a>
        </div>

        @foreach ($clients as $client)
        <tr>
          <td>{{ $client->id }}</td>
          <td>{{ $client->name }}</td>
          <td>{{ $client->email }}</td>
          <td>{{ $client->phone }}</td>
          <td>{{ $client->city->name }}</td>
          <td>
            @if ($client->is_active)
            <span class="badge bg-success">Ativo</span>
            @else
            <span class="badge bg-danger">Inativo</span>
            @endif
          </td>
          <td>
            <div class="d-flex justify-content-center">

              <a href="{{ route('client.edit', $client->id) }}"
              title="Editar Cliente" class="btn btn-sm mx-1"><span class="material-symbols-outlined list-icon-edit list-icon">
                  stylus
                </span></a>
              @if ($client->is_active)
              <form action="{{ route('client.desactivate', $client->id) }}" method="POST"
                class="d-inline">
                @csrf
                @method('DELETE')

                <button title="Inativar Cliente" type="submit" class="btn btn-sm mx-1"><span class="material-symbols-outlined list-icon-add list-icon-check list-icon ">
                  </span></button>
              </form>
              @else
              <form action="{{ route('client.reactivate', $client->id) }}" method="POST"
                class="d-inline">
                @csrf
                <button title="Ativar Cliente" type="submit" class="btn btn-sm mx-1"><span class="material-symbols-outlined list-icon-delete list-icon-cancel list-icon">
                  </span></button>
              </form>
              @endif
              <a title="Ver Atendimentos" href="{{ route('attendance.index', ['client_id' => $client->id]) }}"
                class="btn btn-sm mx-1"><span class="material-symbols-outlined list-icon">
                  table_eye
                </span></a>
            </div>
            @endforeach
      </tbody>
    </table>
  </div>
  <script src="{{asset('js/imprimir.js')}}"></script>
  @if (session('message'))
  <div class="alert alert-success">
    {{ session('message') }}
  </div>
  @endif
</div>
<!-- CSS inline para estilizar a tabela e centralização -->
<style>
  h2 {
    font-weight: bold;
    color: #343a40;
    margin-bottom: 20px;
  }

  table th,
  table td {
    vertical-align: middle;
    padding: 15px;
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
    margin: 0 5px;
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

  /* Estilo para o botão Reativar */
</style>
@endsection