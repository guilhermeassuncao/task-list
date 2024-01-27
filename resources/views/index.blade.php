@extends('layouts.app')

@section('title', 'Lista de tarefas')

@section('content')
    <nav class="mb-4">
        <a class="link" href="{{ route('tasks.create') }}">Criar nova
            tarefa</a>
    </nav>

    @forelse ($tasks as $task)
        <div class="mt-2">
            <a href="{{ route('tasks.show', ['task' => $task->id]) }}" @class(['line-through' => $task->completed])>
                {{ $task->title }}
            </a>
        </div>
    @empty
        <p>Não há tarefas cadastradas.</p>
    @endforelse

    @if ($tasks->count())
        <nav class="mt-5">
            {{ $tasks->links() }}
        </nav>
    @endif
@endsection
