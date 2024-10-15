@extends('app')

@section('contenido')
<h1>Listado</h1>
    <table id="Listado" class="table table-striped table-bordered">
        <tbody>
            @foreach ($data as $d)
                <tr>
                    <td>
                        <a class="btn btn-success" title="Modificar indicio" href=''>
                            <i class="bi bi-card-list"></i>
                        </button>
                    </td>
                    <td>{{ $d->cni_ci }}</td>
                    <td>{{ $d->estado_ident }}</td>
                    <td><img src="{{ asset('fotos/' . $d->url) }}" class="d-block w-10" alt="..."></td>
                    <td>{{ $d->nombre }}</td>
                    <td>{{ $d->clave_elec }}</td>
                    <td>{{ $d->fecha_ingreso }}</td>
                    <!-- tatuajes -->
                    <!-- señas -->
                    <!-- vestimenta -->
                    <td>{{ $d->fecha_nac }}</td>
                    <td>{{ $d->edad }}</td>
                    <td>{{ $d->d_calle }}</td>
                    <td>{{ $d->d_num }}</td>
                    <td>{{ $d->d_col }}</td>
                    <td>{{ $d->d_est }}</td>
                    <td>{{ $d->d_muni }}</td>
                    <td>{{ $d->d_localidad }}</td>

                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        new DataTable('#Listado', {
            scrollY: '100%',
            columns: [
                {
                    title: 'Controles'
                },
                {
                    title: 'Folio'
                },
                {
                    title: 'Estatus quo'
                },
                {
                    title: 'Foto'
                },
                {
                    title: 'Nombre'
                },
                {
                    title: 'Clave de elector'
                },
                {
                    title: 'Fecha de ingreso'
                },
                //
                {
                    title: 'Fecha de nacimiento'
                },
                {
                    title: 'Edad'
                },
                {
                    title: 'Calle'
                },
                {
                    title: 'Numero'
                },
                {
                    title: 'Colonia'
                },
                {
                    title: 'Estado'
                },
                {
                    title: 'Municipio'
                },
                {
                    title: 'Localidad'
                },
            ],
            language: {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando <strong>_START_</strong> a <strong>_END_</strong> de <strong>_TOTAL_</strong> Entradas",
                "infoEmpty": "Mostrando <strong>0</strong> a <strong>0</strong> de <strong>0</strong> Entradas",
                "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Entradas",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "Sin resultados encontrados",
            },
            order: []
        });
    </script>
@endsection