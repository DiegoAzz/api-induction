@extends('adminlte::page')

@section('title', 'Editar')

@section('content_header')
    <h1>GESTION SERVICIOS</h1>
@stop

@section('content')
    <p>Editar la informacion de Servicios / Productos.</p>

    <div class="card">

        <div class="card-head">
            <a href="{{route('servicio.index')}}" class="btn btn-primary float-right mt-2 mr-2">Ver Servicios / Productos</a>
        </div><br>

        <div class="card-body">
            <form action="{{route('servicio.update',$servicio)}}" method="post">
                @csrf
                @method('PUT')               
              

                    {{-- With prepend slot --}}
                    <x-adminlte-input type="text" name="producto_servicio" label="SERVICIO/PRODUCTO" placeholder="Ingrese el Servicio/Producto" label-class="text-lightblue" value="{{ $servicio->producto_servicio }}">
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fas fa-user text-lightblue"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
    
                    {{-- With prepend slot, sm size, and label --}}
                    <x-adminlte-textarea name="descripcion" label="DESCRIPCION" rows=5 label-class="text-lightblue"
                    igroup-size="sm" placeholder="Insertar Descripcion..." >
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-dark">
                                <i class="fas fa-lg fa-file-alt text-lightblue"></i>
                            </div>
                        </x-slot>
                        {{ $servicio->descripcion }}
                    </x-adminlte-textarea>
    
                    {{-- With prepend slot --}}
                    <x-adminlte-input type="number" name="precio" label="precio" placeholder="Ingrese el Precio" label-class="text-lightblue" value="{{ $servicio->precio }}">
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
