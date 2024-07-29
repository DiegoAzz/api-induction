@extends('adminlte::page')

@section('title', 'Cliente')

@section('content_header')
    <h1>ADMINISTRACION DE PARAMETROS MICROBIOLOGICO</h1>
@stop

@section('content')
    <p>Ingrese la informacion de parametros.</p>

    <div class="card">

        <div class="card-head">
            <a href="{{route('parametro.index')}}" class="btn btn-primary float-right mt-2 mr-2">Ver Parametros</a>
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
            <form action="{{route('parametro.store')}}" method="post">
                @csrf
                    {{-- With prepend slot --}}
                <x-adminlte-input type="text" name="parametro" label="PARAMETRO" placeholder="Ingrese aqui el parametro" label-class="text-lightblue" value="{{ old('parametro') }}">
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
