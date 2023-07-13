@extends('dashboard')

@section('contenido')


    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white bg-opacity-50 shadow-md overflow-hidden sm:rounded-3xl">
            
            <div class="bg-red-400 rounded-lg ">
                @if($errors->any())

                    @foreach($errors->all() as $error)
                    <p>{{$error}}</p>
                    @endforeach

                @endif
            </div>

            <form method="POST" action="{{route('proyectos.update',$proyectos->id)}}" enctype="multipart/form-data">
                @csrf
                
                @method('PUT')

                <!-- Name -->
                <div>
                    <label for="titulo" >Titulo</label>

                    <input id="titulo" class="block mt-1 w-full border border-black rounded-lg p-2" value="{{$proyectos->titulo}}" type="text" name="titulo" :value="old('titulo')" required autofocus />
                </div>

                <div class="sm:flex">
                    <div class="mt-5">
                        <label for="fechainicio" >Fecha de inicio</label>

                        <input type="datetime-local" name="fechainicio" id="fechainicio" value="{{$proyectos->fechainicio}}" class="block mt-1 w-44 border border-black rounded-lg p-2">
                    </div>

                    <div class="mt-5">
                        <label for="fechafinal" class="ml-10">Fecha final del proyecto</label>

                        <input type="datetime-local" name="fechafinal" id="fechafinal" value="{{$proyectos->fechafinal}}" class="block mt-1 w-44 ml-10 border border-black rounded-lg p-2">
                    </div>
                </div>

                <div>
                    <label for="objetivo" >Objetivo</label>

                    <textarea id="objetivo" class="block mt-1 w-full h-32 border border-black rounded-lg p-2" type="text" value="" name="objetivo"  required autofocus >{{$proyectos->objetivo}}</textarea>
                </div>

                <div>
                    <label for="resumen" >Resumen</label>

                    <textarea id="resumen" class="block mt-1 w-full h-32 border border-black rounded-lg p-2" type="text" value="" name="resumen" required autofocus >{{$proyectos->resumen}}</textarea>
                </div>
                
                <div>
                    <label for="participantes" >Número de participantes</label>

                    <input id="participantes" class="block mt-1 w-full border border-black rounded-lg p-2" type="text" value="{{$proyectos->participantes}}" name="participantes" :value="old('participantes')" required autofocus />
                </div>

                <div class="mt-5">
                    <label for="lugar" >Lugar donde se realizara el proyecto</label>

                    <input name="lugar" type="text" id="lugar" cols="30" rows="10" value="{{$proyectos->lugar}}" class="block mt-1 w-full border border-black rounded-lg p-2">
                </div>
                <div class="mt-5">
                    <label for="costo" >Costo de financiamiento</label>

                    <input name="costo" type="text" id="costo" value="{{$proyectos->costo}}" cols="30" rows="10" class="block mt-1 w-full border border-black rounded-lg p-2">
                </div>


                <div class="mt-5">

                    <label for="">Selecciona los colaboradores del proyecto</label>
                    <button id="dropdownSearchButton" data-dropdown-toggle="dropdownSearch" class="inline-flex items-center py-2 px-4 text-sm font-medium text-center text-white bg-yellow-600 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 " type="button">Colaboradores<svg class="ml-2 w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>

                    <div id="dropdownSearch" class="hidden z-10 w-60 bg-white rounded shadow dark:bg-gray-700">
                        <ul class="overflow-y-auto px-3 pb-3 h-48 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownSearchButton">
                            <li>
                                @foreach($users as  $user)
                                <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <label>
                                        <input id="" name="colaboradors[]" 
                                        type="checkbox" value="{{$user->id}}" 
                                        class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        {{$user->name}}
                                    </label>
                                </div>
                                @endforeach
                            </li>
                        </ul>
                    </div>
                    
                </div>

                <input type="hidden" name="status" value="{{$proyectos->status}}">
                <input type="hidden" name="idConv" value="{{$proyectos->convocatoria_id}}">

                
                <div align="center">
                    <button class="mt-3 p-2 border hover:bg-blue-900 rounded-lg"><a href="{{ route('proyectos.index') }}">Cancelar</a></button>
                    <button class="mt-3 p-2 border hover:bg-blue-900 rounded-lg">
                        Crear convocatoria
                    </button>
                </div>

                

            </form>
        </div>

    </div>

@endsection