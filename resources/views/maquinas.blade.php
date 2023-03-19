@extends('templates.main')

@section('title')
    <title>Máquinas</title>
@endsection

@section('head')
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="{{ URL::asset('css/bootstrap.css')}}">
@endsection

@section('content')
<div class="container">
    <h1>Máquinas asignadas</h1>
    @php
        $permisos = is_array(session('permisos')) ? session('permisos') : array(session('permisos'));
    @endphp
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
    <script src="{{ URL::asset('../js/bootstrap.min.js')}}"></script>
@endsection