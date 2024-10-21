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
    </style>
</head>
<body style="height: 100vh; background: #e9e9e9">
    <nav class="navbar bg-body-tertiary" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
        <div class="container-fluid px-4 px-md-5">
            <a class="navbar-brand d-flex align-items-center">
                <img src="https://www.fiscaliazacatecas.gob.mx/wp-content/uploads/2019/03/logoweb-1.png" alt="Logo" class="me-2">
                <h1 class="h4 mb-0 p-2">Busqueda de Cédulas de Identificación</h1>
            </a>
            <!-- Alinear el botón a la derecha en pantallas más grandes -->
            <div class="d-none d-md-block"> <!-- Ocultar en móviles y mostrar en desktop -->
                <a href="https://www.fiscaliazacatecas.gob.mx/" class="btn btn-outline-primary">Página Principal FGJEZ</a>
            </div>

            <!-- Mostrar el botón centrado solo en móviles -->
            <div class="d-md-none w-100 text-center mt-2">
                <a href="https://www.fiscaliazacatecas.gob.mx/" class="btn btn-outline-primary">Página Principal FGJEZ</a>
            </div>
        </div>
    </nav>   

    <div class="contenido" style="">
        @yield('contenido')
    </div>
    @livewireScripts
</body>
</html>