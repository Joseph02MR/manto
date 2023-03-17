<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('title')
    <!--Made with love by Mutiullah Samim -->
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
    <link rel="stylesheet" href="css/main.css">
    @yield('head')
</head>

<body>
    <div class="header">
        <h1>My Website</h1>
        <p>A website created by me.</p>
    </div>

    <div class="navbar">
        <a href="#"><span style="font-size:15px;cursor:pointer" onclick="openNav()">&#9776;</span></a>
        <a href="#" class="right">Link</a>
        <a href="#" class="right">Link</a>
        <a href="#" class="right">Link</a>
    </div>

    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        
        <a href="#">Máquinas</a>    
        @if ($permisos)
            <a href="#">Permisos</a>    
        @endif
        @if (!$permisos)
            <a href="#">Permisos</a>    
        @endif
        
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
