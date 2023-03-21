@extends('templates.main')

@section('title')
    <title>Usuarios</title>
@endsection

@section('head')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
@endsection

@section('content')
    <div class="container">
        <h1>Usuarios</h1>
        <a href="{{ route('usuarios.createview') }}" class="btn btn-primary mb-3">Nuevo usuario</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Correo</th>
                    <th>Nombre</th>
                    <th>Departamento</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario['correo'] }}</td>
                        <td>{{ $usuario['nombre'] }}</td>
                        <td>{{ $usuario['departameto'] }}</td>
                        <td>
                            <a href="{{ route('usuarios.editview', ['id' => $usuario['id_usuario']]) }}"
                                class="btn btn-warning">Editar</a>
                            <form action="{{ route('usuarios.delete') }}" method="POST" style="display: inline-block;">
                                @csrf
                                <input type="hidden" value="{{ $usuario['id_usuario'] }}" name="id">
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('¿Está seguro de que desea eliminar este usuario?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $usuarios->links() }}
    </div>
@endsection

@section('scripts')
@endsection
