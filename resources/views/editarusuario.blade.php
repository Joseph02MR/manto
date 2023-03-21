@extends('templates.main')

@section('title')
    @if (is_null($usuario))
        <title>Crear usuario</title>
    @else
        <title>Editar usuario</title>
    @endif
@endsection

@section('head')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
@endsection

@section('content')
    <div class="container">
        <br>
        <h1>
            @if (is_null($usuario))
                Crear Usuario
            @else
                Editar Usuario
            @endif
        </h1>
        <br>
        <form
            @if (is_null($usuario)) action="{{ route('usuarios.new') }}"
        @else
        action="{{ route('usuarios.update') }}" @endif
            method="POST">
            @csrf
            @if ($usuario)
                <input type="hidden" value="{{ $usuario['id_usuario'] }}" name="id">
            @endif

            <label for="departamento">Departamento:</label>
            <select class="form-control" id="departamento" name="id_departamento">
                @foreach ($deptos as $depto)
                    <option @if ($usuario && $depto['id_departamento'] == $usuario['id_departamento']) selected @endif value="{{ $depto['id_departamento'] }}">
                        {{ $depto['departameto'] }}</option>
                @endforeach
            </select>

            <label for="1">Nombre</label>
            <input type="text" class="form-control" id="1" name="nombre"
                @if ($usuario) value="{{ $usuario['nombre'] }}" @endif placeholder="Nombre(s) Apellidos">
            <small id="emailHelp" class="form-text text-muted">Introduce el nombre
                completo.</small>

            <label for="2">Correo electrónico</label>
            <input type="email" class="form-control" id="2" name="correo"
                @if ($usuario) value="{{ $usuario['correo'] }}" @endif placeholder="name@example.com">

            <label for="3">Contraseña</label>
            <input type="password" class="form-control" id="3" name="contrasena"
                @if ($usuario) value="{{ $usuario['contrasena'] }}" @endif placeholder="pass123">
            <hr>

            <input type="submit" class="btn btn-success"
                @if ($usuario) value="Actualizar"
            @else
            value="Crear" @endif>
            <a href="{{ url()->previous() }}" class="btn btn-danger">Cancelar</a>
        </form>
        <br>
    </div>
@endsection
