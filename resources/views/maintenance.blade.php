@extends('templates.main')
@section('title')
    <title>Editar Orden</title>
@endsection

@section('head')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
@endsection


@section('content')
    @php
        $is_manto = false;
        $permisos = is_array(session('permisos')) ? session('permisos') : [session('permisos')];
        foreach ($permisos as $permiso) {
            if ($permiso == 'manto') {
                $is_manto = true;
            }
        }
    @endphp
    <div class="container-fluid" style="height: 100vh; display:flex; align-items:center; justify-content:center;">
        <form action="{{ route('manto_content') }}" method="POST" class="form-group">
            @csrf
            @if ($is_manto)
                <div class="row">
                    <div>
                        <h5>Piezas:</h5>
                    </div>
                    <div>
                        <div class="form-group">
                            <input name="piezas" value="{{ $manto['piezas'] }}"
                                style="margin-left: 16px; padding-right: 150px" class="form-control" type="text"
                                placeholder="Piezas utilizadas">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div>
                        <h5>Materiales:</h5>
                    </div>
                    <div>
                        <div class="form-group">
                            <input name="materiales" value="{{ $manto['materiales'] }}" class="form-control" type="text"
                                style="padding-right: 150px" placeholder="Materiales utilizados">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div>
                        <div class="form-group">
                            <h5><label for="obs">Observaciones</label></h5>
                            <textarea style="padding-right: 250px" name="observaciones" id="obs" class="form-control" rows="3">{{ $manto['observaciones'] }}</textarea>
                        </div>
                    </div>
                </div>
            @else
                <div class="row">
                    <div>
                        <div class="form-group">
                            <h5><label for="obs">Descripción</label></h5>
                            <textarea style="padding-right: 250px" name="descripcion" id="obs" class="form-control" rows="3">{{ $manto['descripcion'] }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="" style="text-align: end">
                        <h5 id="kek">Responsable:</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="">
                        <div class="form-group">
                            <select style="margin-right: 275px" id="select_resp" class="form-control" name="id_responsable">
                            </select>
                        </div>
                    </div>
                </div>

                <input type="hidden" value="admin" name="type">
            @endif
            <input type="hidden" value="{{ $aux }}" name="id">

            <div class="row" style="justify-content: right; margin-right: 0">
                <input type="submit" style="margin-right: 15px" class="btn btn-success" value="Aceptar">
                <a href="{{ url()->previous() }}" class="btn btn-danger">Cancelar</a>
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
            $.ajax({
                url: url + "/api/v1/usuario/depto/4",
                type: "GET",
                success: function(response) {
                    // Recorrer los datos y agregarlos al control select
                    for (var i = 0; i < response.length; i++) {
                        if (response[i].id_usuario == "{{ $manto['id_responsable'] }}") {
                            let a = document.getElementById('kek');
                            a.innerHTML = 'Responsable: ' + response[i].nombre;
                        }
                        $("#select_resp").append(
                            "<option value='" +
                            response[i].id_usuario +
                            "'>" +
                            response[i].nombre +
                            "</option>"
                        );
                    }
                    let aux = "{{ $manto['id_responsable'] }}";
                    $("#someselect option[value='{{ $manto['id_responsable'] }}']").prop("selected",
                        true)


                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        })
    </script>
@endsection
