@extends('dashboard')

@section('contenido')

<title>Convocatoria {{$convocatorias->id}}</title>
<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white bg-opacity-50 shadow-md overflow-hidden sm:rounded-3xl">
            <h1 class="text-3xl text-center font-black">{{$convocatorias->titulo}}</h1><br>

            <h1 class="text-xl font-black">Objetivo:</h1>
            <h2 class="text-xl text-justify p-2">{{$convocatorias->descripcionCorta}}</h2><br>

            <h1 class="text-xl font-black">Descripción:</h1>
            <h2 class="text-xl text-justify p-2">{{$convocatorias->descripcionLarga}}</h2><br>

            <h2 class="text-xl font-black">Fecha y hora de cierre de la convocatoria: </h2>
            <p class="">{{$convocatorias->fechalimite}}</p>

            <div class="flex mt-10 justify-center items-center">
                <a href="{{route('convocatorias.index')}}" class=" items-center py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg focus:ring-4 focus:outline-none focus:ring-blue-300">Regresar a las convocatorias</a>
            </div>

        </div>
</div>


@endsection