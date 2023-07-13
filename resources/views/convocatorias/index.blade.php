@extends('dashboard')

@section('contenido')
<!-- boton crear convocatoria para el super admin -->
@if(@Auth::user()->hasRole('spadmin'))
    @section('btn-crear-convocatoria')
    <div class="p-1 rounded-lg bg-yellow-600 hover:bg-yellow-700">
        <a href="{{ route('convocatorias.create') }}" class=" flex text-white ">Añadir convocatoria
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class=" w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
            </svg>
        </a>
    </div>
    @endsection
@endif
<!-- /boton crear convocatoria para el super admin -->

<!-- boton crear convocatoria para el admin -->
@if(@Auth::user()->hasRole('admin'))
    @section('btn-crear-convocatoria')
    <div class="p-1 rounded-lg bg-yellow-600 hover:bg-yellow-700">
        <a href="{{ route('convocatorias.create') }}" class=" flex text-white ">Añadir convocatoria
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class=" w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
            </svg>
        </a>
    </div>
    @endsection
@endif
<!-- /boton crear convocatoria para el admin -->


@if(@Auth::user()->hasRole('spadmin'))
    <div class="container px-4 md:px-0 max-w-6xl mx-auto">
            @if (session('mensaje'))
            <div class="text-center">
                <p class="font text-4xl text-white">{{session('mensaje')}}</p> 
            </div>
            @endif
			<div class="mx-0 sm:mx-6">
				
				<!--Posts Container-->
				<div class="flex flex-wrap justify-between pt-12 -mx-6">
                @forelse($convocatorias as $convocatoria) 
                    <div class="w-full md:w-1/2 p-6 flex flex-col flex-grow flex-shrink">
						<div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow-lg ">
                        
                            <div class="flex justify-end px-4 pt-4 absolute">
                                <button id="dropdownButton" data-dropdown-toggle="dropdown" class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5" type="button">
                                    <span class="sr-only">Open dropdown</span>
                                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path></svg>
                                </button>
                                <!-- Dropdown menu -->
                                <div id="dropdown" class="z-10 hidden text-base list-none bg-white divide-y divide-gray-100 rounded shadow w-44 dark:bg-gray-700">
                                    <ul class="py-1" aria-labelledby="dropdownButton">
                                     
                                            <li>
                                            <a href="{{route('convocatorias.edit',$convocatoria->id)}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                                        Editar
                                            </a>
                                            </li>
                                            <li>
                                            <form id="form-eliminar" action="{{ route('convocatorias.destroy', $convocatoria->id) }}" 
                                            onsubmit="return confirm('Seguro quieres eliminar este proyecto?, no se podra recuperar')" 
                                            method="post"
                                                style="display: inline-block;">
                                                    
                                                @csrf
                                                @method('DELETE')
                                                <button  class="w-full text-left block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                                    Eliminar
                                                </button>
                            
                                            </form> 
                                            </li>
                                            
                                    </ul>
                                </div>
                            </div>
                        
							<text href="#" class="flex flex-wrap no-underline hover:no-underline">
                                <img src="img/{{$convocatoria->imagen}}" alt="imagen para convocatoria {{$convocatoria->titulo}}" class="w-full h-72 rounded-t pb-6">                                

								<p class="w-full text-gray-600 text-xs md:text-sm px-6">Convocatoria</p>

								<div class="w-full font-bold text-xl text-gray-900 px-6">{{$convocatoria->titulo}}</div>

								<p class="text-gray-800 font-serif text-base px-6 mb-5">

                                {{$convocatoria->descripcionCorta}} 
								</p><br>
                                
							</text>
                            
                            <p class="text-gray-800 font-serif text-base px-6 mb-5">Fecha de cierre de convocatoria: <br>
                                {{$convocatoria->fechalimite}}
                                </p>
						</div>
						<div class="flex-none mt-auto bg-white rounded-b rounded-t-none overflow-hidden shadow-lg p-6">
							<div class="flex items-center justify-between">
                                
                                <a href="{{route('convocatorias.show', $convocatoria->id)}}"class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-yellow-600 rounded-lg hover:bg-yellow-700 focus:ring-4 focus:outline-none focus:ring-yellow-300">
                                        Leer más
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-white ml-1">
                                            <path d="M11.25 4.533A9.707 9.707 0 006 3a9.735 9.735 0 00-3.25.555.75.75 0 00-.5.707v14.25a.75.75 0 001 .707A8.237 8.237 0 016 18.75c1.995 0 3.823.707 5.25 1.886V4.533zM12.75 20.636A8.214 8.214 0 0118 18.75c.966 0 1.89.166 2.75.47a.75.75 0 001-.708V4.262a.75.75 0 00-.5-.707A9.735 9.735 0 0018 3a9.707 9.707 0 00-5.25 1.533v16.103z" />
                                        </svg>
                                </a>
                                <a href="{{route('proyectos.create2',$convocatoria->id)}}" id="boton" class="ml-2 inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-yellow-600 rounded-lg hover:bg-yellow-700 focus:ring-4 focus:outline-none focus:ring-yellow-300">
                                            Incribirse
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-white ml-1">
                                                <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
                                                <path d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
                                            </svg>
        
                                </a>

                                <a href="{{route('proyectosConv', $convocatoria->id)}}" class="p-2 bg-yellow-600 rounded-md text-white font-medium flex hover:bg-yellow-700">Ver proyectos

                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-white ml-1">
                                        <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                        <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" clip-rule="evenodd" />
                                    </svg>

                                </a>
                                
							</div>
                            

						</div>

                        
                        
					</div>
                    @empty

                    <h1 class="text-2xl font-black">No hay convocatorias registradas</h1>
					
                @endforelse
				</div>
				<!--/ Post Content-->
						
			</div>
			
			
		</div>



