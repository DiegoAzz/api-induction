@extends('adminlte::page')

@section('title', 'Cliente')

@section('content_header')
    <h1>ADMINISTRACION DE MUESTRAS</h1>
@stop

@section('content')
 
    @livewire('reg-muestras-livewire')

@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')

@stop
