@extends('adminlte::page')

@section('title', 'Editar')

@section('content_header')
    <h1>GESTION CLIENTES</h1>
@stop

@section('content')
    <p>Editar la informacion del cliente.</p>

    <div class="card">

        <div class="card-head">
            <a href="{{route('cliente.index')}}" class="btn btn-primary float-right mt-2 mr-2">Ver Clientes</a>
        </div><br>

        <div class="card-body">
            <form action="{{route('cliente.update',$cliente)}}" method="post">
                @csrf
                @method('PUT')
                    {{-- With prepend slot --}}
                <x-adminlte-input type="text" name="razon_social" label="RAZON SOCIAL" label-class="text-lightblue" value="{{ $cliente->razon_social }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-user text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                    {{-- With prepend slot --}}
                <x-adminlte-input type="text" name="nit" label="Nit" label-class="text-lightblue" value="{{ $cliente->nit }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-user text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                    {{-- With prepend slot --}}
                <x-adminlte-input type="text" name="email" label="Email" label-class="text-lightblue" value="{{ $cliente->email }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-user text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                    {{-- With prepend slot --}}
                <x-adminlte-input type="text" name="telefono" label="TELEFONO" label-class="text-lightblue" value="{{ $cliente->telefono }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-user text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                {{-- With prepend slot, sm size, and label --}}
                <x-adminlte-textarea name="direccion" label="DIRECCION" rows=5 label-class="text-lightblue"
                igroup-size="sm" placeholder="Insertar Direccion..." >
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-dark">
                        <i class="fas fa-lg fa-file-alt text-lightblue"></i>
                    </div>
                </x-slot>
                {{ $cliente->direccion }}
                </x-adminlte-textarea>
                    {{-- With prepend slot --}}
                <x-adminlte-input type="text" name="ciudad" label="CIUDAD"  label-class="text-lightblue" value="{{ $cliente->ciudad }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-user text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                    {{-- With prepend slot --}}
                <x-adminlte-input type="text" name="contacto" label="CONTACTO" label-class="text-lightblue" value="{{ $cliente->contacto }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-user text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input> 
                <x-adminlte-button type="submit" label="Guardar" theme="primary" icon="fas fa-save"/>
            </form>
        </div>
    </div>

@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script>
        @if (session("message"))
            $(document).ready(function(){
                let mensaje = "{{ session ('message')}}"
                Swal.fire({
                    'title':'Resultado',
                    'text':mensaje,
                    'icon':'success'
                })
            })

        @endif
    </script>
@stop
