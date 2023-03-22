<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('title')
    <!--Made with love by Mutiullah Samim -->
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
    @yield('head')
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>

<body>
    <div class="header">
        <h1>Bem vindo a manutenção</h1>
        <p>Sviluppato dal team Le José.</p>
    </div>

    <div class="navbar">
        <a href="#"><span style="font-size:15px;cursor:pointer" onclick="openNav()">&#9776;</span></a>
        <a href="{{ route('logout') }}" class="right">Cerrar sessión</a>
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
        <a href="{{ route('landing') }}">Máquina usuario</a>
        @foreach ($permisos as $permiso)
            @if ($permiso == 'admin')
                <a href="{{ route('usuarios') }}">Usuarios</a>
                <a href="{{ route('manto') }}">Mantenimientos</a>
                <a href="{{ route('reportes') }}">Reportes</a>
                <a href="{{ route('bitacora') }}">Bitácora</a>
                <a href="{{ route('maquinas.admin') }}">Máquinas</a>
                <!--TODO: Definir vistas admin -->
            @endif
            @if ($permiso == 'manto')
                <a href="{{ route('manto') }}">Mantenimientos</a>
            @endif
        @endforeach

    </div>
    @yield('content')

    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <h6>About</h6>
                    <p class="text-justify">Scanfcode.com <i>CODE WANTS TO BE SIMPLE </i> is an initiative to help the
                        upcoming programmers with the code. Scanfcode focuses on providing the most efficient code or
                        snippets as the code wants to be simple. We will help programmers build up concepts in different
                        programming languages that include C, C++, Java, HTML, CSS, Bootstrap, JavaScript, PHP, Android,
                        SQL and Algorithm.</p>
                </div>

                <div class="col-xs-6 col-md-3">
                    <h6>Categories</h6>
                    <ul class="footer-links">
                        <li><a href="http://scanfcode.com/category/c-language/">C</a></li>
                        <li><a href="http://scanfcode.com/category/front-end-development/">UI Design</a></li>
                        <li><a href="http://scanfcode.com/category/back-end-development/">PHP</a></li>
                        <li><a href="http://scanfcode.com/category/java-programming-language/">Java</a></li>
                        <li><a href="http://scanfcode.com/category/android/">Android</a></li>
                        <li><a href="http://scanfcode.com/category/templates/">Templates</a></li>
                    </ul>
                </div>

                <div class="col-xs-6 col-md-3">
                    <h6>Quick Links</h6>
                    <ul class="footer-links">
                        <li><a href="http://scanfcode.com/about/">About Us</a></li>
                        <li><a href="http://scanfcode.com/contact/">Contact Us</a></li>
                        <li><a href="http://scanfcode.com/contribute-at-scanfcode/">Contribute</a></li>
                        <li><a href="http://scanfcode.com/privacy-policy/">Privacy Policy</a></li>
                        <li><a href="http://scanfcode.com/sitemap/">Sitemap</a></li>
                    </ul>
                </div>
            </div>
            <hr>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-6 col-xs-12">
                    <p class="copyright-text">Copyright &copy; 2017 All Rights Reserved by
                        <a href="#">Scanfcode</a>.
                    </p>
                </div>

                <div class="col-md-4 col-sm-6 col-xs-12">
                    <ul class="social-icons">
                      <li><a class="facebook" href="#"><img src="https://cdn3.iconfinder.com/data/icons/capsocial-round/500/facebook-512.png"></a></li>
                      <li><a class="twitter" href="#"><img src="https://cdn3.iconfinder.com/data/icons/capsocial-round/500/twitter-512.png"></a></li>
                      <li><a class="dribbble" href="#"><img src="https://cdn3.iconfinder.com/data/icons/capsocial-round/500/dribbble-512.png"></a></li>
                      <li><a class="linkedin" href="#"><img src="https://cdn3.iconfinder.com/data/icons/capsocial-round/500/linkedin-512.png"></a></li>
                    </ul>
                  </div>
            </div>
        </div>
    </footer>

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
