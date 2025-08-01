@extends('app')

@section('contenido')
<style>
    /* Estilos para el botón fijo */
    .fixed-button {
        position: fixed;
        bottom: 12%; /* Espacio desde la parte inferior */
        left: 2%;  /* Espacio desde la parte derecha */
        z-index: 9999; /* Mantener el botón en el frente */
        padding: 10px 20px;
        font-size: 16px;
    }

    /* Responsivo: Ajustar tamaño del botón para pantallas más pequeñas */
    @media (max-width: 768px) {
        .fixed-button {
            bottom: 15%;
            left: 5%;
            font-size: 14px;
            padding: 8px 18px;
        }
    }

    @media (max-width: 480px) {
        .fixed-button {
            bottom: 12%;
            left: 5%;
            font-size: 12px;
            padding: 6px 16px;
        }
    }
</style>

<a 
        class="btn btn-warning fixed-button" 
        href="/"
    >
        Regresar
    </a>

<div id="carouselExampleIndicators" class="carousel slide p-4" style="max-height: 70vh; width: 100%;" data-bs-ride="carousel">
    {{-- <div class="text-center"><h1>Listado completo de cedulas de identificación</h1></div> --}}
    <div class="carousel-inner">
        @if(count($data) > 0)
            @foreach ($data as $index => $d)
                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                    <img src="{{ Storage::disk('public')->exists('cedulas/' . $d->cedid . '.jpg') ? asset('storage/cedulas/' . $d->cedid . '.jpg') : asset('cedulas/' . $d->cedid . '.jpg') }}" class="d-block w-100" alt="Imagen" style="object-fit: contain; height: 100%; max-height: 70vh;">
                </div>
            @endforeach
        @else
            <div class="carousel-item active">
                <img src="path-to-default-image.jpg" class="d-block w-100" alt="No Data Available" style="object-fit: contain; height: 100%; max-height: 70vh;">
            </div>
        @endif
    </div>

    <!-- Controles visibles con mejor contraste -->
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev" style="filter: invert(100%);">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next" style="filter: invert(100%);">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<!-- Spinner o mensaje de carga -->
<div id="loadingMessage" style="text-align: center; padding: 20px;">
    <p>Cargando imágenes...</p>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        let carousel = document.getElementById('carouselExampleIndicators');
        let loadingMessage = document.getElementById('loadingMessage');

        // Verifica si hay imágenes en el carrusel
        if (carousel.querySelectorAll('.carousel-item').length > 0) {
            loadingMessage.style.display = 'none';  // Oculta el mensaje de carga
            carousel.style.display = 'block';  // Muestra el carrusel cuando los datos estén listos
        } else {
            carousel.style.display = 'none';  // Mantén oculto el carrusel si no hay datos
            loadingMessage.style.display = 'block';  // Muestra el mensaje de carga
        }
    });
</script>

@endsection
