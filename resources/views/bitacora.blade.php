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
            @foreach($registros as $registro)
                <tr>
                    <td>{{ $renglon }}</td>
                    <td>{{$registro['tabla_afectada']}}</td>
                    <td>{{$registro['tipo_operacion']}}</td>d>
                    <td>{{$registro['fecha']}}</td>
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