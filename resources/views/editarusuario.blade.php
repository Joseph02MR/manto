@extends('templates.main')

@section('head')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
@endsection

@section('content')
<div class="container">
    <br>
    <h1>Editar Usuario</h1>
    <br>
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

        <input type="submit" class="btn btn-success" value="Update">
        <a href="{{ url()->previous() }}" class="btn btn-danger">Cancelar</a>
    </form>
    <br>
</div>
@endsection