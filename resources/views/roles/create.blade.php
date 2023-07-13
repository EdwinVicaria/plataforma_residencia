@extends('dashboard')

@section('contenido')

<div>
    <form action="{{ route('roles.store') }}" method="post">
    @csrf
    <label for="">Nombre del rol</label>
    <input type="text" name="name" class="p-2 border border-black">

    <label for="">selecciona el tipo de permiso para el rol</label>
    <table class="table">
        <tbody>
            @foreach ($permissions as $id => $permission)
            <tr>
                <td>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" name="permissions[]"
                                value="{{ $id }}">
                            <span class="form-check-sign">
                                <span class="check"></span>
                            </span>
                        </label>
                    </div>
                </td>
                <td>
                    {{ $permission }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <button class="p-2 bg-gray-500">Guardar</button>
    </form>
</div>

@endsection