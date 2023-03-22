@extends('templates.main')
@section('title')
    <title>Maintenance</title>
@endsection

@section('head')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
@endsection


@section('content')
    <div class="container-fluid" style="height: 100vh; display:flex; align-items:center; justify-content:center;">
        <form action="" class="form-group">
            <div class="row">
                <div>
                    <h5>Piezas:</h5>
                </div>
                <div>
                    <div class="form-group">
                        <input style="margin-left: 16px" class="form-control" type="text" placeholder="Default input">
                    </div>
                </div>
            </div>
            <div class="row">
                <div>
                    <h5>Materiales:</h5>
                </div>
                <div>
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Default input">
                    </div>
                </div>
            </div>
            <div class="row">
                <div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Observaciones</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                </div>
            </div>
            <div class="row" style="justify-content: right; margin-right: 0">
                <button id="btn-levantar-orden" class="btn btn-success" type="button"
                    style="margin-right: 15px">Aceptar</button>
                <button class="btn btn-danger" id="btn-cancel" type="button">Cancelar</button>
            </div>
        </form>
    </div>
@endsection
