@extends('app')

@php
    $data = session()->has('data') ? session('data') : null;
@endphp

@section('contenido')
    <style>
        /* Estilos para el botón fijo */
        .fixed-button {
            position: fixed;
            bottom: 12%;
            /* Espacio desde la parte inferior */
            left: 2%;
            /* Espacio desde la parte derecha */
            z-index: 9999;
            /* Mantener el botón en el frente */
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

    <a class="btn btn-warning fixed-button" href="/">
        Regresar
    </a>

    <div class="container pt-4">
        <div class="row">
            @if (is_null($data) || count($data) == 0)
                <div class="card mx-auto my-5" style="max-width: 600px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); background: #f8f9fa">
                    <div class="card-body text-center">
                        <h4 class="mb-0">No hay información disponible.</h4>
                    </div>
                </div>
            @else
                @foreach ($data as $d)
                    <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 mb-4">
                        <div
                            style="
                    background-color: #ffffff;
                    border-radius: 10px;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                    padding: 20px;
                    text-align: center;
                    display: flex;
                    flex-direction: column;
                    justify-content: space-between;
                    height: 100%;
                ">
                            <img src="{{ Storage::disk('public')->exists('fotos/' . $d->url) ? asset('storage/fotos/' . $d->url) : asset('fotos/' . $d->url) }}"
                                alt="Foto" style="width: 100%; height: auto; border-radius: 10px;">

                            <div style="padding-top: 20px;">
                                <h3 style="margin-bottom: 10px;">{{ $d->nombre }}</h3>
                                <p>Procedencia: <strong>{{ $d->d_muni }}, {{ $d->d_est }}</strong></p>
                            </div>

                            <div style="padding-top: 10px;">
                                <a href="{{ Storage::disk('public')->exists('cedulas/' . $d->cedid . '.jpg') ? asset('storage/cedulas/' . $d->cedid . '.jpg') : asset('cedulas/' . $d->cedid . '.jpg') }}"
                                    class="btn btn-sm btn-outline-primary" target="_blank">Cédula de identificación</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
