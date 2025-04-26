@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between mb-3">
        <h2>Minhas Tarefas</h2>
        <a href="{{ route('tasks.create') }}" class="btn btn-primary">Nova Tarefa</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="mb-3">
    <form method="GET" action="{{ route('tasks.index') }}" class="form-inline">
        <div class="input-group">
            <select name="status" class="form-select" onchange="this.form.submit()">
                <option value="Todas" {{ (request('status') == 'Todas' || !request('status')) ? 'selected' : '' }}>Todas</option>
                <option value="Pendente" {{ request('status') == 'Pendente' ? 'selected' : '' }}>Pendentes</option>
                <option value="Concluída" {{ request('status') == 'Concluída' ? 'selected' : '' }}>Concluídas</option>
            </select>
            <button class="btn btn-secondary" type="submit">Filtrar</button>
        </div>
    </form>
</div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Título</th>
                <th>Descrição</th>
                <th>Status</th>
                <th>Criado em</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($tasks as $task)
                <tr>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->description }}</td>
                    <td>{{ $task->status }}</td>
                    <td>{{ $task->created_at->format('d/m/Y') }}</td>
                    <td>
                        <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja deletar?')">Deletar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Nenhuma tarefa encontrada.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-3">
        {{ $tasks->links() }} <!-- Paginação -->
    </div>
</div>
@endsection
