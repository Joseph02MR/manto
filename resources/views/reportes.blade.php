@extends('templates.main')

@section('title')
    <title>Departamento</title>
@endsection

@section('head')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
@endsection

@section('content')
    <div class="container" style="text-align: center; padding-top: 50px; height: 100vh;">
        <h1>Generación de Reportes</h1>
        <div class="row" style="padding-top: 150px">
            <div class="col-md-4 text-center" style="padding-bottom: 20px;">
                <a href="{{ route('getqrs') }}/{{ '4' }}" class="btn btn-success btn-block">
                    Mantenimiento<br>
                    <img src="https://img.icons8.com/color/48/000000/pdf-2.png"/>
                </a>
            </div>
            <div class="col-md-4 text-center" style="padding-bottom: 20px;">
                <a href="{{ route('getqrs') }}/{{ '5' }}" class="btn btn-success btn-block">
                    Materiales<br>
                    <img src="https://img.icons8.com/color/48/000000/pdf-2.png"/>
                </a>
            </div>
            <div class="col-md-4 text-center" style="padding-bottom: 20px;">
                <a href="{{ route('getqrs') }}/{{ '6' }}" class="btn btn-success btn-block">
                    Diseño<br>
                    <img src="https://img.icons8.com/color/48/000000/pdf-2.png"/>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 text-center" style="padding-bottom: 20px;">
                <a href="{{ route('getqrs') }}/{{ '7' }}" class="btn btn-success btn-block">
                    Calidad<br>
                    <img src="https://img.icons8.com/color/48/000000/pdf-2.png"/>
                </a>
            </div>
            <div class="col-md-4 text-center" style="padding-bottom: 20px;">
                <a href="{{ route('getqrs') }}/{{ '8' }}" class="btn btn-success btn-block">
                    Producción<br>
                    <img src="https://img.icons8.com/color/48/000000/pdf-2.png"/>
                </a>
            </div>
            <div class="col-md-4 text-center" style="padding-bottom: 20px;">
                <a href="{{ route('getqrs') }}/{{ '9' }}" class="btn btn-success btn-block">
                    Recursos Humanos<br>
                    <img src="https://img.icons8.com/color/48/000000/pdf-2.png"/>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 offset-md-4 text-center" style="padding-bottom: 20px;">
                <a href="{{ route('getqrs') }}/{{ '10' }}" class="btn btn-success btn-block">
                    Financieros<br>
                    <img src="https://img.icons8.com/color/48/000000/pdf-2.png"/>
                </a>
            </div>
        </div>
    </div>
@endsection
