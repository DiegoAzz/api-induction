@extends('adminlte::page')

@section('title', 'Editar')

@section('content_header')
    <h1>GESTION EMPLEADOS</h1>
@stop

@section('content')
    <p>Editar la información del Empleado.</p>

    <div class="card">
        <div class="card-head">
            <a href="{{ route('empresa.index') }}" class="btn btn-primary float-right mt-2 mr-2">Ver Empleados</a>
        </div><br>

        <div class="card-body">
            <form action="{{ route('empresa.update', $empleado) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Nombre --}}
                <x-adminlte-input type="text" name="nombre" label="NOMBRES Y APELLIDOS" placeholder="Ingrese aquí Nombres y Apellidos" label-class="text-lightblue" value="{{ $empleado->nombre }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-user text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>

                {{-- Cargo --}}
                <x-adminlte-select name="cargo" label="CARGO" label-class="text-lightblue" igroup-size="lg">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-gradient-info">
                            <i class="fas fa-car-side"></i>
                        </div>
                    </x-slot>
                    <option value="">Seleccionar Cargo</option>
                    @foreach([
                        'Auxiliar de Limpieza',
                        'Auxiliar Administrativo',
                        'Analista',
                        'Contador',
                        'Desarrollador',
                        'Gerente',
                        'Jefe Desarrollo',
                        'Jefe Recursos Humanos',
                        'Soporte'
                    ] as $cargo)
                        <option value="{{ $cargo }}" @if($empleado->cargo == $cargo) selected @endif>{{ $cargo }}</option>
                    @endforeach
                </x-adminlte-select>

                {{-- Funciones --}}
                <x-adminlte-input type="text" name="funciones" label="FUNCIONES" placeholder="Ingrese Funciones" label-class="text-lightblue" value="{{ $empleado->funciones }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-user-cog text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>

                {{-- Imagen actual (opcional) --}}
                @if($empleado->imagen)
                <div class="mb-2">
                <label class="text-lightblue">Imagen actual:</label><br>
                <img src="{{ asset('storage/' . ltrim($empleado->imagen, '/')) }}"
                alt="Foto del empleado"
                width="120"
                height="120"
                style="object-fit: cover; border-radius: 10px;">
                </div>
                @endif


                {{-- Nueva imagen --}}
                <x-adminlte-input type="file" name="imagen" label="Cambiar Foto" label-class="text-lightblue" >
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-image text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>

                <x-adminlte-button type="submit" label="Guardar" theme="primary" icon="fas fa-save" />
            </form>
        </div>
    </div>
@stop

@section('css')
    {{-- Extra CSS si lo necesitas --}}
@stop

@section('js')
    <script>
        @if (session("message"))
            $(document).ready(function(){
                let mensaje = "{{ session('message') }}"
                Swal.fire({
                    title: 'Resultado',
                    text: mensaje,
                    icon: 'success'
                });
            });
        @endif
    </script>
@stop
