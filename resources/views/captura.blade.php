@extends('app')

@section('contenido')
<style>
.box-shadow-rounded {
    background-color: #f0f0f0; /* Fondo blanco */
    border-radius: 8px; /* Bordes redondeados */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Sombra suave */
    padding: 20px; /* Espaciado interno */
}

small{
    color: red;
}
</style>
    <livewire:FormCaptura />
@endsection