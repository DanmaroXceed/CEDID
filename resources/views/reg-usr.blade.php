@extends('app')
@section('contenido')
    <div style="display: flex; justify-content: center; align-items: center; margin-top: 40px; margin-bottom: 40px;">
        <a href="/usrs" class="btn btn-outline-success">Listado de usuarios</a>
    </div>
    @livewire('register-user')
@endsection
