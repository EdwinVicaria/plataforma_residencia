@extends('dashboard')

@section('contenido')

<div class="text-center">
    <h1 class="font-black text-2xl">Usuario</h1>
    <p>Detelles del ususario {{$user->name}}</p>
</div>

<div class=" flex flex-col sm:justify-center items-center  bg-gray-100">
    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-3xl">
        @if(session('success'))
        <div role="success">
            {{session('success')}}
        </div>
        @endif

        <!-- class="w-full max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700" -->
        <div>
            <div class="flex justify-end px-4 pt-4">
                <button id="dropdownButton" data-dropdown-toggle="dropdown" class="inline-block text-gray-500 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5" type="button">
                    <span class="sr-only">Open dropdown</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path></svg>
                </button>
                <!-- Dropdown menu -->
                <div id="dropdown" class="hidden z-10 w-44 text-base list-none bg-white rounded divide-y divide-gray-100 shadow text-gray-700">
                    <ul class="py-1" aria-labelledby="dropdownButton">
                    <li>
                        <a href="{{ route('users.edit', $user->id) }}" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Editar usuario</a>
                    </li>
                    </ul>
                </div>
            </div>
            <div class="flex flex-col items-center pb-10">
                <img class="mb-3 w-24 h-24 rounded-full shadow-lg" src="/docs/images/people/profile-picture-3.jpg" alt="Bonnie image"/>
                <h5 class="mb-1 text-xl font-medium text-gray-900 ">{{$user->name}}</h5>
                @forelse($user->roles as $role)
                <span class="text-sm text-gray-700  ">Role: {{$role->name}}</span>
                @empty
                <span class="text-gray-700">Sin roles</span>
                @endforelse
                <span class="text-sm text-gray-500 ">Correo: {{$user->email}}</span>
                <span class="text-sm text-gray-500 ">Programa educativo: {{$user->programa->name}}</span>
                <div class="flex mt-4 space-x-3 md:mt-6">
                    <!-- <a href="{{url('proyectos.indexPropios')}}" class="inline-flex items-center py-2 px-4 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Proyectos</a> -->
                    <a href="{{ route('users.index') }}" class="inline-flex items-center py-2 px-4 text-sm font-medium text-center text-gray-900 bg-white rounded-lg border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-700">Regresar</a>
                </div>
            </div>
        </div>


        <!-- <a href="{{route('users.index')}}" class="p-2 bg-green-300">regresar</a> -->
    </div>
    
</div>

@endsection