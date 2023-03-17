@extends('templates.main')

@section('content')
<div class="container">
    <div class="col-sm-6">
        <div class="row">
            <div class="col-sm-6">
                <label>Departamento</label>
            </div>
            <div class="col-sm-6">
                <input disabled="true" type="text" class="form-control" id="Dptoname">
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-6">
                <label >Maquina</label>
            </div>
            <div class="col-sm-6">
                <select class="form-control"> 
                    <option>PC1</option>
                  </select>
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
                <label>Email</label>
            </div>
            <div class="col-sm-6">
                <input disabled="true" type="text" class="form-control" id="Email">
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-6">
                <label>Fecha Mantenimiento</label>
            </div>
            <div class="col-sm-6">
                <input disabled="true" type="text" class="form-control" id="Email">
              </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-6">
                <label>Persona</label>
            </div>
            <div class="col-sm-6">
                <input disabled="true" type="text" class="form-control" id="Persona">
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-6">
                <label>Mantenimiento</label>
            </div>
            <div class="col-sm-6">
                <textarea class="form-control" id="DescManto" rows="4"></textarea>
            </div>
        </div>
        <hr>
    </div>
</div>
@endsection