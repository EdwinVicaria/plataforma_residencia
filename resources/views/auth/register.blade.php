<x-guest-layout>
<script src="https://cdn.tailwindcss.com"></script>
<style>
    .fondo {
        background-image: url(https://lh3.googleusercontent.com/p/AF1QipPosl7JVKPSaXWLLB7NZrgS6qnBUk-KyF077Gma=w600-k);
        background-size: 25rem;
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
        backdrop-filter: blur(16px);
    }
</style>
<body class="">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-white">
        <div>
            <img class="w-32" src="img/logoITSMOTUL.png" alt="Logo tecmotul rojo">
        </div>
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-slate-50 shadow-md overflow-hidden sm:rounded-3xl">
            
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div>
                    <label for="name" :value="__('Name')" >Nombre completo</label>

                    <input id="name" class="block mt-1 w-full rounded-md py-3 border-2 border-indigo-900 shadow-xl" type="text" name="name" :value="old('name')" required autofocus />
                </div>

                <div class="mt-4">

                    <label for="programa_id" >Programa educativo</label>
                    <select name="programa_id" id="programa_id" class="block mt-1 w-full rounded-md py-3 border-2 border-indigo-900 shadow-xl">
                        <option disabled selected>Selecciona tu programa educativo</option>
                        @foreach($programas as $id =>$programa)
                        <option class="text-black" value="{{$programa->id}}">{{$programa->name}}</option>
                        @endforeach
                    </select>
                
                </div>


                <!-- Email Address -->
                <div class="mt-4">
                    <label for="email" :value="__('Email')" >Correo institucional</label>

                    <input id="email" class="block mt-1 w-full rounded-md py-3 border-2 border-indigo-900 shadow-xl" type="email" name="email" :value="old('email')" required />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <label for="password" :value="__('Password')" >Contraseña</label>

                    <input id="password" class="block mt-1 w-full rounded-md py-3 border-2 border-indigo-900 shadow-xl"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <label for="password_confirmation" :value="__('Confirm Password')" >Confirmar contraseña</label>
                    <input id="password_confirmation" class="block mt-1 w-full rounded-md py-3 border-2 border-indigo-900 shadow-xl"  
                                    type="password"
                                    name="password_confirmation" required />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('Ya estas registrado?') }}
                    </a>

                </div>
                <div align="center">
                    <button class="mt-3 p-2 border text-white font-medium bg-red-600 rounded-lg w-32"><a href="{{ url('/') }}">Cancelar</a></button>
                    <button class="p-2 border border-2 bg-[#1B396A] text-white rounded-lg w-32">
                        Iniciar sesión
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</x-guest-layout>
