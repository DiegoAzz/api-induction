@extends('adminlte::page')

@section('title', 'Editar')

@section('content_header')
    <h1>GESTION SEDES</h1>
@stop

@section('content')
    <p>Actualizamos la informacion de las Sedes.</p>

    <div class="card">

        <div class="card-head">
            <a href="{{route('sede.index')}}" class="btn btn-primary float-right mt-2 mr-2">Ver Sedes</a>
        </div><br>


        <div class="card-body">
            <form action="{{route('sede.update',$sede)}}" method="post">
                @csrf
                @method('PUT')
                    {{-- With prepend slot --}}
                <x-adminlte-input type="text" name="nombre" label="SEDE" label-class="text-lightblue" value="{{ $sede->nombre }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-user text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                {{-- With prepend slot --}}
                <x-adminlte-input type="text" name="responsable" label="NOMBRES" label-class="text-lightblue" value="{{ $sede->responsable }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-user text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                {{-- With prepend slot, sm size, and label --}}
                <x-adminlte-textarea name="direccion" label="DIRECCION" rows=5 label-class="text-lightblue"
                igroup-size="sm" placeholder="Insertar Direccion..." >
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-dark">
                        <i class="fas fa-lg fa-file-alt text-lightblue"></i>
                    </div>
                </x-slot>
                {{ $sede->direccion }}
                </x-adminlte-textarea>
                    
                    {{-- With prepend slot --}}
                <x-adminlte-input type="text" name="telefono" label="TELEFONO" label-class="text-lightblue" value="{{ $sede->telefono }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-envelope text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                    {{-- With prepend slot --}}
                <x-adminlte-input type="text" name="email" label="EMAIL" label-class="text-lightblue" value="{{ $sede->email }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-phone text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                    {{-- With prepend slot --}}
                <x-adminlte-input type="text" name="cedula" label="CEDULA" label-class="text-lightblue" value="{{ $sede->cedula }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-phone text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                    {{-- With prepend slot --}}
                <x-adminlte-input type="text" name="cargo" label="CARGO" label-class="text-lightblue" value="{{ $sede->cargo }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-phone text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                    {{-- With prepend slot --}}
                <x-adminlte-input type="text" name="cliente_id" label="CLIENTE" label-class="text-lightblue" value="{{ $sede->cliente_id }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-phone text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>

            

                    {{-- With prepend slot, lg size, and label --}}
            {{--      <x-adminlte-select name="estado" label="ESTADO CIVIL" label-class="text-lightblue"
                igroup-size="lg" >
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-info">
                        <i class="fas fa-car-side"></i>
                    </div>
                </x-slot>
                <option value="{{ $cliente->estado }}">{{$cliente->estado}}</option>
                <option value="">Seleccione el estado civil</option>
                <option value="Casado">Casado</option>
                <option value="Soltero">Soltero</option>
                <option value="Union Libre">Union Libre</option>

                </x-adminlte-select>  --}}

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
