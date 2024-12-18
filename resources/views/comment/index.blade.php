@extends('layouts.app')

@section('content')
<div class="comment-container" id="comment-container">
    <h2 class="text-center mb-4" style="color: black; font-weight: bold; font-size: 24px;">Comentários</h2>
    <a href="javascript:history.back()" class="return">
        <span class=" material-symbols-outlined list-icon-back">
            arrow_back
        </span>Voltar</a>
    </a>
    <div class="attendance-container">
        <div class="attendance-items-container">
            <h4 class="text-center"><b>Protocolo</b>:
                {{ $comments[0]->attendance->id }}
            </h4>
            <h4 class="text-center"><b>Cliente</b>:
                {{ $comments[0]->attendance->client->name }}
            </h4>
            <h4 class="text-center"><b>Data e Hora</b>:
                {{ \Carbon\Carbon::parse($comments[0]->attendance->date)->format('d/m/Y') }} -
                {{$comments[0]->attendance->time}}
            </h4>
            <h4 class="text-center"><b>Descrição</b>:
                {{ $comments[0]->attendance->description }}
            </h4>
            <h4 class="text-center"><b>Tipo</b>:
                {{ $comments[0]->attendance->type->name }}
            </h4>
            <h4 class="text-center"><b>Status</b>:
                {{ $comments[0]->attendance->status }}
            </h4>
        </div>
    </div>



    <div class="table-container">
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Descrição</th>
                    <th>Data</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <div class="d-flex justify-content-center mb-3 margin-left table-action">
                    <a href="{{ route('comment.create', ['attendance_id' => $attendance_id]) }}"
                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 btn-primary">Novo
                        Comentário</a>
                    <button class="no-print btn btn-primary btn-print" onclick="imprimirPagina()"><span
                            class="material-symbols-outlined">
                            print
                        </span>Relatório</button>
                </div>
                @foreach ($comments as $comment)
                    <tr>
                        <td>{{ $comment->id }}</td>
                        <td>{{ $comment->description }}</td>
                        <td>{{ \Carbon\Carbon::parse($comment->created_at)->setTimezone('America/Sao_Paulo')->format('d/m/Y H:i') }}
                        </td>
                        <td class="icon">
                            <a title="Ver Comentário" href="{{ route('comment.show', $comment->id) }}" class="btn "><span
                                    class="material-symbols-outlined list-icon">
                                    folder_eye
                                </span></a>
                            <a title="Editar" href="{{ route('comment.edit', $comment->id) }}" class="btn"><span
                                    class="material-symbols-outlined list-icon-edit list-icon">
                                    stylus
                                </span></a>
                            <form action="{{ route('comment.destroy', $comment->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="attendance_id" value="{{ $comment->attendance_id }}">
                                <button title="Excluir" type="submit" class="btn"
                                    onclick="return confirm('Tem certeza que deseja excluir este comentário?');">
                                    <span class="material-symbols-outlined list-icon-delete list-icon">delete</span>
                                </button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    <script src="{{asset('js/imprimir.js')}}"></script>
</div>

<style>
    .icon {
        justify-content: center;
        display: flex;
    }

    .attendance-items-container h4:first-child {
        width: 100%;
    }

    .attendance-items-container h4 {
        padding: 10px 20px;
        color: black;
        font-size: 15px;
        max-width: 100%;
        text-overflow: ellipsis;
        overflow: hidden;
    }

    .attendance-items-container {
        display: flex;
        justify-content: space-evenly;
        align-content: center;
        flex-wrap: wrap;
    }

    .attendance-container {
        background-color: #f1f1f1;
        width: 100%;
        max-width: 1000px;
        margin: 20px auto;
        border-radius: 10px;
        padding: 15px;
    }

    .return {
        display: flex;
        align-items: center;
        width: 38em;
        justify-content: center;
        margin: 20px 1px;
    }

    .imprimir .return {
        display: none;
    }

    .imprimir .list-icon-back {
        display: none;
    }

    .imprimir .paginate {
        display: none;
    }

    .imprimir .search {
        display: none;
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

    .btn-print {
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .table-action {
        display: flex;
        justify-content: space-between;
        margin: 0 10px;
        flex-direction: row-reverse;
    }

    .list-icon-back {
        font-weight: bold !important;
        font-size: 2em !important;
    }

    .table-container {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .table-action {
        width: 100%;
        max-width: 1000px;
    }

    h2 {
        font-weight: bold;
        color: #343a40;
        margin-bottom: 20px;
        /* Espaçamento abaixo do título */
    }

    table th,
    table td {
        vertical-align: middle;
        /* Centraliza o conteúdo verticalmente */
        padding: 15px;
        /* Espaçamento interno das células */
        border-bottom: 1px solid #dee2e6;
        /* Linha inferior de borda nas células */
        text-align: center;
    }

    table th {
        background-color: #007bff;
        /* Cor de fundo para o cabeçalho */
        color: #fff;
        /* Cor do texto no cabeçalho */
    }

    .table {
        width: 100%;
        /* Largura total da tabela */
        max-width: 1000px;
        /* Largura máxima para a tabela */
        margin: 20px auto;
        /* Centraliza a tabela horizontalmente e adiciona margem superior */
        border-radius: 10px;
        /* Arredondamento das bordas */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        /* Sombra suave ao redor da tabela */
        border-collapse: separate;
        /* Para manter o arredondamento das bordas */
        border-spacing: 0;
        /* Remove espaço entre as células da tabela */
    }

    .table td:first-child {
        border-top-left-radius: 10px;
        /* Arredondamento do primeiro cabeçalho e célula */
        border-bottom-left-radius: 10px;
        /* Arredondamento da primeira célula da última linha */
    }

    .table td:last-child {
        border-top-right-radius: 10px;
        /* Arredondamento do último cabeçalho */
        border-bottom-right-radius: 10px;
        /* Arredondamento da última célula da última linha */

    }

    th:last-child {
        border-radius: 0 5px 0 0;
    }

    th:first-child {
        border-radius: 5px 0 0 0;
    }

    .btn {
        padding: 8px 16px;
        /* Aumenta o espaçamento interno dos botões */
        border-radius: 5px;
        /* Arredondamento dos botões */
        font-size: 14px;
        /* Tamanho da fonte dos botões */
    }

    .btn-group {
        display: flex;
        /* Os botões ficarão alinhados na horizontal */
        justify-content: center;
        /* Centraliza o grupo de botões */
    }

    /* Sombra e margem adicionais ao redor da tabela */
    .table-container {
        border-radius: 10px;
    }

    /* Estilos dos botões para diferentes ações */
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
</style>


@endsection