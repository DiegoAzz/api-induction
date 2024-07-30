@extends('adminlte::page')

@section('title', 'Editar')

@section('content_header')
    <h1>GESTION EMPLEADOS</h1>
@stop

@section('content')
    <p>Editar la informacion del Empleado.</p>

    <div class="card">

        <div class="card-head">
            <a href="{{route('empresa.index')}}" class="btn btn-primary float-right mt-2 mr-2">Ver Empleados</a>
        </div><br>

        <div class="card-body">
            <form action="{{route('empresa.update',$empleado)}}" method="post">
                @csrf
                @method('PUT')
                   {{-- With prepend slot --}}
                   <x-adminlte-input type="text" name="nombre" label="NOMBRES Y APELLIDOS" placeholder="Ingrese aqui Nombres y Apellidos" label-class="text-lightblue" value=" {{ $empleado->nombre }} ">
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
                <x-adminlte-input type="text" name="funciones" label="FUNCIONES" placeholder="Ingrese Funciones" label-class="text-lightblue" value="{{ $empleado->funciones }} ">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-user text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                    {{-- With prepend slot --}}
                <x-adminlte-input type="text" name="imagen" label="FOTO" placeholder="Su foto" label-class="text-lightblue" value="{{ $empleado->imagen }} ">
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
