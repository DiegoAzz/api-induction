@extends('adminlte::page')

@section('title', 'ListClientes')

@section('content_header')
    <h1>GESTION SEDES</h1>
@stop

@section('content')
    <p>Lista todas las Sedes.</p>

    <div class="card">
        
            <div class="card-head">
            <a href="{{route('sede.create')}}" class="btn btn-primary float-right mt-2 mr-2">Nuevo</a>
            </div>
     
        <br>
                {{-- Setup data for datatables --}}
                @php
                $heads = [
                    'ID',
                    'Sede',
                    'Direccion',
                    'Responsable',
                    ['label' => 'Telefono', 'width' => 15],
                    'Email',
                    'Cedula',
                    'Cargo',                                     
                    ['label' => 'Actions', 'no-export' => true, 'width' => 5],
                ];

                $btnEdit = '';
                $btnDelete = '<button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                                <i class="fa fa-lg fa-fw fa-trash"></i>
                            </button>';
                $btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                                <i class="fa fa-lg fa-fw fa-eye"></i>
                            </button>';

                $config = [
                    'language'=>[
                        'url' => '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json',
                    ]
                ];
                @endphp

                {{-- Minimal example / fill data using the component slot --}}
                <x-adminlte-datatable id="table1" :heads="$heads" :config="$config">
                    @foreach($sedes as $sede)
                        <tr>
                            <td>{{ $sede->id }}</td>
                            <td>{{ $sede->nombre }}</td>
                            <td>{{ $sede->direccion }}</td>
                            <td>{{ $sede->responsable }}</td>
                            <td>{{ $sede->telefono }}</td>
                            <td>{{ $sede->email }}</td>
                            <td>{{ $sede->cedula }}</td>
                            <td>{{ $sede->cargo }}</td>
                            <td>{{ $sede->client_id }}</td>

                            <td>
                            <div class="d-flex">
                                <a  href="{{ route('sede.edit',$sede)}}" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                    <i class="fa fa-lg fa-fw fa-pen"></i>
                                </a>
                        
                                    <form style="display: inline" action="{{ route('sede.destroy',$sede) }}" method="post" class="formEliminar">
                                        @csrf
                                        @method('delete')
                                        {!! $btnDelete !!}
                                    </form>
                            </div>
                          
                            </td>
                        </tr>
                    @endforeach
                </x-adminlte-datatable>


        </div>
    </div>

@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
<script>
    $(document).ready(function(){
        $('.formEliminar').submit(function(e){
            e.preventDefault();
            Swal.fire({
                title: "Estas seguro?",
                text: "Se va eliminar un registro!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
              }).then((result) => {
                if (result.isConfirmed) {

                  Swal.fire({
                    title: "Deleted!",
                    text: "Your file has been deleted.",
                    icon: "success"
                  });
                  this.submit();
                }
              });
        })
    })
</script>
@stop
