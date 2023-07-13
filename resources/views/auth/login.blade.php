<x-guest-layout>
<script src="https://cdn.tailwindcss.com"></script>
<body class="bg-white">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 ">

        <div>
            <img class="relative h-32 w-32" src="img/logoITSMOTUL.png" alt="Logo tecnologico">
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-slate-50 shadow-md overflow-hidden sm:rounded-lg">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="font-sans ">
                    <label class="block mb-2 text-base font-medium text-gray-800 " for="email" :value="__('Email')">Correo Institucional</label>
                    <input id="email" class="block mt-1 w-full rounded-md py-3 border-2 border-indigo-900 shadow-xl " type="email" name="email" :value="old('email')" required autofocus /></input>
                </div>

                <!-- Password -->
                <div class="mt-7 font-sans">
                    <label class="block mb-2 text-base font-medium text-gray-900 " for="password" :value="__('Password')" >Contraseña</label>

                    <input id="password" class="block mt-1 w-full  rounded-md py-3 border-2 border-[#1B396A] shadow-xl"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password" />
                    </input>
                </div>

                <div class="mt-7 flex">
                    <label for="remember_me" class="inline-flex items-center w-full cursor-pointer">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-[#1B396A] shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                                    <span class="ml-2 text-sm text-gray-600">
                                        Recuerdame
                                    </span>
                    </label>

                    <div class="w-full text-right">
                        @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                            ¿Olvidó su contraseña?
                        </a>
                        @endif
                    </div>
                </div>
                            
                <div align="center" class="mt-5 ">
                    <!--<button class="p-2 border border-2 bg-gray-700 text-white"><a href="{{url('/')}}">Cancelar</a></button>-->
                    <button class="mt-3 p-2 border bg-red-600 rounded-lg text-white font-medium w-32"><a href="{{ url('/') }}">Cancelar</a></button>
                    <button class="p-2 border border-2 bg-[#1B396A] text-white rounded-lg w-32">Iniciar</button>
                </div>

                <div class="mt-7">
                    <div class="flex justify-center items-center">
                        <label class="mr-2 text-gray-600 ">¿No tienes una cuenta?</label>
                        @if (Route::has('register'))
                        <a href="{{ route('register') }}" class=" text-blue-500 transition duration-500 ease-in-out  transform hover:-translate-x hover:scale-105">
                            Registrate
                        </a>
                        @endif
                    </div>
                </div>
            
            </form>
        </div>
    </div>
 

    
</body>
</x-guest-layout>
