@extends('app')

@if(session('data'))
    @php
        $data = session('data');   
    @endphp
@endif

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


    <div class="">
        <?php if (!isset($data)): ?>
            <h1 class="text-center p-4">No hay información disponible.</h1> <!-- Mensaje cuando el dato está vacío -->
        <?php endif; ?>
    </div>

    <div class="container pt-4">
        <div class="row">
            @if (isset($data))    
                @foreach ($data as $d)
                <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 mb-4"> <!-- Responsivo: Ajusta el número de columnas según el tamaño de pantalla -->
                    <div style="
                        background-color: #ffffff;
                        border-radius: 10px;
                        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                        padding: 20px;
                        text-align: center;
                        display: flex;
                        flex-direction: column;
                        justify-content: space-between; /* Esto asegura que todo esté distribuido uniformemente */
                        height: 100%; /* Asegura que todas las tarjetas tengan la misma altura */
                    ">
                        <!-- Imagen de la tarjeta -->
                        <img src="{{ asset('fotos/' . $d->url) }}" alt="Foto" style="
                            width: 100%;
                            height: auto;
                            border-radius: 10px;
                        ">
                        
                        <!-- Información -->
                        <div style="padding-top: 20px;">
                            <h3 style="margin-bottom: 10px;">{{ $d->nombre }}</h3>
                            <p>Procedencia: <strong>{{ $d->d_muni }}, {{ $d->d_est }}</strong></p>
                        </div>
                        
                        <!-- Botón de la tarjeta -->
                        <div style="padding-top: 10px;">
                            <a href="{{ asset('cedulas/' . $d->cedid) . '.jpg' }}" class="btn btn-sm btn-outline-primary" target="_blank">Cédula de identificación</a>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection