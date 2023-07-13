@extends('dashboard')

@section('contenido')

<div>
    <form action="{{ route('permissions.store') }}" method="post">
    @csrf
    <label for="">Nombre del permiso</label>
    <input type="text" name="name" class="p-2 border border-black">

    <button class="p-2 bg-gray-500">Guardar</button>
    </form>
</div>

@endsection