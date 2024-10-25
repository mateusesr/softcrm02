@extends('layouts.app')

@section('content')
  <h2 class="text-center mb-4" style="color: white; font-size: 24px;">Listagem de Clientes</h2>

  <!-- Formulário de filtro estilizado -->
  <form method="GET" action="{{ route('client.index') }}" class="mb-3 d-flex justify-content-center" style="padding: 20px;">
    <select name="status" class="form-select me-2" style="width: 150px; border-radius: 8px; padding: 8px; font-size: 16px; color: #333;">
      <option value="" style="background-color: #f9f9f9;">Todos</option>
      <option value="ativo" {{ request('status') == 'ativo' ? 'selected' : '' }} style="background-color: #c6f6d5;">Ativos</option>
      <option value="inativo" {{ request('status') == 'inativo' ? 'selected' : '' }} style="background-color: #f8d7da;">Inativos</option>
    </select>
    <button type="submit" class="btn btn-primary ms-2" style="border-radius: 8px; padding: 8px; font-size: 16px;">Filtrar</button>
  </form>

  <div class="table-container">
    <table class="table table-bordered table-hover table-striped text-center align-middle" style="background-color: white; border-radius: 8px; overflow: hidden;">
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
        @foreach($clients as $client)
          <tr>
            <td>{{ $client->id }}</td>
            <td>{{ $client->name }}</td>
            <td>{{ $client->email }}</td>
            <td>{{ $client->phone }}</td>
            <td>{{ $client->city->name }}</td>
            <td>
              @if($client->is_active)
                <span class="badge bg-success">Ativo</span>
              @else
                <span class="badge bg-danger">Inativo</span>
              @endif
            </td>
            <td>
              <div class="d-flex justify-content-center">
              <br>
                <a href="{{ route('client.edit', $client->id) }}" class="btn btn-sm btn-warning mx-1">Editar</a>
                @if($client->is_active)
                    <form action="{{ route('client.destroy', $client->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <br>
                        <button type="submit" class="btn btn-sm btn-danger mx-1">Inativar</button>
                    </form>
                @else
                    <form action="{{ route('client.reactivate', $client->id) }}" method="POST" class="d-inline">
                        @csrf
                        <br>
                        <button type="submit" class="btn btn-sm btn-success mx-1">Reativar</button>
                    </form>
                @endif
                <br>
                <a href="{{ route('attendance.index', ['client_id' => $client->id]) }}" class="btn btn-sm btn-primary mx-1">Atendimentos</a>
              </div>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  @if(session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
  @endif

<!-- CSS inline para estilizar a tabela e centralização -->
<style>
  h2 {
    font-weight: bold;
    color: #343a40;
    margin-bottom: 20px;
  }
  
  table th, table td {
    vertical-align: middle;
    padding: 15px;
    border-bottom: 1px solid #dee2e6;
  }
  
  table th {
    background-color: #007bff;
    color: #fff;
  }
  
  .table {
    width: 100%;
    max-width: 1000px;
    margin: 20px auto;
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
    padding: 100px;
    background-color: #f8f9fa;
    border-radius: 10px;
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
    margin-bottom: 40px;
  }

  .btn-warning { background-color: #ffc107; border-color: #ffc107; color: #212529; }
  .btn-danger { background-color: #dc3545; border-color: #dc3545; color: white; }
  .btn-secondary { background-color: #6c757d; border-color: #6c757d; color: white; }
  .btn-primary { background-color: #007bff; border-color: #007bff; color: white; }
  .btn-success { background-color: #28a745; border-color: #28a745; color: white; } /* Estilo para o botão Reativar */
</style>
@endsection
