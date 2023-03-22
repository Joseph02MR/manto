@extends('templates.main')

@section('title')
    <title>Usuarios</title>
@endsection

@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="container" style="height: fit-content; padding-top: 50px; padding-bottom:100px">
        <h1>Usuarios</h1>
        <a href="{{ route('usuarios.createview') }}" class="btn btn-primary mb-3">Nuevo usuario</a>
        <table class="table" id="example">
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
    </div>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
@endsection
