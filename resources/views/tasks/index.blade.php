@extends('layouts.pagina')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@section('content')
<h1>Lista de tareas</h1>
<a href="/tasks/create">Crear</a>

<div class="table-responsive">
    <table class="table text-left">
        <thead>
            <tr>
                <th style="width: 5%">ID</th>
                <th style="width: 22%;">Nombre</th>
                <th style="width: 22%;">Completada</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
            <tr>
                <th scope="row" class="text-start">{{ $task->id }}</th>

                <td>
                    <a href="/tasks/{{ $task->id }}">{{ $task->name }}</a>
                </td>


                <td>
                    @if ($task->completed == true)
                    <span class="text-success">
                        Completado
                    </span>
                    @else
                    <span class="text-warning">
                        Pendiente
                    </span>
                    @endif

                <td>
                    <form action="/tasks/{{ $task->id }}/completar" method="POST" style="display:inline;">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-primary">Completar</button>
                    </form>

                </td>
            </tr>

            @endforeach

        </tbody>


    </table>
</div>
@endsection