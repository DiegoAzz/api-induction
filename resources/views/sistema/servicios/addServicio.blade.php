@extends('adminlte::page')

@section('title', 'Servicio')

@section('content_header')
    <h1>ADMINISTRACION DE SERVICIOS</h1>
@stop

@section('content')
    <p>Ingrese el servicio.</p>

    <div class="card">

        <div class="card-head">
            <a href="{{route('servicio.index')}}" class="btn btn-primary float-right mt-2 mr-2">Ver Servicios</a>
        </div>

        @php
            if(@session()){
                if(session('message')=='ok'){
                    echo'<x-adminlte-alert class="bg-teal text-uppercase" icon="fa fa-lg fa-thumbs-up" title="Done" dismissable>
                        Registro Exitoso!
                    </x-adminlte-alert>';
                }
            }


        @endphp
        <div class="card-body">
            <form action="{{route('servicio.store')}}" method="post">
                @csrf
                    {{-- With prepend slot --}}
                <x-adminlte-input type="text" name="producto_servicio" label="RAZON SOCIAL" placeholder="Ingrese el Servicio/Producto" label-class="text-lightblue" value="{{ old('producto_servicio') }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-user text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>

                {{-- With prepend slot, sm size, and label --}}
                <x-adminlte-textarea name="descripcion" label="DESCRIPCION" rows=5 label-class="text-lightblue"
                igroup-size="sm" placeholder="Insertar Descripcion..."   value="{{ old('descripcion') }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-lg fa-file-alt text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-textarea>

                {{-- With prepend slot --}}
                <x-adminlte-input type="number" name="precio" label="precio" placeholder="Ingrese el Precio" label-class="text-lightblue" value="{{ old('precio') }}">
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

@stop
