@extends('app')

@if(session('data'))
    @php
        $data = session('data');   
    @endphp
@endif

@section('contenido')
    <a 
        class="btn btn-warning" 
        href="/"
        style="position: fixed; bottom: 5%; left: 2%;"
    >
        Regresar
    </a>

    {{-- <div class='container pt-4' >
        <div class='row'>
            @foreach ($data as $d)
            <div class="col-md-2 mb-4"> <!-- Aquí definimos cuántas tarjetas caben por fila -->
                <div class="card" style="width: 10rem;">
                    <img src="{{ asset('fotos/' . $d->url) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $d->nombre }}</h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Fecha de nacimiento: <strong>{{ $d->fecha_nac }}</strong></li>
                        <li class="list-group-item">Procedencia: <strong>{{ $d->d_muni }}, {{ $d->d_est }}</strong></li>
                    </ul>
                    <div class="card-body">
                        <a href="{{ asset('cedulas/' . $d->cedid) . '.jpg' }}" class="btn btn-sm btn-outline-primary" target="_blank">Cédula de identificación</a>
                        <!-- <a href="#" class="card-link">Another link</a> -->
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div> --}}

    <div class="container pt-4">
        <div class="row">
            @foreach (session('data', []) as $d)
            <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 mb-4"> <!-- Responsivo: Ajusta el número de columnas según el tamaño de pantalla -->
                <div style="
                    background-color: #ffffff;
                    border-radius: 10px;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                    padding: 20px;
                    text-align: center;
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
                        <p style="color: #777;">Descripción o información adicional</p>
                        <p>Procedencia: <strong>{{ $d->d_muni }}, {{ $d->d_est }}</strong></p>
                        <a href="{{ asset('cedulas/' . $d->cedid) . '.jpg' }}" class="btn btn-sm btn-outline-primary" target="_blank">Cédula de identificación</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection