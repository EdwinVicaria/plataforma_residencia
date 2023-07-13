@extends('dashboard')

@section('contenido')

<div class=" flex flex-col sm:justify-center items-center  bg-gray-100">
    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-3xl">
        <form action="{{ route('users.store') }}" method="post">
            @csrf

            {{-- @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif --}}
            
            <!-- NOMBRE -->

            <label class="block mb-2 text-sm font-medium text-gray-900">Nombre del usuario (15 caracteres maximos)</label>
            <div class="relative">
                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-gray-500 dark:text-gray-400">
                        <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z" clip-rule="evenodd" />
                    </svg>

                   <!-- <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg>-->
                </div> 
                <input type="text"name="name"  placeholder="Ingrese su nombre"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  ">
            </div>
            @if ($errors->has('name'))
                <span class="text-red-500" for="input-password">{{ $errors->first('name') }}</span>
            @endif

            <!-- /NOMBRE -->


            <!-- CORREO -->

            <label class="block mb-2 text-sm font-medium text-gray-900">Correo electronico</label>
            <div class="relative">
                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                    <!-- <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg> -->
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-gray-500 dark:text-gray-400">
                        <path fill-rule="evenodd" d="M17.834 6.166a8.25 8.25 0 100 11.668.75.75 0 011.06 1.06c-3.807 3.808-9.98 3.808-13.788 0-3.808-3.807-3.808-9.98 0-13.788 3.807-3.808 9.98-3.808 13.788 0A9.722 9.722 0 0121.75 12c0 .975-.296 1.887-.809 2.571-.514.685-1.28 1.179-2.191 1.179-.904 0-1.666-.487-2.18-1.164a5.25 5.25 0 11-.82-6.26V8.25a.75.75 0 011.5 0V12c0 .682.208 1.27.509 1.671.3.401.659.579.991.579.332 0 .69-.178.991-.579.3-.4.509-.99.509-1.671a8.222 8.222 0 00-2.416-5.834zM15.75 12a3.75 3.75 0 10-7.5 0 3.75 3.75 0 007.5 0z" clip-rule="evenodd" />
                    </svg>

                </div>
                <input type="text" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  " value="{{ old('email') }}" placeholder="name@ejemplo.com">
            </div>
            @if ($errors->has('email'))
                <span class="error text-danger" for="input-password">{{ $errors->first('email') }}</span>
            @endif

            <!-- /CORREO -->
            

            <!-- CONTRASEÑA -->

            <label class="block mb-2 text-sm font-medium text-gray-900">Contraseña</label>
            <div class="relative">
                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                    <!-- <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg> -->
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-gray-500 dark:text-gray-400">
                        <path d="M18 1.5c2.9 0 5.25 2.35 5.25 5.25v3.75a.75.75 0 01-1.5 0V6.75a3.75 3.75 0 10-7.5 0v3a3 3 0 013 3v6.75a3 3 0 01-3 3H3.75a3 3 0 01-3-3v-6.75a3 3 0 013-3h9v-3c0-2.9 2.35-5.25 5.25-5.25z" />
                    </svg>
                </div>
                <input type="text" name="password" placeholder="Ingrese su nombre" value="{{ old('password') }}"class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5" >
            </div>
            @if ($errors->has('password'))
                <span class="error text-danger" for="input-password">{{ $errors->first('password') }}</span>
            @endif

            <!-- /CONTRASEÑA -->


            <!-- PROGRAMA EDUCATIVO -->
            <label for="default" class="block mb-2 text-sm font-medium text-gray-900 ">Selecciona su programa educativo</label>
            <select name="programa_id" id="programa_id" class="bg-gray-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <option disabled selected class="text-gray-400">Selecciona su programa educativo</option>
                @foreach($programas as $programa)
                <option value="{{$programa->id}}">{{$programa->name}}</option>
                @endforeach
            </select>

            <!-- /PROGRAMA EDUCATIVO -->


            <!-- ROLES -->

            <label for="default" class="block mb-2 text-sm font-medium text-gray-900 ">Selecciona su rol del usuario</label>
            <label for="">selecciona el rol para el usuario</label>
            <table>
                <tbody>
                    @foreach($roles as $id => $role)
                    <tr>
                        <td>
                            <div>
                                <label for="">
                                    <input type="checkbox" name="roles[]" value="{{$id}}">
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                        </td>
                        <td>
                            {{$role}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- /ROLES -->

            <div align="center">
                <a href="{{route('users.index')}}" class="bg-red-400 hover:bg-red-600 p-2 rounded-lg text-white">Cancelar</a>
                <button type="submit" class="p-2 bg-yellow-600 hover:bg-yellow-700 ml-4 rounded-lg text-white">Guardar</button>
            </div>

        </form>
    </div>
</div>


@endsection