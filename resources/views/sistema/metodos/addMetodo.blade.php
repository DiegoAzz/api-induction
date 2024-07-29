@extends('adminlte::page')

@section('title', 'Metodo')

@section('content_header')
    <h1>ADMINISTRACION DE METODOS</h1>
@stop

@section('content')
    <p>Ingrese la informacion de Metodos.</p>   

    <div class="card">
        
        <div class="card-head">
            <a href="{{route('metodo.index')}}" class="btn btn-primary float-right mt-2 mr-2">Ver Metodos</a>
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
            <form action="{{route('metodo.store')}}" method="post">
                @csrf

                 {{-- With prepend slot, lg size, and label --}}
                 <x-adminlte-select name="tipo_analisis" label="TIPO ANALISIS" label-class="text-lightblue" igroup-size="lg">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-gradient-info">
                            <i class="fas fa-car-side"></i>
                        </div>
                    </x-slot>
                    <option value="">Seleccionar Tipo Analisis </option>
                    <option value="Microbiologico">Microbiologico</option>
                    <option value="Fisicoquimico">Fisicoquimico</option>
                 </x-adminlte-select>
 
                     {{-- With prepend slot, lg size, and label --}}
                 <x-adminlte-select name="parametro" label="PARAMETRO" label-class="text-lightblue"
                 igroup-size="lg">
                 <x-slot name="prependSlot">
                     <div class="input-group-text bg-gradient-info">
                         <i class="fas fa-car-side"></i>
                     </div>
                 </x-slot>
                 <option value="">Seleccionar Parametro </option>
                    @foreach ($parametros as $parametro)
                        <option value="{{ $parametro->parametro  }}">{{ $parametro->parametro }}</option> 
                    @endforeach
                 </x-adminlte-select>

                     {{-- With prepend slot --}}
                 <x-adminlte-input type="text" name="metodo" label="METODO" placeholder="Ingrese aqui el Metodo" label-class="text-lightblue" value="{{ old('metodo') }}">
                     <x-slot name="prependSlot">
                         <div class="input-group-text">
                             <i class="fas fa-user text-lightblue"></i>
                         </div>
                     </x-slot>
                 </x-adminlte-input> 

                     {{-- With prepend slot, lg size, and label --}}
                 <x-adminlte-select name="unidades" label="UNIDADES" label-class="text-lightblue"
                 igroup-size="lg">
                 <x-slot name="prependSlot">
                     <div class="input-group-text bg-gradient-info">
                         <i class="fas fa-car-side"></i>
                     </div>
                 </x-slot>
                 <option value="">Seleccionar Tipo Analisis </option>
                    @foreach ($unidades as $unidad)
                        <option value="{{ $unidad->unidad  }}">{{ $unidad->unidad }}</option> 
                    @endforeach
                </x-adminlte-select>
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
