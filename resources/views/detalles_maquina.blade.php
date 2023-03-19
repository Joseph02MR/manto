@extends('templates.main')
@section('head')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
@endsection
@section('content')
    <div class="container-fluid" style="height: 100vh; padding: 100px">
        <div class="row">
            <h1>Detalles máquina</h1>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-6" style="text-align: end">
                        <h5>No usuario:</h5>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input class="form-control" type="text" placeholder="Default input">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6" style="text-align: end">
                        <h5>Usuario:</h5>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input class="form-control" type="text" placeholder="Default input">
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
                            <input class="form-control" type="text" placeholder="Default input">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6" style="text-align: end">
                        <h5>Modelo:</h5>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input class="form-control" type="text" placeholder="Default input">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr class="hr" />
        <!--Detalles maquina -->
        <form method="" action="">
            <div class="row">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-6" style="text-align: end">
                            <h5>Descripcion:</h5>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Default input">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6" style="text-align: end">
                            <h5>Tipo mantenimiento:</h5>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <select id="my-select" class="form-control" name="">
                                    <option>Text</option>
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
                                <input class="form-control" type="text" placeholder="Default input">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6" style="text-align: end">
                            <h5>Materiales:</h5>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Default input">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <button class="btn btn-success" type="submit" style="margin-right: 15px">Enviar</button>
                    <button class="btn btn-danger" type="button">Cancelar</button>
                </div>
            </div>
        </form>
    </div>
@endsection
