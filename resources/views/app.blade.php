<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cedulas de Identificacion</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('/logoweb-1.png') }}">
    <link rel="shortcut icon" sizes="192x192" href="{{ asset('/logoweb-1.png') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.bootstrap5.js"></script>
    <link href="https://cdn.datatables.net/2.0.5/css/dataTables.bootstrap5.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    @livewireStyles

    <style>
        @import url('https://fonts.googleapis.com/css?family=Raleway:400,700');
        body {
            font-family: Raleway, sans-serif;
            display: flex;
            flex-direction: column;
        }
        /* Estilos personalizados para el navbar */
        .navbar-brand {
            flex-direction: column; /* Permitir que el logo y el título se apilen */
            align-items: center;    /* Centrar contenido en el eje horizontal */
        }

        .navbar-brand img {
            max-height: 50px; /* Ajustar el tamaño del logo */
        }

        .navbar-brand h1 {
            margin: 0; /* Eliminar margen del h1 */
            font-size: 1.25rem; /* Tamaño de texto responsivo */
            text-align: center; /* Centrar el texto */
        }

        /* Estilos para el botón en mobile */
        .navbar .btn {
            font-size: 0.8rem; /* Hacer el botón más pequeño en mobile */
            margin-top: 10px; /* Espaciado superior para separar del texto */
            margin-bottom: 10px; /* Espaciado inferior para separar del texto */
        }

        .footer {
            background: white;
            display: flex;
            align-items: center;
            justify-content: center; /* Centra todo el contenido del footer */
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 10px;
        }

        .footer-center {
            background-color: #003A70; /* Color de fondo */
            color: white;
            padding: 10px 20px; /* Espaciado interno */
            display: flex;
            align-items: center; /* Centra el texto verticalmente */
            height: 70px; /* Altura del contenedor */
            transform: skew(-20deg); /* Crea el efecto de paralelogramo */
        }

        .p-whi {
            background-color: white; /* Color de fondo */
            color: white;
            padding: 2px; /* Espaciado interno */
            display: flex;
            align-items: center; /* Centra el texto verticalmente */
            height: 70px; /* Altura del contenedor */
            transform: skew(-20deg); /* Crea el efecto de paralelogramo */
        }
        
        .p-gold {
            background-color: #ada200; /* Color de fondo */
            color: white;
            padding: 5px; /* Espaciado interno */
            display: flex;
            align-items: center; /* Centra el texto verticalmente */
            height: 70px; /* Altura del contenedor */
            transform: skew(-20deg); /* Crea el efecto de paralelogramo */
        }
        
        .footer-center p {
            transform: skew(20deg); /* Compensa la inclinación del texto para que esté recto */
            margin: 0; /* Elimina márgenes en el párrafo */
        }

        .footer-image {
            width: auto; /* Ajusta el tamaño de las imágenes según sea necesario */
            height: 70px;
        }

        .footer-image.left {
            margin-right: 10px; /* Ajusta el espacio entre la imagen izquierda y el contenedor central */
        }

        .footer-image.right {
            margin-left: 10px; /* Ajusta el espacio entre la imagen derecha y el contenedor central */
        }

        .nav-link:hover {
            color: #0202c5; /* Azul marino */
        }

        /* Ajustes responsivos */
        @media (min-width: 768px) {
            .navbar-brand {
                flex-direction: row; /* Cambiar a fila en pantallas más grandes */
            }
            .navbar .btn {
                margin-left: auto; /* Alinear el botón a la derecha */
                margin-top: 0; /* Eliminar el margen superior en pantallas grandes */
            }
        }
        
        @media (max-width: 1200px) {
            .footer {
                font-size: 50%; /* Ajusta este porcentaje según el tamaño deseado */
            }

            .footer-image {
                width: auto; /* Ajusta el tamaño de las imágenes según sea necesario */
                height: 50px; /* Ajusta el tamaño de las imágenes para pantallas medianas */
            }
        }
        
        @media (max-width: 600px) {
            .footer {
                font-size: 35%;
            }

            .footer-image {
                width: auto; /* Ajusta el tamaño de las imágenes según sea necesario */
                height: 35px;/* Ajusta el tamaño de las imágenes para pantallas pequeñas */
            }
        }
    </style>
</head>
<body style="background: #e9e9e9">
    <nav class="navbar bg-body-tertiary" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
        <div class="container-fluid px-4 px-md-5">
            <a class="navbar-brand d-flex align-items-center" href="/">
                <img src="https://www.fiscaliazacatecas.gob.mx/wp-content/uploads/2019/03/logoweb-1.png" alt="Logo" class="me-2">
                <h1 class="h4 mb-0 p-2">Búsqueda de Cédulas de Identificación</h1>
            </a>
            @auth
            <div class="d-flex align-items-center">
                <a class="mx-2 nav-link" href='/listado-admin'>Listado de administrador</a>
                <a class="mx-2 nav-link" href="/captura">Capturar registro</a>
            </div>
            @endauth
            <!-- Alinear el botón a la derecha en pantallas más grandes -->
            <div class="d-none d-md-flex"> <!-- Ocultar en móviles y mostrar en desktop -->
                <a href="https://www.fiscaliazacatecas.gob.mx/" class="btn btn-outline-primary me-2">Página Principal FGJEZ</a>
                @auth
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-outline-danger" type="submit">Salir</button>
                    </form>
                @endauth
            </div>

            <!-- Mostrar el botón centrado solo en móviles -->
            <div class="d-md-none w-100 text-center mt-2">
                <a href="https://www.fiscaliazacatecas.gob.mx/" class="btn btn-outline-primary">Página Principal FGJEZ</a>
                @auth
                    <form class="justify-content-md-end" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-outline-danger" type="submit">Salir</button>
                    </form>
                @endauth
            </div>
        </div>
    </nav>   

    <div class="contenido" style="margin-bottom:100px">
        @yield('contenido')
    </div>

    <footer class="footer">
        <img src="{{ asset('footer/img-f-2') . '.jpg' }}" alt="Imagen Izquierda" class="footer-image left">
        <div class="p-gold"></div>
        <div class="p-whi"></div>
        <div class="footer-center text-center">
            <p>SI RECONOCE A ESTA PERSONA, FAVOR DE COMUNICARSE AL TELEFONO
            <strong>TEL. 492 288 60 55</strong> CON PERSONAL DE LA
            FISCALÍA ESPECIALIZADA EN DESAPARICION DE PERSONAS</p>
        </div>
        <div class="p-whi"></div>
        <div class="p-gold"></div>
        <img src="{{ asset('footer/img-f-1') . '.jpg' }}" alt="Imagen Derecha" class="footer-image right">
    </footer>
    @livewireScripts
</body>
</html>
