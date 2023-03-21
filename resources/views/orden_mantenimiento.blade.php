@extends('templates.main')

@section('title')
    <title>Nuevo mantenimiento</title>
@endsection

@section('head')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
@endsection

@section('content')
    <div class="container-fluid" style="height: 100vh; display: flex; align-items: center; text-align: right; padding-right: 380px ">
        <div class="col">
            <form>
                <div class="row" style="justify-content: center">
                    <h1>Mantenimiento</h1>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Departamento</h2>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <select id="select_depto" class="form-control" name="">
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Maquina</h2>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <select id="select_maquina" class="form-control" name="">
                                <option>Seleccione una opción</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row" style="justify-content: right; margin-right: 0">
                    <button id="btn-levantar-orden" class="btn btn-success" type="button" style="margin-right: 15px">Levantar orden</button>
                    <button class="btn btn-danger" id="btn-cancel" type="button">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script>
        var url = 'http://localhost:8001';
        //var url = 'https://boom-phrygian-sceptre.glitch.me';
        $(document).ready(function() {

            $("#btn-levantar-orden").click(function() {
                var id_maquina = $("#select_maquina").val();
                if (id_maquina !== "") {
                    var url = "{{route('manto.nuevo')}}"+"/" + id_maquina;
                    window.location.href = url;
                } else {
                    alert("Seleccione una maquina");
                }
            });
            $("#btn-cancel").click(function() {
                var url = "{{route('manto')}}";
                    window.location.href = url;
            });
        // Obtener los datos de la API utilizando AJAX
        $.ajax({
            url: url+"/api/v1/departamento",
            type: "GET",
            success: function(response) {
            // Recorrer los datos y agregarlos al control select
            for (var i = 0; i < response.length; i++) {
                $("#select_depto").append(
                "<option value='" +
                    response[i].id_departamento +
                    "'>" +
                    response[i].departameto +
                    "</option>"
                );
            }
            },
            error: function(xhr) {
            console.log(xhr.responseText);
            }
        });

        // Obtener las opciones del select de departamentos
        var selectDeptos = $('#select_depto');
        // Evento change del select de departamentos
        // Evento change del select de departamentos
        selectDeptos.change(function() {
        var selectedDeptoId = selectDeptos.val();

        // Llamada AJAX para obtener las máquinas del departamento seleccionado
        $.ajax({
            url: url+"/api/v1/maquina/depto/" + selectedDeptoId,
            type: "GET",
            success: function(response) {
                // Vaciar el select de máquinas
                $('#select_maquina').empty();

                // Recorrer los datos y agregarlos al control select
                for (var i = 0; i < response.length; i++) {
                $('#select_maquina').append(
                    "<option value='" +
                    response[i].id_maquina +
                    "'>" +
                    response[i].no_serie + '-' +response[i].modelo+
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
@if(session('success'))
    <script>
        alert("{{ session('success') }}");
    </script>
@endif