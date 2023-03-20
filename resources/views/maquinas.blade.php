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
    <h1>Máquinas asignadas</h1>
   
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>No. Serie</th>
                <th>Modelo</th>
                <th>Marca</th>
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
                    <td>{{$maquina['departameto']}}</td>
                    <td>{{substr($maquina['fecha_anual'], 0,10)}}</td>
                    <td>¯⁠\_⁠⁠(⁠ツ⁠)_⁠⁠/⁠¯
                        <!--<a href="" class="btn btn-warning">Editar</a>-->
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
@endsection