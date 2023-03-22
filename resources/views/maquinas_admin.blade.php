@extends('templates.main')

@section('title')
    <title>Máquinas</title>
@endsection

@section('head')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <br>
        <h1>Listado de Máquinas</h1>
        <br>
        <a href="{{ route('maquinas.createview') }}" class="btn btn-primary mb-3">Registrar máquina</a>
        <br>
        <br>
        <table class="table" id="example">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>No. Serie</th>
                    <th>Modelo</th>
                    <th>Marca</th>
                    <th>Usuario</th>
                    <th>Departamento</th>
                    <th>Mantenimiento Anual</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @php($renglon = 1)
                @foreach ($maquinas as $maquina)
                    <tr>
                        <td>{{ $renglon }}</td>
                        <td>{{ $maquina['no_serie'] }}</td>
                        <td>{{ $maquina['modelo'] }}</td>
                        <td>{{ $maquina['marca'] }}</td>
                        <td>{{ $maquina['nombre'] }}</td>
                        <td>{{ $maquina['depto'] }}</td>
                        <td>{{ substr($maquina['fecha_anual'], 0, 10) }}</td>
                        <td>
                            <a href="{{ route('maquinas.editview', ['id' => $maquina['id_maquina']]) }}"
                                class="btn btn-warning">Editar</a>
                            <form action="{{ route('maquinas.delete') }}" method="POST" style="display: inline-block;">
                                @csrf
                                <input type="hidden" value="{{ $maquina['id_maquina'] }}" name="id">
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('¿Está seguro de que desea eliminar este usuario?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @php($renglon++)
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="vertical-padding"></div>
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
