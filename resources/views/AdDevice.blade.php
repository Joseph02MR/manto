@extends('templates.main')

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
                    <select class="form-control">
                        <option>Mantenimiento</option>
                        <option>Metriales</option>
                        <option>Diseño</option>
                        <option>Calidad</option>
                        <option>Producción</option>
                        <option>Recursos Humanos</option>
                        <option>Financieros</option>
                    </select>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-6">
                    <label >Num.Serie</label>
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
                <input type="submit" value="Insert">
                <a href="{{ url()->previous() }}" class="btn btn-error">Cancelar</a>
            </div>
        </div>
        
        
    </form>
    
</div>
@endsection