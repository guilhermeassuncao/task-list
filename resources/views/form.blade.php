@extends('layouts.app')

@section('title', isset($task) ? 'Editar tarefa' : 'Adicionar tarefa')

@section('content')
    <form action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store') }}" method="POST">
        @csrf

        @isset($task)
            @method('PUT')
        @endisset

        <div class="mb-5">
            <label for="title">Título</label>
            <input @class(['border-red-500' => $errors->has('title')]) type="text" name="title" id="title"
                value="{{ $task->title ?? old('title') }}">
            @error('title')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-5">
            <label for="description">Descrição</label>
            <textarea @class(['border-red-500' => $errors->has('description')]) name="description" id="description" rows="5">{{ $task->description ?? old('description') }}</textarea>
            @error('description')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-5">
            <label for="long_description">Descrição Longa</label>
            <textarea @class(['border-red-500' => $errors->has('long_description')]) name="long_description" id="long_description" rows="10">{{ $task->long_description ?? old('long_description') }}</textarea>
            @error('long_description')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex gap-4 items-center">
            <button class="btn" type="submit">{{ isset($task) ? 'Editar tarefa' : 'Adicionar tarefa' }}</button>
            <a class="link" href="{{ route('tasks.index') }}">Cancelar</a>
        </div>
    </form>
@endsection
