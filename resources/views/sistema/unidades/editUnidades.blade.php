@extends('adminlte::page')

@section('title', 'Unidades')

@section('content_header')
    <h1>GESTION  UNIDADES</h1>
@stop

@section('content')
    <p>Actualizar la informacion de Unidades.</p>

    <div class="card">
        <div class="card-head">
            <a href="{{route('unidades.index')}}" class="btn btn-primary float-right mt-2 mr-2">Ver Unidades</a>
        </div>
        <div class="card-body">
            <form action="{{route('unidades.update',$unidades)}}" method="post">
                @csrf
                @method('PUT')                    
                     
                {{-- With prepend slot, lg size, and label --}}
                <x-adminlte-select name="tipo_analisis" label="TIPO ANALISIS" label-class="text-lightblue" igroup-size="lg">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-gradient-info">
                            <i class="fas fa-car-side"></i>
                        </div>
                    </x-slot>
                    <option value="" disabled {{ empty($unidades->tipo_analisis) ? 'selected' : '' }}>Seleccionar Tipo Analisis</option>
                    <option value="Microbiologico" {{ $unidades->tipo_analisis == 'Microbiologico' ? 'selected' : '' }}>Microbiologico</option>
                    <option value="Fisicoquimico" {{ $unidades->tipo_analisis == 'Fisicoquimico' ? 'selected' : '' }}>Fisicoquimico</option>
                </x-adminlte-select>

                    {{-- With prepend slot --}}
                <x-adminlte-input type="text" name="parametro" label="PARAMETRO" placeholder="Ingrese aqui el Parametro" label-class="text-lightblue" value="{{ $unidades->parametro }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-user text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input> 
                    {{-- With prepend slot --}}
                <x-adminlte-input type="text" name="unidad" label="UNIDAD" placeholder="Ingrese aqui la Unidad" label-class="text-lightblue" value="{{ $unidades->unidad }}">
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
