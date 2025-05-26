@extends('adminlte::page')

@section('title', 'empresa')

@section('content_header')
    <h1>ADMINISTRACION DE EMPLEADOS</h1>
@stop

@section('content')
    <p>Ingrese la informacion del Empleado.</p>

    <div class="card">

        <div class="card-head">
            <a href="{{route('empresa.index')}}" class="btn btn-primary float-right mt-2 mr-2">Ver Empleados</a>
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
          <form action="{{route('empresa.store')}}" method="post" enctype="multipart/form-data">

                @csrf
                    {{-- With prepend slot --}}
                <x-adminlte-input type="text" name="nombre" label="NOMBRES Y APELLIDOS" placeholder="Ingrese aqui Nombres y Apellidos" label-class="text-lightblue" value="{{ old('nombre') }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-user text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>

                    {{-- With prepend slot, lg size, and label --}}
                <x-adminlte-select name="cargo" label="CARGO" label-class="text-lightblue"
                igroup-size="lg">
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-info">
                        <i class="fas fa-car-side"></i>
                    </div>
                </x-slot>
                <option value="">Seleccionar Cargo </option>
                    <option value="Auxiliar de Limpieza">Auxiliar de Limpieza</option>
                    <option value="Auxiliar Administrativo">Auxiliar Administrativo</option>
                    <option value="Analista">Analista</option>
                    <option value="Contador">Contador</option>
                    <option value="Desarrollador">Desarrollador</option>
                    <option value="Gerente">Gerente</option>
                    <option value="Jefe Desarrollo">Jefe Desarrollo</option>
                    <option value="Jefe Recursos Humanos">Jefe Recursos Humanos</option>
                    <option value="Soporte">Soporte</option>
                </x-adminlte-select>

                    {{-- With prepend slot --}}
                <x-adminlte-input type="text" name="funciones" label="FUNCIONES" placeholder="Ingrese Funciones" label-class="text-lightblue" value="{{ old('funciones') }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-user text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                    {{-- With prepend slot --}}
                <x-adminlte-input type="file" name="imagen" label="FOTO" label-class="text-lightblue">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-image text-lightblue"></i>
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
