@extends('templates.main')

@section('content')
<div class="container">
    <div class="col-sm-6">
        <div class="row">
            <div class="col-sm-6">
                <label>Departamento</label>
            </div>
            <div class="col-sm-6">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Departamento
                  </a>
                
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                  </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-6">
                <label >Num.Serie</label>
            </div>
            <div class="col-sm-6">
                <input disabled="true" type="text" class="form-control" id="NumSerie">
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-6">
                <label>Usuario</label>
            </div>
            <div class="col-sm-6">
                <input disabled="true" type="text" class="form-control" id="Username">
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-6">
                <label>Modelo</label>
            </div>
            <div class="col-sm-6">
                <input disabled="true" type="text" class="form-control" id="Modelo">
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-6">
                <label>Marca</label>
            </div>
            <div class="col-sm-6">
                <input disabled="true" type="text" class="form-control" id="Marca">
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-6">
                <label>Fecha Mantenimiento Anual</label>
            </div>
            <div class="col-sm-6">
                <input disabled="true" type="text" class="form-control" id="Email">
              </div>
        </div>
        <hr>
    </div>
</div>
@endsection