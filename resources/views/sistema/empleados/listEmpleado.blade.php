@extends('adminlte::page')

@section('title', 'ListEmpleados')

@section('content_header')
    <h1>GESTION EMPLEADOS</h1>
@stop

@section('content')
    <p>Ingrese la información de todos los Empleados</p>

    <div class="card">
        <div class="card-head">
            <a href="{{ route('empresa.create') }}" class="btn btn-primary float-right mt-2 mr-2">Nuevo</a>
        </div>

        <br>

        {{-- Setup data for datatables --}}
        @php
            $heads = [
                'ID',
                'Nombres y Apellidos',
                'Cargo',
                'Funciones',
                'Imagen',
                ['label' => 'Actions', 'no-export' => true, 'width' => 10],
            ];

            $btnDelete = '<button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                            <i class="fa fa-lg fa-fw fa-trash"></i>
                          </button>';

            $config = [
                'language' => [
                    'url' => '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json',
                ],
            ];
        @endphp

        {{-- Datatable --}}
        <x-adminlte-datatable id="table1" :heads="$heads" :config="$config">
            @foreach($empleados as $empleado)
                <tr>
                    <td>{{ $empleado->id }}</td>
                    <td>{{ $empleado->nombre }}</td>
                    <td>{{ $empleado->cargo }}</td>
                    <td>{{ $empleado->funciones }}</td>
                    <td>
                        @if($empleado->imagen)
                            <img src="{{ asset('storage/' . $empleado->imagen) }}" alt="Foto" width="60" height="60"
                                 style="object-fit: cover; border-radius: 5px;">
                        @else
                            <span class="text-muted">Sin imagen</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('empresa.edit', $empleado) }}" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                            <i class="fa fa-lg fa-fw fa-pen"></i>
                        </a>

                        <form style="display: inline" action="{{ route('empresa.destroy', $empleado) }}" method="post" class="formEliminar">
                            @csrf
                            @method('delete')
                            {!! $btnDelete !!}
                        </form>
                    </td>
                </tr>
            @endforeach
        </x-adminlte-datatable>
    </div>
@stop

@section('css')
    {{-- Extra stylesheets si los necesitas --}}
@stop

@section('js')
<script>
    $(document).ready(function(){
        $('.formEliminar').submit(function(e){
            e.preventDefault();
            Swal.fire({
                title: "¿Estás seguro?",
                text: "¡Se va a eliminar un registro!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sí, eliminar"
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "Eliminado",
                        text: "El registro ha sido eliminado.",
                        icon: "success"
                    });
                    this.submit();
                }
            });
        });
    });
</script>
@stop
