@extends('dashboard')

@section('contenido')

<div>
    <h1>Vista detallada del permiso {{ $role->name }}</h1>


    <p>
    {{ $role->name }}    
    {{ $role->guard_name }} <br>
    {{ $role->created_at }}</p>


    <div>
        @forelse($role->permissions as $permission)
        <span class="">{{ $permission->name }}</span>
        @empty
        <span class="">No permissions</span>
        @endforelse
    </div>
</div>

@endsection