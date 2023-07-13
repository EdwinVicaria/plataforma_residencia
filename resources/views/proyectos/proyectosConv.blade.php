@extends('dashboard')

@section('contenido')
<div class="overflow-x-auto relative shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500">
        <thead class="text-xs text-white uppercase bg-gray-500 w-full ">
            <tr>
                <th scope="col" class="py-3 px-6">
                    Titulo
                </th>
                <th scope="col" class="py-3 px-6">
                    Fecha de inicio
                </th>
                <th scope="col" class="py-3 px-6">
                    Fecha final
                </th>
                <th scope="col" class="py-3 px-6">
                    Responsable del proyecto
                </th>
                <th scope="col" class="py-3 px-6">
                    Convocatoria
                </th>
                <th scope="col" class="py-3 px-6">
                    Estatus
                </th>
            </tr>
        </thead>
        <tbody>
        @forelse($proyectos as $proyecto)
            <tr class="bg-white border-b hover:bg-gray-50 ">
                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                    {{$proyecto->titulo}}
                </th>
                <td class="py-4 px-6">
                    {{$proyecto->fechainicio}}
                </td>
                <td class="py-4 px-6">
                    {{$proyecto->fechafinal}}
                </td>
                <td class="py-4 px-6">
                    {{$proyecto->users->name}}
                </td>
                <td class="py-4 px-6">
                    {{$proyecto->convocatoria->titulo}}
                </td>
                <td class="py-4 px-6">
                    {{$proyecto->status}}
                </td>
                <td class="py-4 px-6 text-right flex">
                @if (Route::has('login'))
                    @auth
                    @if(Auth()->user()-> id == $proyecto->user_id)
                    <a href="{{ route('proyectos.show', $proyecto->id) }}" class="ml-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-blue-600">
                            <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                            <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" clip-rule="evenodd" />
                        </svg>
                    </a>
                   
                    <a href="{{ route('proyectos.edit', $proyecto->id) }}" class="ml-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-green-600">
                            <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
                            <path d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
                        </svg>

                    </a>
                        
                        
                    <form action="{{ route('proyectos.destroy', $proyecto->id) }}" method="post"
                        style="display: inline-block;" onsubmit="return confirm('Seguro?')">
                            
                        @csrf
                        @method('DELETE')
                        <button class="ml-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-red-600">
                                <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z" clip-rule="evenodd" />
                            </svg>
                        </button>
    
                    </form>
                    @endif
                    @endauth
                @endif
                </td>
                @empty
                <td class="p-4">No hay proyectos registrados</td>
            </tr>
            
        @endforelse
        </tbody>
    </table>
</div>


@endsection