@endif


@if(@Auth::user()->hasRole('admin'))
    <div class="container px-4 md:px-0 max-w-6xl mx-auto">
            @if (session('mensaje'))
            <div class="text-center">
                <p class="font text-4xl text-white">{{session('mensaje')}}</p> 
            </div>
            @endif
			<div class="mx-0 sm:mx-6">
				
				<!--Posts Container-->
				<div class="flex flex-wrap justify-between pt-12 -mx-6">
                @forelse($convocatorias as $convocatoria) 
                    <div class="w-full md:w-1/2 p-6 flex flex-col flex-grow flex-shrink">
						<div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow-lg ">
                        @if (Route::has('login'))
                            @auth
                            @if(Auth()->user()-> id == $convocatoria->user_id)
                            <div class="flex justify-end px-4 pt-4 absolute">
                                <button id="dropdownButton" data-dropdown-toggle="dropdown" class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5" type="button">
                                    <span class="sr-only">Open dropdown</span>
                                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path></svg>
                                </button>
                                <!-- Dropdown menu -->
                                <div id="dropdown" class="z-10 hidden text-base list-none bg-white divide-y divide-gray-100 rounded shadow w-44 dark:bg-gray-700">
                                    <ul class="py-1" aria-labelledby="dropdownButton">
                                     
                                            <li>
                                            <a href="{{route('convocatorias.edit',$convocatoria->id)}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                                        Editar
                                            </a>
                                            </li>
                                            <li>
                                            <form id="form-eliminar" action="{{ route('convocatorias.destroy', $convocatoria->id) }}" onsubmit="return confirm('Seguro quieres eliminar este proyecto?, no se podra recuperar')" method="post"
                                                style="display: inline-block;">
                                                    
                                                @csrf
                                                @method('DELETE')
                                                <button  class="w-full text-left block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                                    Eliminar
                                                </button>
                            
                                            </form> 
                                            </li>
                                            
                                    </ul>
                                </div>
                            </div>
                            @endif
                                @else
                                @endauth
                        @endif
                        
							<text href="#" class="flex flex-wrap no-underline hover:no-underline">
                                <img src="img/{{$convocatoria->imagen}}" alt="imagen para convocatoria {{$convocatoria->titulo}}" class="w-full h-72 rounded-t pb-6">                                

								<p class="w-full text-gray-600 text-xs md:text-sm px-6">Convocatoria</p>

								<div class="w-full font-bold text-xl text-gray-900 px-6">{{$convocatoria->titulo}}</div>

								<p class="text-gray-800 font-serif text-base px-6 mb-5">

                                {{$convocatoria->descripcionCorta}} 
								</p><br>
                                
							</text>
                            
                            <p class="text-gray-800 font-serif text-base px-6 mb-5">Fecha de cierre de convocatoria: <br>
                                {{$convocatoria->fechalimite}}
                                </p>
						</div>
						<div class="flex-none mt-auto bg-white rounded-b rounded-t-none overflow-hidden shadow-lg p-6">
							<div class="flex items-center justify-between">
                                
                                <a href="{{route('convocatorias.show', $convocatoria->id)}}"class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-yellow-600 rounded-lg hover:bg-yellow-700 focus:ring-4 focus:outline-none focus:ring-yellow-300">
                                        Leer más
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-white ml-1">
                                            <path d="M11.25 4.533A9.707 9.707 0 006 3a9.735 9.735 0 00-3.25.555.75.75 0 00-.5.707v14.25a.75.75 0 001 .707A8.237 8.237 0 016 18.75c1.995 0 3.823.707 5.25 1.886V4.533zM12.75 20.636A8.214 8.214 0 0118 18.75c.966 0 1.89.166 2.75.47a.75.75 0 001-.708V4.262a.75.75 0 00-.5-.707A9.735 9.735 0 0018 3a9.707 9.707 0 00-5.25 1.533v16.103z" />
                                        </svg>
                                </a>
                                <a href="{{route('proyectos.create2',$convocatoria->id)}}" id="boton" class="ml-2 inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-yellow-600 rounded-lg hover:bg-yellow-700 focus:ring-4 focus:outline-none focus:ring-yellow-300">
                                            Incribirse
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-white ml-1">
                                                <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
                                                <path d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
                                            </svg>
        
                                </a>

                                <a href="{{route('proyectosConv', $convocatoria->id)}}" class="p-2 bg-yellow-600 rounded-md text-white font-medium flex hover:bg-yellow-700">Ver proyectos

                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-white ml-1">
                                        <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                        <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" clip-rule="evenodd" />
                                    </svg>

                                </a>
                                
							</div>
                            

						</div>

                        
                        
					</div>
                    @empty

                    <h1 class="text-2xl font-black">No hay convocatorias registradas</h1>
					
                @endforelse
				</div>
				<!--/ Post Content-->
						
			</div>
			
			
		</div>


