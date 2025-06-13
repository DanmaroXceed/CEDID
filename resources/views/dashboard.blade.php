@extends('app')
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

    {{-- {{ $data }} --}}
    <div class="container my-4">
        <a class="btn btn-warning fixed-button" href="/listado-admin">
            Limpiar
        </a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}

                @if (session('cedula'))
                    @php
                        $timestamp = time();
                        $cedula = session('cedula');
                        $url = Storage::disk('public')->exists('cedulas/' . $cedula . '.jpg')
                            ? asset('storage/cedulas/' . $cedula . '.jpg') . '?v=' . $timestamp
                            : asset('cedulas/' . $cedula . '.jpg') . '?v=' . $timestamp;
                    @endphp

                    <a href="{{ $url }}" target="_blank" class="btn btn-sm btn-success mx-3">
                        Ver cédula modificada
                    </a>
                @endif
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('listado-admin') }}" method="GET" class="d-flex mb-3">
            <input type="text" name="query" class="form-control me-2" placeholder="Buscar..."
                value="{{ request('query') }}">
            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>

        <div class="row justify-content-center">
            @foreach ($data as $d)
                <div class="col-12 col-md-10 col-lg-8 mb-4">
                    <div class="d-flex align-items-center p-3 bg-white shadow-sm rounded-3">
                        <!-- Imagen -->
                        <div class="flex-shrink-0 me-3">
                            <img src="{{ Storage::disk('public')->exists('fotos/' . $d->foto_url) ? asset('storage/fotos/' . $d->foto_url) : asset('fotos/' . $d->foto_url) }}"
                                alt="Imagen de {{ $d->nombre }}" class="img-fluid rounded"
                                style="width: 80px; height: 80px; object-fit: cover;">
                        </div>

                        <!-- Texto -->
                        <div class="flex-grow-1">
                            <p class="mb-0">{{ $d->nombre }}</p>
                            {{-- <small class="text-muted">{{ $d->descripcion }}</small> --}}
                        </div>

                        <div class="ms-3">
                            <a href="{{ Storage::disk('public')->exists('cedulas/' . $d->cedid . '.jpg') ? asset('storage/cedulas/' . $d->cedid . '.jpg') : asset('cedulas/' . $d->cedid . '.jpg') }}"
                                class="btn btn-sm btn-outline-primary px-2" target="_blank">Cédula de identificación</a>
                        </div>

                        @if (session('lc'))
                            @php
                                $estadoTexto = '';
                                $badgeClass = '';

                                switch ($d->estado_ident) {
                                    case 'NR':
                                        $estadoTexto = 'No Reconocido';
                                        $badgeClass = 'badge bg-secondary'; // gris
                                        break;
                                    case 'R':
                                        $estadoTexto = 'Entregado';
                                        $badgeClass = 'badge bg-success'; // verde
                                        break;
                                    case 'FR':
                                        $estadoTexto = 'Finalmente Reconocido';
                                        $badgeClass = 'badge bg-primary'; // azul
                                        break;
                                    default:
                                        $estadoTexto = 'Estado Desconocido';
                                        $badgeClass = 'badge bg-dark'; // negro
                                        break;
                                }
                            @endphp

                            <div class="ms-3">
                                <span class="{{ $badgeClass }} px-3 py-2 fs-6 fw-semibold">
                                    {{ $estadoTexto }}
                                </span>
                            </div>
                        @else
                            <div class="ms-3">
                                <div class="text-center mb-3">
                                    <span class="fw-semibold">Marcar como:</span>
                                </div>

                                <div class="d-grid gap-2">
                                    {{-- Botón ENTREGADO --}}
                                    <form action="{{ route('recuperado', ['dato' => $d->id]) }}" method="POST">
                                        @csrf
                                        <button class="btn btn-warning fw-bold shadow-sm w-100" type="submit"
                                            onclick="return confirmRecuperado()">
                                            ENTREGADO
                                        </button>
                                    </form>

                                    {{-- Botón FINAMENTE RECONOCIDO --}}
                                    <form action="{{ route('fr', ['dato' => $d->id]) }}" method="POST">
                                        @csrf
                                        <button class="btn btn-secondary fw-bold shadow-sm w-100" type="submit"
                                            onclick="return confirm('¿Estás seguro de realizar esta acción?')"
                                            {{ $d->estado_ident === 'FR' ? 'disabled' : '' }}>
                                            FINAMENTE RECONOCIDO
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Enlaces de paginación -->
        <div class="d-flex justify-content-center mt-4">
            {{ $data->links('pagination::bootstrap-4') }}
        </div>
    </div>

    <script>
        function confirmRecuperado() {
            // Mostrar un cuadro de confirmación
            var confirmAction = confirm("¿Estás seguro de que quieres marcar este elemento como recuperado?");

            // Si el usuario confirma, el formulario se envía. Si no, se cancela el envío
            if (confirmAction) {
                return true;
            } else {
                return false;
            }
        }
    </script>


@endsection
