@extends('layouts.app')

@section('title', $task->title)

@section('content')

    <nav class="mb-4">
        <a class="link" href="{{ route('tasks.index') }}"><- Voltar para a lista de tarefas</a>
    </nav>


    <p class="mb-4 text-slate-700">{{ $task->description }}</p>

    @if ($task->long_description)
        <p class="mb-4 text-slate-700">{{ $task->long_description }}</p>
    @endif

    <p class="mb-4 text-sm text-slate-500">Criado {{ $task->created_at->diffForHumans() }}</p>
    <p class="mb-4 text-sm text-slate-500">Atualizado {{ $task->updated_at->diffForHumans() }}</p>

    <p class="mb-4">
        @if ($task->completed)
            <span class="text-green-500">Completa</span>
        @else
            <span class="text-red-500">Incompleta</span>
        @endif
    </p>

    <div class="flex gap-3">
        <a href="{{ route('tasks.edit', ['task' => $task]) }}" class="btn">Editar tarefa</a>

        <form action="{{ route('tasks.toggle-complete', ['task' => $task]) }}" method="POST">
            @csrf
            @method('PUT')
            <button class="btn" type="submit">Marcar como {{ $task->completed ? 'incompleta' : 'completa' }}</button>
        </form>

        <form action="{{ route('tasks.destroy', ['task' => $task]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn" type="submit">Deletar tarefa</button>
        </form>
    </div>

@endsection
