@extends('layouts.app')

@section('title', "Lista de tarefas")

@section('content')

@if (count($tasks) > 0)

@foreach ($tasks as $task)
<div>
    <a href="{{ route('tasks.show', ['id' => $task->id]) }}">
        {{ $task->title }}
    </a>
</div>
@endforeach

@else
<p>Não há tarefas cadastradas.</p>
@endif

@endsection