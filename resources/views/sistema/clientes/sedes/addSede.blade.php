@extends('adminlte::page')

@section('title', 'Sede')

@section('content_header')
    <h1>ADMINISTRACION DE SEDES</h1>
@stop

@section('content')
    <p>Ingrese la informacion de la Sede.</p>   

    <div class="card">
        
        <div class="card-head">
            <a href="{{route('sede.index')}}" class="btn btn-primary float-right mt-2 mr-2">Ver Sedes</a>
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
            <form action="{{route('sede.store')}}" method="post">
                @csrf

                 {{-- With prepend slot, lg size, and label --}}
                 <x-adminlte-select name="cliente_id" label="CLIENTE" label-class="text-lightblue"
                 igroup-size="lg">
                 <x-slot name="prependSlot">
                     <div class="input-group-text bg-gradient-info">
                         <i class="fas fa-car-side"></i>
                     </div>
                 </x-slot>
                 <option value="">Seleccionar Cliente </option>
                 @foreach($clients as $client)
                 <option value="{{ $client->id }}">{{ $client->razon_social }}</option>
                 @endforeach  
                 </x-adminlte-select>

                    {{-- With prepend slot --}}
                <x-adminlte-input type="text" name="nombre" label="SEDE" placeholder="Ingrese aqui la Sede" label-class="text-lightblue" value="{{ old('nombre') }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-user text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                    {{-- With prepend slot --}}
                <x-adminlte-input type="text" name="direccion" label="DIRECCION" placeholder="Ingrese aqui la Direccion" label-class="text-lightblue" value="{{ old('direccion') }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-user text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                    {{-- With prepend slot --}}
                <x-adminlte-input type="text" name="responsable" label="REPONSABLE" placeholder="Ingrese aqui el Responsable" label-class="text-lightblue" value="{{ old('responsable') }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-user text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                    {{-- With prepend slot --}}
                <x-adminlte-input type="text" name="telefono" label="TELEFONO" placeholder="Ingrese aqui el Telefono" label-class="text-lightblue" value="{{ old('telefono') }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-user text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                    {{-- With prepend slot --}}
                <x-adminlte-input type="text" name="email" label="EMAIL" placeholder="Ingrese aqui el Email" label-class="text-lightblue" value="{{ old('email') }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-user text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                    {{-- With prepend slot --}}
                <x-adminlte-input type="text" name="cedula" label="CEDULA" placeholder="Ingrese aqui la Cedula" label-class="text-lightblue" value="{{ old('cedula') }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-user text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                    {{-- With prepend slot --}}
                <x-adminlte-input type="text" name="cargo" label="CARGO" placeholder="Ingrese aqui el Cargo" label-class="text-lightblue" value="{{ old('cargo') }}">
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
