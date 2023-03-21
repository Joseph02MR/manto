@extends('templates.main')

@section('title')
    <title>Máquinas</title>
@endsection

@section('head')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
@endsection

@section('content')
<div class="container">
    <h1>Listado de Máquinas</h1>
    <a href="{{ route('maquinas.new') }}" class="btn btn-primary mb-3">Registrar máquina</a>
    <br>
    <br>
    <table class="table">
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
            @foreach($maquinas as $maquina)
                <tr>
                    <td>{{ $renglon }}</td>
                    <td>{{$maquina['no_serie']}}</td>
                    <td>{{$maquina['modelo']}}</td>
                    <td>{{$maquina['marca']}}</td>
                    <td>{{$maquina['nombre']}}</td>
                    <td>{{$maquina['depto']}}</td>
                    <td>{{substr($maquina['fecha_anual'], 0,10)}}</td>
                    <td>
                        <a href="{{route('maquinas.editview',['id'=>$maquina['id_maquina']])}}" class="btn btn-warning">Editar</a>
                        <form action="" method="POST" style="display: inline-block;">
                            <input type="hidden" value="{{ $maquina['id_maquina'] }}" name="id">
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Está seguro de que desea eliminar este usuario?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @php($renglon++)
            @endforeach
        </tbody>
    </table>
    {{ $maquinas->links() }}
</div>
<div class="vertical-padding"></div>
@endsection

@section('scripts')
@endsection