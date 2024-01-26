@extends('layouts.app')

@section('title', 'Editar tarefa')

@section('styles')
    <style>
        .error-message {
            color: red;
            font-size: 0.8rem;
        }
    </style>
@endsection

@section('content')
    <form action="{{ route('tasks.update', ['id' => $task->id]) }}" method="POST" >
        @csrf
        @method('PUT')
        <div>
            <label for="title">Título</label>
            <input type="text" name="title" id="title" value="{{$task->title}}">
            @error('title')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="description">Descrição</label>
            <textarea name="description" id="description" rows="5">{{$task->description}}</textarea>
            @error('description')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="long_description">Descrição Longa</label>
            <textarea name="long_description" id="long_description" rows="10">{{$task->long_description}}</textarea>
            @error('long_description')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <button type="submit">Editar tarefa</button>
        </div>
    </form>
@endsection
