@extends('templates.main')

@section('head')
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="{{ URL::asset('css/bootstrap.css')}}">
@endsection

@section('content')
<div class="container">
    <h1>Usuarios</h1>
    <a href="#" class="btn btn-primary mb-3">Nuevo usuario</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Modelo</th>
                <th>Marca</th>
                <th>Departamento</th>
                <th>Mantenimiento Anual</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @php
                $renglon = 1
            @endphp
            @foreach($permisos as $permiso)
                <tr>
                    <td>{{ $renglon }}</td>
                    <td> Modelo</td>
                    <td> Máquina</td>
                    <td> Depto</td>
                    <td> Manto</td>
                    <td> Botones
                        <!--<a href="" class="btn btn-warning">Editar</a>-->
                    </td>
                </tr>
                @php($renglon++)
            @endforeach
        </tbody>
    </table>
    {{ $usuarios->links() }}
</div>
@endsection

@section('scripts')
    <script src="{{ URL::asset('../js/bootstrap.min.js')}}"></script>
@endsection