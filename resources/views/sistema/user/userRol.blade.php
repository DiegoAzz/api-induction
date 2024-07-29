@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')
    <h1>USUARIOS Y ROLES</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            {{ $user->name}}
        </div>
        <div class="card-header">
            <h5>LISTA DE PERMISOS</h5>

                {!!  Form::model($user, ['route' => ['asignar.update', $user],'method'=>'put']) !!}
                @foreach ($roles as $role)
                    <div>
                        <label for="">
                            {!!  Form::checkbox('roles[]',$role->id,$user->hasAnyRole($role->id)?:false,['class'=>'mr-1']) !!}
                            {{ $role->name }}
                        </label>
                    </div>
                @endforeach
                {!!  Form::submit('Asignar Roles',['class'=>'btn btn-primary mt-3']) !!}
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
