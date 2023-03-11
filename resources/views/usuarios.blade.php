@extends('template')

@section('content')
<div class="container">
    <h1>Usuarios</h1>
    <a href="{{ route('usuarios.create') }}" class="btn btn-primary mb-3">Nuevo usuario</a>
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
            @foreach($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario['correo'] }}</td>
                    <td>{{ $usuario['nombre'] }}</td>
                    <td>{{ $usuario['id_departamento'] }}</td>
                    <td>
                        <a  class="btn btn-info">Ver</a>
                        <a class="btn btn-warning">Editar</a>
                        <form method="POST" style="display: inline-block;">
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Está seguro de que desea eliminar este usuario?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $usuarios->links() }}
</div>
@endsection