@extends('dashboard')

@section('contenido')




<div class="overflow-x-auto relative shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 ">
        <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-white ">
         Titulo del proyecto: {{$proyectos->titulo}}
            <p class="mt-1 text-sm font-normal text-gray-500 ">Responsable del proyecto: {{$proyectos->users->name}}</p>
            <p class="mt-1 text-sm font-normal text-gray-500 ">Objetivo del proyecto: {{$proyectos->objetivo}}</p>
            <p class="mt-1 text-sm font-normal text-gray-500 ">Convocatoria a la que se inscribio el proyecto: {{$proyectos->convocatoria->titulo}}</p>
            <p class="mt-1 text-sm font-normal text-gray-500 ">Resumen de lo que se realizara en el proyecto: {{$proyectos->resumen}}</p>
            <p class="mt-1 text-sm font-normal text-gray-500 ">Colaborador en el proyecto: 
                @foreach($colaboradores as $colaborador)
                    {{$colaborador->users->name}}
                @endforeach
            </p>
        </caption>
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
            <tr>
                <th scope="col" class="py-3 px-6">
                    Fecha de inicio del proyecto
                </th>
                <th scope="col" class="py-3 px-6">
                    Fecha final del proyecto
                </th>
                <th scope="col" class="py-3 px-6">
                    No. de participantes
                </th>
                <th scope="col" class="py-3 px-6">
                    Lugar a realizar
                </th>
                <th scope="col" class="py-3 px-6">
                    Monto financiado
                </th>
                <th scope="col" class="py-3 px-6">
                    <span class="sr-only">Edit</span>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white">
                <td class="py-4 px-6">
                    {{$proyectos->fechainicio}}
                </td>
                <td class="py-4 px-6">
                    {{$proyectos->fechafinal}}
                </td>
                <td class="py-4 px-6">
                {{$proyectos->participantes}}
                </td>
                <td class="py-4 px-6">
                    {{$proyectos->lugar}}
                </td>
                <td class="py-4 px-6">
                    ${{$proyectos->costo}}
                </td>
            </tr>
        </tbody>
    </table>

</div>


@endsection