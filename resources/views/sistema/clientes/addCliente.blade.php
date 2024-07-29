@extends('adminlte::page')

@section('title', 'Cliente')

@section('content_header')
    <h1>ADMINISTRACION DE CLIENTES</h1>
@stop

@section('content')
    <p>Ingrese la informacion del cliente.</p>

    <div class="card">

        <div class="card-head">
            <a href="{{route('cliente.index')}}" class="btn btn-primary float-right mt-2 mr-2">Ver Clientes</a>
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
            <form action="{{route('cliente.store')}}" method="post">
                @csrf
                    {{-- With prepend slot --}}
                <x-adminlte-input type="text" name="razon_social" label="RAZON SOCIAL" placeholder="Ingrese aqui la Razon Social" label-class="text-lightblue" value="{{ old('razon_social') }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-user text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                    {{-- With prepend slot --}}
                <x-adminlte-input type="text" name="nit" label="NIT" placeholder="Ingrese Nit" label-class="text-lightblue" value="{{ old('nit') }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-user text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                    {{-- With prepend slot --}}
                <x-adminlte-input type="text" name="email" label="EMAIL" placeholder="Ingrese Email" label-class="text-lightblue" value="{{ old('email') }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-user text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                    {{-- With prepend slot --}}
                <x-adminlte-input type="text" name="telefono" label="TELEFONO" placeholder="t+8598987978" label-class="text-lightblue" value="{{ old('telefono') }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-phone text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>

                    {{-- With prepend slot, sm size, and label --}}
                <x-adminlte-textarea name="direccion" label="DIRECCION" rows=5 label-class="text-lightblue"
                igroup-size="sm" placeholder="Insertar Direccion..."   value="{{ old('direccion') }}">
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-dark">
                        <i class="fas fa-lg fa-file-alt text-lightblue"></i>
                    </div>
                </x-slot>

                </x-adminlte-textarea>

                   {{-- With prepend slot --}}
                <x-adminlte-input type="text" name="ciudad" label="CIUDAD" placeholder="Ej:Cartagena" label-class="text-lightblue" value="{{ old('ciudad') }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-phone text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>

                   {{-- With prepend slot --}}
                <x-adminlte-input type="text" name="contacto" label="CONTACTO" placeholder="Ingrese el Contacto" label-class="text-lightblue" value="{{ old('contacto') }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-phone text-lightblue"></i>
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
