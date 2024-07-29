@extends('adminlte::page')

@section('title', 'EditParametro')

@section('content_header')
    <h1>GESTION ACTUALIZAR PARAMETRO MICROBIOLOGICO</h1>
@stop

@section('content')
    <p>Actualizar la informacion del Parametro Microbiologico.</p>

    <div class="card">
        <div class="card-head">
            <a href="{{route('parametro.index')}}" class="btn btn-primary float-right mt-2 mr-2">Ver Parametros</a>
        </div>
        <div class="card-body">
            <form action="{{route('parametro.update',$parametro)}}" method="post">
                @csrf
                @method('PUT')
                    {{-- With prepend slot --}}
                <x-adminlte-input type="text" name="parametro" label="PARAMETRO" label-class="text-lightblue" value="{{ $parametro->parametro }}">
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
