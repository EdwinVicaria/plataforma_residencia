@extends('dashboard')

@section('contenido')

<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white bg-opacity-50 shadow-md overflow-hidden sm:rounded-3xl">
            
            <form method="POST" action="{{route('convocatorias.update', $convocatorias->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <!-- Name -->
                <div>
                    <label for="titulo" >Titulo</label>

                    <input id="titulo" class="block mt-1 w-full border border-black rounded-lg p-2" type="text" name="titulo" value="{{$convocatorias->titulo}}" required autofocus />
                </div>

                <div class="mt-5">
                    <label for="descripcionCorta" >Descripción corta para presentación</label>

                    <textarea name="descripcionCorta" id="descripcionCorta" cols="30" rows="10" class="block mt-1 w-full h-20 border border-black rounded-lg p-2">{{$convocatorias->descripcionCorta}}</textarea>
                </div>
                <div class="mt-5">
                    <label for="descripcionLarga" >Descripción larga para leer más</label>

                    <textarea name="descripcionLarga" id="descripcionLarga" cols="30" rows="10" class="block mt-1 w-full border border-black rounded-lg p-2">{{$convocatorias->descripcionLarga}}</textarea>
                </div>

                <div class="block mt-1 w-full rounded-lg mt-3 p-2">
                    <input type="file" accept="image/jpeg,image/png" name="imagen" id="imagen" value="{{$convocatorias->imagen}}">
                </div>
                

                <!-- <div >
                    <img src="" id="imagenSeleccionada" style="max-height: 300px;" alt="">
                </div>
                <div class="grid grid-cols-1 mt-5 mx-7">
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-loght font-semibold mb-1">Subir imagen</label>
                    <div class="flex items-center justify-center w-full">
                        <label class="flex flex-col border-4 border-dashed w-full h-32 hover:bg-gray-100 hover:border-purple-300 group">
                            <div class="flex flex-col items-center justify-center pt-7">
                                <svg xmlns="http://www.w3.org/2000/svg" height="48" width="48"><path d="M10 44q-2.5 0-4.25-1.75T4 38V10q0-2.5 1.75-4.25T10 4h28q2.5 0 4.25 1.75T44 10v28q0 2.5-1.75 4.25T38 44Zm0-3h28q1.3 0 2.15-.875Q41 39.25 41 38V10q0-1.3-.85-2.15Q39.3 7 38 7H10q-1.25 0-2.125.85T7 10v28q0 1.25.875 2.125T10 41Zm3.2-5.5 6.8-6.8 3.65 3.6L28 26.8l6.95 8.7Zm2.8-16q-1.45 0-2.475-1.025Q12.5 17.45 12.5 16q0-1.45 1.025-2.475Q14.55 12.5 16 12.5q1.45 0 2.475 1.025Q19.5 14.55 19.5 16q0 1.45-1.025 2.475Q17.45 19.5 16 19.5Z"/></svg>
                                <p class="text-xm text-gray-400 group-hover:text-purple-600 pt-1 tracking-wider">Seleccione la imagen</p>
                            </div>
                            
                        </label>
                    </div>
                </div> -->

                <div class="mt-5">
                    <label for="fechalimite" >Fecha limite para cierre de convocatoria</label>

                    <input type="datetime-local" name="fechalimite" id="fechalimite" class="block mt-1 w-full border border-black rounded-lg p-2" value="{{$convocatorias->fechalimite}}">
                </div>

                <!-- <div>
                    <label for="imagen">Subir imagen de representación</label>

                    <input type="file" name="imagen" id="imagen" class="block mt-1 w-full border border-black rounded-lg p-2">
                </div> -->
                

                
                <div align="center">
                    <button class="mt-3 p-2 border hover:bg-blue-900 rounded-lg"><a href="{{ route('convocatorias.index') }}">Cancelar</a></button>
                    <button class="mt-3 p-2 border hover:bg-blue-900 rounded-lg">
                        Guardar cambios
                    </button>
                </div>

                

            </form>
        </div>

    </div>

@endsection