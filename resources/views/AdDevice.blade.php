@extends('templates.main')

@section('title')
    @if (is_null($maquina))
        <title>Agregar máquina</title>
    @else
        <title>Editar máquina</title>
    @endif
@endsection

@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <br>
        @if ($maquina)
            <h1>Editar máquina</h1>
        @else
            <h1>Agregar máquina</h1>
        @endif
        <br>
        <form
            @if ($maquina) action="{{ route('maquinas.update') }}"
            @else
                action="{{ route('maquinas.new') }}" @endif
            method="POST">
            @csrf
            <div class="col-sm-6">
                @if ($maquina)
                    <input type="hidden" value="{{ $maquina['id_maquina'] }}" name="id">
                @endif
                <div class="row">
                    <div class="col-sm-6">
                        <label for="select_depto">Departamento</label>
                    </div>
                    <div class="col-sm-6">
                        <select class="form-control" name="id_departamento" id="select_depto">
                            @foreach ($deptos as $depto)
                                <option @if ($maquina && $depto['id_departamento'] == $maquina['id_departamento']) selected @endif
                                    value="{{ $depto['id_departamento'] }}">
                                    {{ $depto['departameto'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        <label for="no_serie">Número de serie</label>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="no_serie" name="no_serie"
                            @if ($maquina) value="{{ $maquina['no_serie'] }}" @endif>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        <label for="select_user">Usuario</label>
                    </div>
                    <div class="col-sm-6">
                        <select class="form-control" id="select_user" name="id_usuario">
                            <option value="0">No user</option>
                        </select>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        <label for="Modelo">Modelo</label>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="Modelo" name="modelo"
                            @if ($maquina) value="{{ $maquina['modelo'] }}" @endif>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        <label for="marca">Marca</label>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="Marca" name="marca"
                            @if ($maquina) value="{{ $maquina['marca'] }}" @endif>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        <label for="manto_date">Fecha Mantenimiento Anual</label>
                    </div>
                    <div class="col-sm-6">
                        <input type="date" class="form-control" id="manto_date" name="fecha_anual"
                            @if ($maquina) value="{{ substr($maquina['fecha_anual'], 0, 10) }}" @endif>
                    </div>
                </div>
                <hr>
                <div class="col-sm-6">
                    <input type="submit" class="btn btn-success" value="Agregar">
                    <a href="{{ route('maquinas.admin') }}" class="btn btn-danger">Cancelar</a>
                </div>
            </div>
        </form>
        <br>
    </div>
    @if ($maquina)
        <a href="" hidden id="aux">{{ $maquina['id_usuario'] }}</a>
    @endif
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        var url = 'http://localhost:8001';
        //var url = 'https://boom-phrygian-sceptre.glitch.me';
        $(document).ready(function() {
            // Obtener los datos de la API utilizando AJAX

            // Obtener las opciones del select de departamentos
            var selectDeptos = $('#select_depto');
            var selectedDeptoId = selectDeptos.val();
            // Llamada AJAX para obtener las máquinas del departamento seleccionado
            $.ajax({
                url: url + "/api/v1/usuario/depto/" + selectedDeptoId,
                type: "GET",
                success: function(response) {
                    // Vaciar el select de máquinas
                    $('#select_user').empty();
                    $('#select_user').append('<option value="0">No user</option>');
                    // Recorrer los datos y agregarlos al control select
                    var id_usuario = document.getElementById('aux');
                    var aux = "";
                    for (var i = 0; i < response.length; i++) {
                        if (id_usuario.innerHTML == response[i].id_usuario) {
                            aux = "selected";
                        } else aux = ""
                        $('#select_user').append(
                            "<option " + aux + " value='" +
                            response[i].id_usuario +
                            "'>" +
                            response[i].nombre +
                            "</option>"
                        );
                    }
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
            // Evento change del select de departamentos
            selectDeptos.change(function() {
                var selectedDeptoId = selectDeptos.val();
                // Llamada AJAX para obtener las máquinas del departamento seleccionado
                $.ajax({
                    url: url + "/api/v1/usuario/depto/" + selectedDeptoId,
                    type: "GET",
                    success: function(response) {
                        $('#select_user').empty();
                        $('#select_user').append('<option value="0">No user</option>');
                        var id_usuario = document.getElementById('aux');
                        var aux = "";
                        // Recorrer los datos y agregarlos al control select
                        for (var i = 0; i < response.length; i++) {
                            if (id_usuario && id_usuario.innerHTML === response[i].id_usuario)
                                aux = "selected"
                            $('#select_user').append(
                                "<option " + aux + " value='" +
                                response[i].id_usuario +
                                "'>" +
                                response[i].nombre +
                                "</option>"
                            );
                        }

                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>
@endsection
@if (session('success'))
    <script>
        alert("{{ session('success') }}");
    </script>
@endif
