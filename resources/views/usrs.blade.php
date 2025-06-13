@extends('app')

@section('contenido')

    <div style="display: flex; justify-content: center; align-items: center; margin-top: 40px; margin-bottom: 40px;">
        <a href="/usrs/reg-usr" class="btn btn-outline-success">Registrar usuario</a>
    </div>

    @if (is_null($usrs) || count($usrs) == 0)
        <div class="card mx-auto my-5"
            style="max-width: 600px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); background: #f8f9fa">
            <div class="card-body text-center">
                <h4 class="mb-0">No hay usuarios registrados.</h4>
            </div>
        </div>
    @else
        <div class="container mt-4">
            <h4>Lista de Usuarios</h4>

            @if ($usrs->isEmpty())
                <div class="alert alert-info">No hay usuarios registrados.</div>
            @else
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3">
                    @foreach ($usrs as $usr)
                        <div class="col">
                            <div class="card h-100 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $usr->name }}</h5>
                                    <p class="card-text">
                                        <strong>Email:</strong> {{ $usr->email }}<br>
                                        <strong>Tipo:</strong> {{ $usr->type == 2 ? 'General' : 'Administrador' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

    @endif
@endsection
