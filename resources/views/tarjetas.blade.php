@extends('app')

@section('contenido')
    <a 
        class="btn btn-warning" 
        href="/"
        style="position: fixed; top: 20px; left: 20px;"
    >
        Regresar
    </a>

    <div class='container  pt-4'>
        <form class="d-flex mb-4" role="search" method="GET" action="{{ route('inicio') }}">
            <input class="form-control me-2" type="search" name="search" placeholder="Buscar" value="{{ request('search') }}" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Buscar</button>
        </form>
        <div class='row'>
            @foreach ($data as $d)
            <div class="col-md-3 mb-4"> <!-- Aquí definimos cuántas tarjetas caben por fila -->
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('fotos/' . $d->url) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $d->nombre }}</h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Fecha de nacimiento: <strong>{{ $d->fecha_nac }}</strong></li>
                        <li class="list-group-item">Procedencia: <strong>{{ $d->d_muni }}, {{ $d->d_est }}</strong></li>
                    </ul>
                    <div class="card-body">
                        <a href="{{ asset('cedulas/' . $d->cedid) . '.jpg' }}" class="card-link" target="_blank">Cédula de identificación</a>
                        <!-- <a href="#" class="card-link">Another link</a> -->
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection