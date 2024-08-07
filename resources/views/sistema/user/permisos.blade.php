@extends('adminlte::page')

@section('title', 'ListClientes')

@section('content_header')
    <h1>Administracion de Permisos</h1>
@stop

@section('content')
@php
if(@session()){
    if(session('message')=='ok'){
        echo'<x-adminlte-alert class="bg-teal text-uppercase" icon="fa fa-lg fa-thumbs-up" title="Done" dismissable>
            Registro Exitoso!
        </x-adminlte-alert>';
    }
}


@endphp

    <div class="card">
        <div class="card-header">
            <x-adminlte-button label="Nuevo" theme="primary" icon="fas fa-key" class="float-right" data-toggle="modal" data-target="#modalPurple" />
        </div>
                {{-- Setup data for datatables --}}
                @php
                $heads = [
                    'ID',
                    'Nombre',
                    ['label' => 'Actions', 'no-export' => true, 'width' => 10],
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
                    @foreach($permisos as $permiso)
                        <tr>
                            <td>{{ $permiso->id }}</td>
                            <td>{{ $permiso->name }}</td>
                            <td><a  href="{{ route('permisos.edit',$permiso)}}" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                <i class="fa fa-lg fa-fw fa-pen"></i>
                            </a>
                                <form style="display: inline" action="{{ route('permisos.destroy',$permiso) }}" method="post" class="formEliminar">
                                    @csrf
                                    @method('delete')
                                    {!! $btnDelete !!}
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </x-adminlte-datatable>


        </div>
    </div>


    {{-- Themed --}}
<x-adminlte-modal id="modalPurple" title="Nuevo Permiso" theme="primary"
icon="fas fa-bolt" size='lg' disable-animations>
<form action="{{ route('permisos.store')}}" method="post">
    @csrf
{{-- With label, invalid feedback disabled, and form group class --}}
<div class="row">
    <x-adminlte-input name="nombre" label="Nombre" placeholder="Aqui su permiso!"
        fgroup-class="col-md-6" disable-feedback/>
</div>
{{-- Button with themes and icons --}}
<x-adminlte-button type="submit" label="Guardar" theme="primary" icon="fas fa-key"/>
</form>
</x-adminlte-modal>



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
                text: "Se va eliminar el permiso!",
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
