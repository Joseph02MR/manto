@extends('templates.main')

@section('title')
    <title>Alta mantenimiento</title>
@endsection

@section('head')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="container-fluid" style=" padding: 70px">
        <h1>Orden mantenimiento para la máquina: {{$maquina[0]['no_serie']}}</h1>
        <br>
        <br>
        <div class="row">
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-6" style="text-align: end">
                        <h5>Usuario:</h5>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input disabled class="form-control" type="text" value="{{ $maquina[0]['nombre'] }}" placeholder="Default input">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6" style="text-align: end">
                        <h5>Correo:</h5>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input disabled class="form-control" value="{{ $maquina[0]['correo'] }}" type="text" placeholder="Default input">
                        </div>
                    </div>
                </div>
            </div>
            <!--Col derecha -->
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-6" style="text-align: end">
                        <h5>Marca:</h5>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input disabled  value="{{ $maquina[0]['marca'] }}" class="form-control" type="text" placeholder="Default input">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6" style="text-align: end">
                        <h5>Modelo:</h5>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input disabled  value="{{ $maquina[0]['modelo'] }}" class="form-control" type="text" placeholder="Default input">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr class="hr" />
        <!--Detalles maquina -->
        <form method="POST" action="{{ route('manto.orden') }}">
            @csrf
            <div class="row">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-6" style="text-align: end">
                            <h5>Descripción:</h5>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input name="descripcion" class="form-control" type="text" placeholder="Default input">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6" style="text-align: end">
                            <h5>Tipo mantenimiento:</h5>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <select id="select_tipo" class="form-control" name="id_tipo">
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Col derecha -->
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-6" style="text-align: end">
                            <h5>Piezas:</h5>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input name="piezas" class="form-control" type="text" placeholder="Default input">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6" style="text-align: end">
                            <h5>Materiales:</h5>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input name="materiales" class="form-control" type="text" placeholder="Default input">
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="id_responsable" value="1">
                <input type="hidden" name="id_maquina" value="{{$maquina[0]['id_maquina']}}">
                <input type="hidden" name="fecha_mant" value="{{ date('Y-m-d') }}">
                <input type="hidden" name="email" value="{{ $maquina[0]['correo'] }}">
                <input type="hidden" name="nombre" value="{{ $maquina[0]['nombre'] }}">
                <input type="hidden" name="id_usuario" value="{{ $maquina[0]['id_usuario'] }}">
                <div class="row">
                    <button class="btn btn-success" type="submit" style="margin-right: 15px">Enviar</button>
                    <button id="btn-cancelar-orden" class="btn btn-danger" type="button">Cancelar</button>
                </div>
            </div>
        </form>
        
    </div>
@endsection


@section('scripts')
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        //const url = 'https://boom-phrygian-sceptre.glitch.me';
        const url = 'http://localhost:8001';
        $(document).ready(function() {
            $("#btn-cancelar-orden").click(function() {
                var url = "{{route('manto.nuevo')}}";
                window.location.href = url;
            });
        // Obtener los datos de la API utilizando AJAX
        $.ajax({
            url: url+"/api/v1/aux/tipo",
            type: "GET",
            success: function(response) {
            // Recorrer los datos y agregarlos al control select
            for (var i = 0; i < response.length; i++) {
                $("#select_tipo").append(
                "<option value='" +
                    response[i].id_tipo +
                    "'>" +
                    response[i].tipo +
                    "</option>"
                );
            }
            },
            error: function(xhr) {
            console.log(xhr.responseText);
            }
        });
    });
    </script>
@endsection


