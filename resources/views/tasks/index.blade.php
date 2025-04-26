@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Minhas Tarefas</h2>
        <a href="{{ route('tasks.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i> Nova Tarefa
        </a>
    </div>

    <!-- Filtro -->
    <form method="GET" class="d-flex gap-2 mb-4">
        <select name="status" class="form-select w-auto">
            <option value="">Todas</option>
            <option value="Pendente" {{ request('status') == 'Pendente' ? 'selected' : '' }}>Pendente</option>
            <option value="Concluída" {{ request('status') == 'Concluída' ? 'selected' : '' }}>Concluída</option>
        </select>
        <button type="submit" class="btn btn-secondary">
            <i class="bi bi-funnel"></i> Filtrar
        </button>
    </form>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
   
    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-striped table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Título</th>
                        <th>Descrição</th>
                        <th>Status</th>
                        <th>Criado em</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($tasks as $task)
                        <tr>
                            <td>{{ $task->title }}</td>
                            <td>{{ $task->description }}</td>
                            <td>
                                @if ($task->status === 'Concluída')
                                    <span class="badge bg-success">
                                        ✅ Concluída
                                    </span>
                                @else
                                    <span class="badge bg-warning text-dark">
                                        ⏳ Pendente
                                    </span>
                                @endif
                            </td>
                            <td>{{ \Carbon\Carbon::parse($task->created_at)->format('d/m/Y') }}</td>
                            <td class="text-center">
                                <a href="{{ route('tasks.edit', $task) }}" class="btn btn-warning btn-sm me-1">
                                    <i class="bi bi-pencil-square"></i> Editar
                                </a>

                                
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $task->id }}">
                                    <i class="bi bi-trash"></i> Deletar
                                </button>

                                
                                <div class="modal fade" id="deleteModal{{ $task->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $task->id }}" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header bg-danger text-white">
                                        <h5 class="modal-title" id="deleteModalLabel{{ $task->id }}">Confirmar Exclusão</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                                      </div>
                                      <div class="modal-body">
                                        Tem certeza que deseja excluir a tarefa <strong>"{{ $task->title }}"</strong>?
                                        <div class="alert alert-warning mt-3 mb-0" role="alert">
                                            Esta ação não poderá ser desfeita!
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Confirmar</button>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                </div>

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Nenhuma tarefa encontrada.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Paginação -->
    <div class="mt-3">
        {{ $tasks->links() }}
    </div>

</div>
@endsection
