@extends('templates.main')

@section('title')
    <title>Mantenimientos</title>
@endsection

@section('title')
    <title>Mantenimientos</title>
@endsection

@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="container" style="padding-top: 50px; height: 100vh;">
        <h1>Mantenimientos asignados a: {{$mantos[0]['responsable']}} </h1>

        @php
            $is_manto = false;
            $permisos = is_array(session('permisos')) ? session('permisos') : [session('permisos')];
            foreach ($permisos as $permiso) {
                if ($permiso == 'manto') {
                    $is_manto = true;
                }
            }
        @endphp
        <div class="col-sm-6">
            @if ($is_manto)
                <a href="{{ route('manto.nuevo') }}" class="btn btn-primary mb-3">Nuevo mantenimiento</a>
            @endif
            <button style="margin-left: 15px" class="btn btn-primary mb-3" id="btn_filter" value="all"
                onclick="filterMantos()">Filtrar por
                pendientes</button>
        </div>

        <br>
        <br>
        <table class="table" id="example">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Descripción</th>
                    <th>Tipo</th>
                    <th>Máquina</th>
                    <th>Piezas</th>
                    <th>Materiales</th>
                    <th>Fecha</th>
                    <th>Responsable</th>
                    <th>Status</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @php($renglon = 1)
                @foreach ($mantos as $manto)
                    <tr class="js-row">
                        <td>{{ $renglon }}</td>
                        <td>{{ $manto['descripcion'] }}</td>
                        <td>{{ $manto['tipo'] }}</td>
                        <td>{{ $manto['no_serie'] }}</td>
                        <td>{{ $manto['piezas'] }}</td>
                        <td>{{ $manto['materiales'] }}</td>
                        <td>{{ substr($manto['fecha_mant'], 0, 10) }}</td>
                        <td>{{ $manto['responsable'] }}</td>
                        <td>{{ $manto['status'] }}</td>
                        <td>
                            @if ($is_manto && $manto['status'] == 'Pendiente')
                                <button id="finalizar_{{ $manto['id_mantenimiento'] }}" class="btn btn-primary mb-3"
                                    onclick="updateStatus({{ $manto['id_mantenimiento'] }},{{ $manto['id_maquina'] }})">Marcar
                                    finalizado</button>
                            @else
                                ¯⁠\_⁠⁠(⁠ツ⁠)_⁠⁠/⁠¯
                            @endif
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
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>

    <script>
        function updateStatus(id, maquina) {
            var xhr = new XMLHttpRequest();
            xhr.open("PATCH", "{{ route('manto.status') }}", true);
            xhr.setRequestHeader("Content-Type", "application/json");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    console.log("correcto :D");
                }
            };
            var datos = JSON.stringify({
                "id": id,
                "maquina": maquina,
                _token: "{{ csrf_token() }}"
            });

            xhr.send(datos);
        }

        function filterMantos() {
            const btn = document.getElementById("btn_filter");
            if (btn.value === 'all') {
                let rows = document.getElementsByClassName('js-row');
                for (const element of rows) {
                    elements = element.children;
                    if (elements[8].innerText === 'Finalizado') {
                        element.hidden = true;
                    }
                }
                btn.value = 'filtered';
                btn.innerHTML = 'Mostrar todos';
            } else {
                let rows = document.getElementsByClassName('js-row');
                for (const element of rows) {
                    elements = element.children;
                    if (elements[8].innerText === 'Finalizado') {
                        element.hidden = false;
                    }
                }
                btn.value = 'all';
                btn.innerHTML = 'Filtrar por pendientes';
            }


        }
    </script>
@endsection
