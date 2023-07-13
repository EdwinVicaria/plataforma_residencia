@extends('dashboard')

@section('contenido')

<div>
    <h1>Vista detallada del permiso {{ $permission->name }}</h1>


    <p>
    {{ $permission->name }}    
    {{ $permission->guard_name }} <br>
    {{ $permission->created_at }}</p>
</div>

@endsection