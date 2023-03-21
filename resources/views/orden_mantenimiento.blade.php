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
                                <option>Text</option>
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
                                <option>Text</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row" style="justify-content: right; margin-right: 0">
                    <button class="btn btn-success" type="button" style="margin-right: 15px">Levantar orden</button>
                    <button class="btn btn-danger" type="button">Cancelar</button>
                </div>
            </div>
    </div>
@endsection

@section('scripts')
    <!-- Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
@endsection
