<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('title')
    <!--Made with love by Mutiullah Samim -->
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
    @yield('head')
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <div class="header">
        <h1>My Website</h1>
        <p>A website created by me.</p>
    </div>

    <div class="navbar">
        <a href="#"><span style="font-size:15px;cursor:pointer" onclick="openNav()">&#9776;</span></a>
        <a href="{{route('logout')}}" class="right">Cerrar sessión</a>
       <!-- 
        <a href="#" class="right">Link</a>
        <a href="#" class="right">Link</a>
       -->
    </div>

    <div id="mySidenav" class="sidenav">
        @php
            $permisos = null;
            if (session('permisos') != null) {
                $permisos = is_array(session('permisos')) ? session('permisos') : [session('permisos')];
            }
        @endphp
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="{{route('landing')}}">Máquinas</a>
        @foreach ($permisos as $permiso)
            @if ($permiso == 'admin')
                <a href="{{route('usuarios')}}">Usuarios</a>
                <a href="#">Reportes</a>
                <!--TODO: Definir vistas admin -->
            @endif
            @if ($permiso == 'manto')
                <a href="">Mantenimientos</a>
            @endif
        @endforeach

    </div>
    @yield('content')

    <div class="footer">
        <h2>Footer</h2>
        <div class="row-footer copyright">
            <div class="col-md-footer text-center">
                <p>
                    <small class="block">&copy; 2016 Free HTML5. All Rights Reserved.</small>
                    <small class="block">Designed by <a href="http://freehtml5.co/" target="_blank">FreeHTML5.co</a>
                        Demo Images: <a href="http://unsplash.com/" target="_blank">Unsplash</a></small>
                </p>
            </div>
        </div>
    </div>

    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }
    </script>
    @yield('scripts')


</body>

</html>
