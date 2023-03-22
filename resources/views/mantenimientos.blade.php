@extends('templates.main')

@section('title')
    <title>Mantenimientos</title>
@endsection

@section('title')
    <title>Mantenimientos</title>
@endsection

@section('head')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
@endsection

@section('content')
    <div class="container" style="padding-top: 50px; height: 100vh;">
        <h1>Mantenimientos</h1>
        @php
            $is_manto = false;
            $permisos = is_array(session('permisos')) ? session('permisos') : [session('permisos')];
            foreach ($permisos as $permiso) {
                if ($permiso == 'manto') {
                    $is_manto = true;
                }
            }
        @endphp
        <div class="row">
            @if ($is_manto)
                <a href="{{ route('manto.nuevo') }}" class="btn btn-primary mb-3">Nuevo mantenimiento</a>
            @endif
            <button style="margin-left: 15px" class="btn btn-primary mb-3" id="btn_filter" value="all" onclick="filterMantos()">Filtrar por
                pendientes</button>
        </div>

        <br>
        <br>
        <table class="table">
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
        {{ $mantos->links() }}
    </div>
    <div class="vertical-padding"></div>
@endsection

@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
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
