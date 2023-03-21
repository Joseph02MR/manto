@extends('templates.main')

@section('title')
    <title>Registro Histórico</title>
@endsection

@section('head')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
@endsection

@section('content')
    <div class="container">
        <h1>Bitácora de operaciones</h1>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tabla afectada</th>
                    <th>Operación realizada</th>
                    <th>Fecha</th>
            </thead>
            <tbody>
                @php($renglon = 1)
                @foreach ($registros as $registro)
                    <tr>
                        <td>{{ $renglon }}</td>
                        <td>{{ $registro['tabla_afectada'] }}</td>
                        <td>{{ $registro['tipo_operacion'] }}</td>
                        <td>{{ $registro['fecha'] }}</td>
                    </tr>
                    @php($renglon++)
                @endforeach
            </tbody>
        </table>
        {{ $registros->links() }}
    </div>
    <div class="vertical-padding"></div>
@endsection