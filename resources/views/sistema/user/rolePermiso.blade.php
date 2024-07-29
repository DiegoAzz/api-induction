@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')
    <h1>ROLES Y PERMISOS</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            {{ $role->name}}
        </div>
        <div class="card-header">
            <h5>LISTA DE PERMISOS</h5>

                {!!  Form::model($role, ['route' => ['roles.update', $role],'method'=>'put']) !!}
                @foreach ($permisos as $permiso)
                    <div>
                        <label for="">
                            {!!  Form::checkbox('permisos[]',$permiso->id,$role->hasPermissionTo($permiso->id)?:false,['class'=>'mr-1']) !!}
                            {{ $permiso->name }}
                        </label>
                    </div>
                @endforeach
                {!!  Form::submit('Asignar Permisos',['class'=>'btn btn-primary mt-3']) !!}
                {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
