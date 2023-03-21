@extends('templates.main')

@section('title')
    @if (is_null($maquina))
        <title>Agregar máquina</title>
    @else
        <title>Editar máquina</title>
    @endif
@endsection

@section('head')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
@endsection

@section('content')
    <div class="container">
        <h1>Agregar Dispositivo</h1>
        <hr>
        <hr>
        <form action="insert" method="POST">
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-6">
                        <label>Departamento</label>
                    </div>
                    <div class="col-sm-6">
                        <select class="form-control" name="id_departamento">
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
                        <label>Num.Serie</label>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="NumSerie">
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        <label>Usuario</label>
                    </div>
                    <div class="col-sm-6">
                        <select class="form-control">
                            <option>Usuario sin maquina</option>
                            <option>Nanomachine</option>
                        </select>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        <label>Modelo</label>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="Modelo">
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        <label>Marca</label>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="Marca">
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        <label>Fecha Mantenimiento Anual</label>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="Email">
                    </div>
                </div>
                <hr>
                <div class="col-sm-6">
                    <input type="submit" class="btn btn-success" value="Insert">
                    <a href="{{ route('maquinas.admin') }}" class="btn btn-danger">Cancelar</a>
                </div>
            </div>


        </form>

    </div>
@endsection
