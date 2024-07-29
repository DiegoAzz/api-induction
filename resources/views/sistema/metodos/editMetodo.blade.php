@extends('adminlte::page')

@section('title', 'Editar')

@section('content_header')
    <h1>GESTION METODOS</h1>
@stop

@section('content')
    <p>Actualizamos la informacion de las Sedes.</p>

    <div class="card">

        <div class="card-head">
            <a href="{{route('metodo.index')}}" class="btn btn-primary float-right mt-2 mr-2">Ver Metodos</a>
        </div><br>

 
        <div class="card-body">
            <form action="{{route('metodo.update',$metodo)}}" method="post">
                @csrf
                @method('PUT')
                 {{-- With prepend slot, lg size, and label --}}
                 <x-adminlte-select name="tipo_analisis" label="TIPO ANALISIS" label-class="text-lightblue" igroup-size="lg">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-gradient-info">
                            <i class="fas fa-car-side"></i>
                        </div>
                    </x-slot>
                    <option value="" disabled {{ empty($metodo->tipo_analisis) ? 'selected' : '' }}>Seleccionar Tipo Analisis</option>
                    <option value="Microbiologico" {{ $metodo->tipo_analisis == 'Microbiologico' ? 'selected' : '' }}>Microbiologico</option>
                    <option value="Fisicoquimico" {{ $metodo->tipo_analisis == 'Fisicoquimico' ? 'selected' : '' }}>Fisicoquimico</option>
                </x-adminlte-select>
 
            {{-- With prepend slot, lg size, and label --}}
            <x-adminlte-select name="parametro" label="PARAMETRO" label-class="text-lightblue" igroup-size="lg">
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-info">
                        <i class="fas fa-car-side"></i>
                    </div>
                </x-slot>
                <option value="">Seleccionar Parametro</option>
                @foreach ($parametros as $parametro)
                    <option value="{{ $parametro->parametro }}" {{ $parametro->parametro == $metodo->parametro ? 'selected' : '' }}>
                        {{ $parametro->parametro }}
                    </option>
                @endforeach
            </x-adminlte-select>

                  {{-- With prepend slot --}}
                <x-adminlte-input type="text" name="metodo" label="METODO" placeholder="Ingrese aqui el Metodo" label-class="text-lightblue" value="{{ $metodo->metodo }}">
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
                        <option value="{{ $unidad->unidad }}" {{ $unidad->unidad == $metodo->unidades ? 'selected' : '' }}>
                        {{ $unidad->unidad }}
                        </option>
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
