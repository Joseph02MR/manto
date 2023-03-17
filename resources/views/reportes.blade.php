@extends('templates.main')

@section('head')
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="{{ URL::asset('css/bootstrap.css')}}">
@endsection

@section('content')
<div class="container">
    <h1>Generacion de Reportes</h1>
    <hr>
    <hr>
    <div class="row">
        <a href="{{ route('getqrs') }}/{{ '4'}}" class="btn btn-success">Mantenimiento</a>
    </div>
    <hr>
    <div class="row">
        <a href="{{ route('getqrs') }}/{{ '5'}}" class="btn btn-success">Materiales</a>
    </div>
    <hr>
    <div class="row">
        <a href="{{ route('getqrs') }}/{{ '6'}}" class="btn btn-success">Diseño</a>
    </div>
    <hr>
    <div class="row">
        <a href="{{ route('getqrs') }}/{{ '7'}}" class="btn btn-success">Calidad</a>
    </div>
    <hr>
    <div class="row">
        <a href="{{ route('getqrs') }}/{{ '8'}}" class="btn btn-success">Produccion</a>
    </div>
    <hr>
    <div class="row">
        <a href="{{ route('getqrs') }}/{{ '9'}}" class="btn btn-success">Recursos Humanos</a>
    </div>
    <hr>
    <div class="row">
        <a href="{{ route('getqrs') }}/{{ '10'}}" class="btn btn-success">Financieros</a>
    </div>
    <hr>
    
    
</div>
@endsection