@endif


@if(@Auth::user()->hasRole('usuario'))
    <div class="container px-4 md:px-0 max-w-6xl mx-auto">
            @if (session('mensaje'))
            <div class="text-center">
                <p class="font text-4xl text-white">{{session('mensaje')}}</p> 
            </div>
            @endif
			<div class="mx-0 sm:mx-6">
				
				<!--Posts Container-->
				<div class="flex flex-wrap justify-between pt-12 -mx-6">
                @forelse($convocatorias as $convocatoria) 
                    <div class="w-full md:w-1/2 p-6 flex flex-col flex-grow flex-shrink">
						<div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow-lg ">
                        @if (Route::has('login'))
                            @auth
                            @if(Auth()->user()-> id == $convocatoria->user_id)
                            <div class="flex justify-end px-4 pt-4 absolute">
                                <button id="dropdownButton" data-dropdown-toggle="dropdown" class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5" type="button">
                                    <span class="sr-only">Open dropdown</span>
                                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path></svg>
                                </button>
                                <!-- Dropdown menu -->
                                <div id="dropdown" class="z-10 hidden text-base list-none bg-white divide-y divide-gray-100 rounded shadow w-44 dark:bg-gray-700">
                                    <ul class="py-1" aria-labelledby="dropdownButton">
                                     
                                            <li>
                                            <a href="{{route('convocatorias.edit',$convocatoria->id)}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                                        Editar
                                            </a>
                                            </li>
                                            <li>
                                            <form action="{{route('convocatorias.destroy',$convocatoria->id)}}" onsubmit="return confirm('Seguro quieres eliminar esta convocatoria?')" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                
                                                    <button type="submit" class="w-full text-left block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                                    Eliminar
                                                    </button>
                                            </form>
                                            </li>
                                            
                                    </ul>
                                </div>
                            </div>
                            @endif
                                @else
                                @endauth
                        @endif
                        
							<text href="#" class="flex flex-wrap no-underline hover:no-underline">
                                <img src="img/{{$convocatoria->imagen}}" alt="imagen para convocatoria {{$convocatoria->titulo}}" class="w-full h-72 rounded-t pb-6">                                

								<p class="w-full text-gray-600 text-xs md:text-sm px-6">Convocatoria</p>

								<div class="w-full font-bold text-xl text-gray-900 px-6">{{$convocatoria->titulo}}</div>

								<p class="text-gray-800 font-serif text-base px-6 mb-5">

                                {{$convocatoria->descripcionCorta}} 
								</p><br>
                                
							</text>
                            
                            <p class="text-gray-800 font-serif text-base px-6 mb-5">Fecha de cierre de convocatoria: <br>
                                {{$convocatoria->fechalimite}}
                                </p>
						</div>
						<div class="flex-none mt-auto bg-white rounded-b rounded-t-none overflow-hidden shadow-lg p-6">
							<div class="flex mt-10 justify-center items-center">
                                
                                <a href="{{route('convocatorias.show', $convocatoria->id)}}"class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-yellow-600 rounded-lg hover:bg-yellow-700 focus:ring-4 focus:outline-none focus:ring-yellow-300">
                                        Leer más
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-white ml-1">
                                            <path d="M11.25 4.533A9.707 9.707 0 006 3a9.735 9.735 0 00-3.25.555.75.75 0 00-.5.707v14.25a.75.75 0 001 .707A8.237 8.237 0 016 18.75c1.995 0 3.823.707 5.25 1.886V4.533zM12.75 20.636A8.214 8.214 0 0118 18.75c.966 0 1.89.166 2.75.47a.75.75 0 001-.708V4.262a.75.75 0 00-.5-.707A9.735 9.735 0 0018 3a9.707 9.707 0 00-5.25 1.533v16.103z" />
                                        </svg>
                                </a>
                                <a href="{{route('proyectos.create2',$convocatoria->id)}}" id="boton" class="ml-2 inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-yellow-600 rounded-lg hover:bg-yellow-700 focus:ring-4 focus:outline-none focus:ring-yellow-300">
                                            Incribirse
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-white ml-1">
                                                <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
                                                <path d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
                                            </svg>
        
                                </a>

                                <a href="{{route('proyectosConv', $convocatoria->id)}}" class="p-2 bg-yellow-600 rounded-md text-white font-medium flex hover:bg-yellow-700">Proyectos

                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-white ml-1">
                                        <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                        <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" clip-rule="evenodd" />
                                    </svg>

                                </a>
                                
							</div>
                            

						</div>

                        
                        
					</div>
                    @empty

                    <h1 class="text-2xl font-black">No hay convocatorias registradas</h1>
					
                @endforelse
				</div>
				<!--/ Post Content-->
						
			</div>
			
			
		</div>
@endif


@endsection