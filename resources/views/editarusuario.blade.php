@extends('templates.main')

@section('head')
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="{{ URL::asset('css/bootstrap.css')}}">
@endsection

@section('content')
<div class="container">
    <h1>Editar Usuario</h1>
    <form action="update" method="POST">
        <label for="departamento">Departamento:</label>
        <select class="form-control">
            <option>Mantenimiento</option>
            <option>Metriales</option>
            <option>Diseño</option>
            <option>Calidad</option>
            <option>Producción</option>
            <option>Recursos Humanos</option>
            <option>Financieros</option>
          </select>
      
          <label for="exampleFormControlInput1">Email address</label>
          <input type="email" class="form-control" id="exampleFormControlInput" placeholder="name@example.com">
      
          <label for="exampleInputEmail1">Nombre</label>
          <input type="text" class="form-control" id="exampleInputName" placeholder="Enter Name">
          <small id="emailHelp" class="form-text text-muted">Introduce el nombre completo.</small>

          <hr>

        <input type="submit" value="Update">
        <a href="{{ url()->previous() }}" class="btn btn-error">Cancelar</a>
    </form>
</div>
@endsection