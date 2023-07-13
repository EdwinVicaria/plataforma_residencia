@extends('dashboard')

@section('contenido')

<div>
    <form action="{{ route('permissions.update', $permission->id) }}" method="post">
    @csrf
    qmethod('PUT')
    <label for="">Nombre del permiso</label>
    <input type="text" name="name" value="{{ old('name', $permission->name) }}" class="p-2 border border-black">

    <button type="submit" class="p-2 bg-gray-500">Actualizar</button>
    </form>
</div>

@endsection