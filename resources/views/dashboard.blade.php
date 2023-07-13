<x-app-layout>
    
<body class="bg-gray-100 font-sans leading-normal tracking-normal">



    <!-- BARRA DE NAVEGACION DEL SUPERADMIN -->

    @if(@Auth::user()->hasRole('spadmin'))

    <nav id="header" class="bg-white fixed w-full z-10 top-0 shadow">


        <div class="w-full container mx-auto flex flex-wrap items-center mt-0 pt-3 pb-3 md:pb-0">

            <div class="w-1/2 pl-2 md:pl-0">
                <a class="text-gray-900 text-base xl:text-xl no-underline text-yellow-600 hover:no-underline font-bold" href="#">
                    <i class="fas fa-sun text-yellow-600 pr-3"></i> Plataforma para el control de proyectos
                </a>
            </div>
            <div class="w-1/2 pr-0">
                <div class="flex relative inline-block float-right">
                    @if (Route::has('login'))
                    <div class="relative text-sm">
                        <button id="userButton" class="flex items-center focus:outline-none mr-3">
                            <img class="w-8 h-8 rounded-full mr-4" src="http://i.pravatar.cc/300" alt="Avatar of User"> <span class="hidden md:inline-block">Hola! {{ auth()->user()->name }}</span>
                            <svg class="pl-2 h-2" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 129 129" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 129 129">
                                <g>
                                    <path d="m121.3,34.6c-1.6-1.6-4.2-1.6-5.8,0l-51,51.1-51.1-51.1c-1.6-1.6-4.2-1.6-5.8,0-1.6,1.6-1.6,4.2 0,5.8l53.9,53.9c0.8,0.8 1.8,1.2 2.9,1.2 1,0 2.1-0.4 2.9-1.2l53.9-53.9c1.7-1.6 1.7-4.2 0.1-5.8z" />
                                </g>
                            </svg>
                        </button>
                        <div id="userMenu" class="bg-white rounded shadow-md mt-2 absolute mt-12 top-0 right-0 min-w-full overflow-auto z-30 invisible">
                            <ul class="list-reset">
                                <li><a href="#" class="px-4 py-2 block text-gray-900 hover:bg-gray-400 no-underline hover:no-underline">Mi perfil</a></li>
                                <li><a href="#" class="px-4 py-2 block text-gray-900 hover:bg-gray-400 no-underline hover:no-underline">Notifications</a></li>
                                <li>
                                    <hr class="border-t mx-2 border-gray-400">
                                </li>
                                <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <li><a href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="px-4 py-2 block text-gray-900 hover:bg-gray-400 no-underline hover:no-underline">Cerrar sesion</a></li>
                                </form>
                                
                            </ul>
                        </div>
                    </div>
                    @endif


                    <div class="block lg:hidden pr-4">
                        <button id="nav-toggle" class="flex items-center px-3 py-2 border rounded text-gray-500 border-gray-600 hover:text-gray-900 hover:border-teal-500 appearance-none focus:outline-none">
                            <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <title>Menu</title>
                                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                            </svg>
                        </button>
                    </div>
                </div>

            </div>


            <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden lg:block mt-2 lg:mt-0 bg-white z-20" id="nav-content">
                <ul class="list-reset lg:flex flex-1 items-center px-4 md:px-0">
                    <li class="mr-6 my-2 md:my-0">
                        <a href="{{url('dashboard')}}" class="block py-1 md:py-3 pl-1 align-middle text-gray-500 no-underline hover:text-gray-900 border-b-2 border-white hover:border-orange-600">
                            <i class="fas fa-home fa-fw mr-3 text-pink-600"></i><span class="pb-1 md:pb-0 text-sm">Principal</span>
                        </a>
                    </li>
                    <li class="mr-6 my-2 md:my-0">
                        <a href="{{route('proyectos.index')}}" class="block py-1 md:py-3 pl-1 align-middle text-gray-500 no-underline hover:text-gray-900 border-b-2 border-white hover:border-pink-500">
                            <i class="fas fa-tasks fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Proyectos</span>
                        </a>
                    </li>
                    <li class="mr-6 my-2 md:my-0">
                        <a href="{{route('convocatorias.index')}}" class="block py-1 md:py-3 pl-1 align-middle text-gray-500 no-underline hover:text-gray-900 border-b-2 border-white hover:border-purple-500">
                            <i class="fa fa-envelope fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Convocatorias</span>
                        </a>
                    </li>
                    <li class="mr-6 my-2 md:my-0">
                        <a href="{{ route('users.index') }}" class="block py-1 md:py-3 pl-1 align-middle text-gray-500 no-underline hover:text-gray-900 border-b-2 border-white hover:border-green-500">
                            <i class="fas fa-chart-area fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Usuarios</span>
                        </a>
                    </li>

                    
                    
                    <li class="mr-6 my-2 md:my-0">
                        <a href="{{ route('permissions.index') }}" class="block py-1 md:py-3 pl-1 align-middle text-gray-500 no-underline hover:text-gray-900 border-b-2 border-white hover:border-blue-500">
                            <i class="fas fa-chart-area fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Permisos</span>
                        </a>
                    </li>
                    <li class="mr-6 my-2 md:my-0">
                        <a href="{{ route('roles.index') }}" class="block py-1 md:py-3 pl-1 align-middle text-gray-500 no-underline hover:text-gray-900 border-b-2 border-white hover:border-yellow-500">
                            <i class="fas fa-chart-area fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Roles</span>
                        </a>
                    </li>
                </ul>

                <div class="relative pull-right pl-4 pr-4 md:pr-0 ">
                    @yield('btn-crear-usuario')
                    @yield('btn-crear-convocatoria')
                    @yield('btn-crear-proyecto')

                </div>

            </div>

        </div>
    </nav>

    @endif

    <!-- /BARRA DE NAVEGACION DEL SUPERADMIN -->



    <!-- BARRA DE NAVEGACION DEL ADMIN -->

    @if(@Auth::user()->hasRole('admin'))

    <nav id="header" class="bg-white fixed w-full z-10 top-0 shadow">


        <div class="w-full container mx-auto flex flex-wrap items-center mt-0 pt-3 pb-3 md:pb-0">

            <div class="w-1/2 pl-2 md:pl-0">
                <a class="text-gray-900 text-base xl:text-xl no-underline text-yellow-600 hover:no-underline font-bold" href="#">
                    <i class="fas fa-sun text-yellow-600 pr-3"></i> Plataforma para el control de proyectos
                </a>
            </div>
            <div class="w-1/2 pr-0">
                <div class="flex relative inline-block float-right">
                    @if (Route::has('login'))
                    <div class="relative text-sm">
                        <button id="userButton" class="flex items-center focus:outline-none mr-3">
                            <img class="w-8 h-8 rounded-full mr-4" src="http://i.pravatar.cc/300" alt="Avatar of User"> <span class="hidden md:inline-block">Hola! {{ auth()->user()->name }}</span>
                            <svg class="pl-2 h-2" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 129 129" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 129 129">
                                <g>
                                    <path d="m121.3,34.6c-1.6-1.6-4.2-1.6-5.8,0l-51,51.1-51.1-51.1c-1.6-1.6-4.2-1.6-5.8,0-1.6,1.6-1.6,4.2 0,5.8l53.9,53.9c0.8,0.8 1.8,1.2 2.9,1.2 1,0 2.1-0.4 2.9-1.2l53.9-53.9c1.7-1.6 1.7-4.2 0.1-5.8z" />
                                </g>
                            </svg>
                        </button>
                        <div id="userMenu" class="bg-white rounded shadow-md mt-2 absolute mt-12 top-0 right-0 min-w-full overflow-auto z-30 invisible">
                            <ul class="list-reset">
                                <li><a href="#" class="px-4 py-2 block text-gray-900 hover:bg-gray-400 no-underline hover:no-underline">Mi perfil</a></li>
                                <li><a href="#" class="px-4 py-2 block text-gray-900 hover:bg-gray-400 no-underline hover:no-underline">Notifications</a></li>
                                <li>
                                    <hr class="border-t mx-2 border-gray-400">
                                </li>
                                <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <li><a href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="px-4 py-2 block text-gray-900 hover:bg-gray-400 no-underline hover:no-underline">Cerrar sesion</a></li>
                                </form>
                                
                            </ul>
                        </div>
                    </div>
                    @endif


                    <div class="block lg:hidden pr-4">
                        <button id="nav-toggle" class="flex items-center px-3 py-2 border rounded text-gray-500 border-gray-600 hover:text-gray-900 hover:border-teal-500 appearance-none focus:outline-none">
                            <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <title>Menu</title>
                                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                            </svg>
                        </button>
                    </div>
                </div>

            </div>


            <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden lg:block mt-2 lg:mt-0 bg-white z-20" id="nav-content">
                <ul class="list-reset lg:flex flex-1 items-center px-4 md:px-0">
                    <li class="mr-6 my-2 md:my-0">
                        <a href="{{url('dashboard')}}" class="block py-1 md:py-3 pl-1 align-middle text-gray-500 no-underline hover:text-gray-900 border-b-2 border-white hover:border-orange-600">
                            <i class="fas fa-home fa-fw mr-3 text-pink-600"></i><span class="pb-1 md:pb-0 text-sm">Principal</span>
                        </a>
                    </li>
                    <li class="mr-6 my-2 md:my-0">
                        <a href="{{route('proyectos.index')}}" class="block py-1 md:py-3 pl-1 align-middle text-gray-500 no-underline hover:text-gray-900 border-b-2 border-white hover:border-pink-500">
                            <i class="fas fa-tasks fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Proyectos</span>
                        </a>
                    </li>
                    <li class="mr-6 my-2 md:my-0">
                        <a href="{{route('convocatorias.index')}}" class="block py-1 md:py-3 pl-1 align-middle text-gray-500 no-underline hover:text-gray-900 border-b-2 border-white hover:border-purple-500">
                            <i class="fa fa-envelope fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Convocatorias</span>
                        </a>
                    </li>
                    <li class="mr-6 my-2 md:my-0">
                        <a href="{{ route('users.index') }}" class="block py-1 md:py-3 pl-1 align-middle text-gray-500 no-underline hover:text-gray-900 border-b-2 border-white hover:border-green-500">
                            <i class="fas fa-chart-area fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Usuarios</span>
                        </a>
                    </li>

                </ul>

                <div class="relative pull-right pl-4 pr-4 md:pr-0 ">
                    @yield('btn-crear-usuario')
                    @yield('btn-crear-convocatoria')
                    @yield('btn-crear-proyecto')

                </div>

            </div>

        </div>
    </nav>

    @endif

    <!-- /BARRA DE NAVEGACION DEL ADMIN -->


    <!-- BARRA DE NAVEGACION DEL USUARIO -->

    @if(@Auth::user()->hasRole('usuario'))

    <nav id="header" class="bg-white fixed w-full z-10 top-0 shadow">


        <div class="w-full container mx-auto flex flex-wrap items-center mt-0 pt-3 pb-3 md:pb-0">

            <div class="w-1/2 pl-2 md:pl-0">
                <a class="text-gray-900 text-base xl:text-xl no-underline text-yellow-600 hover:no-underline font-bold" href="#">
                    <i class="fas fa-sun text-yellow-600 pr-3"></i> Plataforma para el control de proyectos
                </a>
            </div>
            <div class="w-1/2 pr-0">
                <div class="flex relative inline-block float-right">
                    @if (Route::has('login'))
                    <div class="relative text-sm">
                        <button id="userButton" class="flex items-center focus:outline-none mr-3">
                            <img class="w-8 h-8 rounded-full mr-4" src="http://i.pravatar.cc/300" alt="Avatar of User"> <span class="hidden md:inline-block">Hola! {{ auth()->user()->name }}</span>
                            <svg class="pl-2 h-2" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 129 129" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 129 129">
                                <g>
                                    <path d="m121.3,34.6c-1.6-1.6-4.2-1.6-5.8,0l-51,51.1-51.1-51.1c-1.6-1.6-4.2-1.6-5.8,0-1.6,1.6-1.6,4.2 0,5.8l53.9,53.9c0.8,0.8 1.8,1.2 2.9,1.2 1,0 2.1-0.4 2.9-1.2l53.9-53.9c1.7-1.6 1.7-4.2 0.1-5.8z" />
                                </g>
                            </svg>
                        </button>
                        <div id="userMenu" class="bg-white rounded shadow-md mt-2 absolute mt-12 top-0 right-0 min-w-full overflow-auto z-30 invisible">
                            <ul class="list-reset">
                                <li><a href="#" class="px-4 py-2 block text-gray-900 hover:bg-gray-400 no-underline hover:no-underline">Mi perfil</a></li>
                                <li><a href="#" class="px-4 py-2 block text-gray-900 hover:bg-gray-400 no-underline hover:no-underline">Notifications</a></li>
                                <li>
                                    <hr class="border-t mx-2 border-gray-400">
                                </li>
                                <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <li><a href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="px-4 py-2 block text-gray-900 hover:bg-gray-400 no-underline hover:no-underline">Cerrar sesion</a></li>
                                </form>
                                
                            </ul>
                        </div>
                    </div>
                    @endif


                    <div class="block lg:hidden pr-4">
                        <button id="nav-toggle" class="flex items-center px-3 py-2 border rounded text-gray-500 border-gray-600 hover:text-gray-900 hover:border-teal-500 appearance-none focus:outline-none">
                            <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <title>Menu</title>
                                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                            </svg>
                        </button>
                    </div>
                </div>

            </div>


            <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden lg:block mt-2 lg:mt-0 bg-white z-20" id="nav-content">
                <ul class="list-reset lg:flex flex-1 items-center px-4 md:px-0">
                    <li class="mr-6 my-2 md:my-0">
                        <a href="{{url('dashboard')}}" class="block py-1 md:py-3 pl-1 align-middle text-gray-500 no-underline hover:text-gray-900 border-b-2 border-white hover:border-orange-600">
                            <i class="fas fa-home fa-fw mr-3 text-pink-600"></i><span class="pb-1 md:pb-0 text-sm">Principal</span>
                        </a>
                    </li>
                    <li class="mr-6 my-2 md:my-0">
                        <a href="{{route('proyectos.index')}}" class="block py-1 md:py-3 pl-1 align-middle text-gray-500 no-underline hover:text-gray-900 border-b-2 border-white hover:border-pink-500">
                            <i class="fas fa-tasks fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Proyectos</span>
                        </a>
                    </li>
                    <li class="mr-6 my-2 md:my-0">
                        <a href="{{route('convocatorias.index')}}" class="block py-1 md:py-3 pl-1 align-middle text-gray-500 no-underline hover:text-gray-900 border-b-2 border-white hover:border-purple-500">
                            <i class="fa fa-envelope fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Convocatorias</span>
                        </a>
                    </li>

                </ul>

            </div>

        </div>
    </nav>

    @endif

    <!-- /BARRA DE NAVEGACION DEL USUARIO -->

    <!--contenedor-->
    <div class="container w-full mx-auto pt-20">

        <div class="w-full px-4 md:px-0 md:mt-8 mb-16 text-gray-800 leading-normal">

        @section('contenido')

        <div class="flex">

            @if(@Auth::user()->hasRole('spadmin'))
                <!-- CARD PROYECTOS -->

            <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5">
                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-md bg-white w-64">
                    <div align="center" class="mt-10">
                        <a href="{{route('proyectos.index')}}" class="" >
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-20 h-20 text-black ">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
                            </svg>
                        </a>
                    </div>
                    
                    <div class="p-5">
                        <a href="{{route('proyectos.index')}}">
                            <h5 class="mb-2 text-2xl text-center font-bold tracking-tight text-black">Proyectos</h5>
                        </a>
                    </div>

                    <div align="center" class="py-5">
                        <a href="{{route('proyectos.index')}}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-yellow-600 hover:bg-yellow-700 rounded-lg focus:ring-4 focus:outline-none focus:ring-yellow-300  dark:focus:ring-yellow-800">
                            Entrar
                            <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </a>
                    </div>
                </div>

                <!-- /CARD PROYECTOS -->


                <!-- CARD CONVOCATORIA -->

                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-md bg-white w-64">
                    <div align="center" class="mt-10">
                        <a href="{{route('convocatorias.index')}}" class="" >
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-20 h-20 text-black">
                                <path d="M12.75 12.75a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM7.5 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM8.25 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM9.75 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM10.5 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM12.75 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM14.25 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM15 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM16.5 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM15 12.75a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM16.5 13.5a.75.75 0 100-1.5.75.75 0 000 1.5z" />
                                <path fill-rule="evenodd" d="M6.75 2.25A.75.75 0 017.5 3v1.5h9V3A.75.75 0 0118 3v1.5h.75a3 3 0 013 3v11.25a3 3 0 01-3 3H5.25a3 3 0 01-3-3V7.5a3 3 0 013-3H6V3a.75.75 0 01.75-.75zm13.5 9a1.5 1.5 0 00-1.5-1.5H5.25a1.5 1.5 0 00-1.5 1.5v7.5a1.5 1.5 0 001.5 1.5h13.5a1.5 1.5 0 001.5-1.5v-7.5z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                    
                    <div class="p-5">
                        <a href="{{route('convocatorias.index')}}">
                            <h5 class="mb-2 text-2xl text-center font-bold tracking-tight text-black">Convocatorias</h5>
                        </a>
                    </div>

                    <div align="center" class="py-5">
                        <a href="{{route('convocatorias.index')}}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-yellow-600 hover:bg-yellow-700 rounded-lg focus:ring-4 focus:outline-none focus:ring-yellow-300  dark:focus:ring-yellow-800">
                            Entrar
                            <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </a>
                    </div>
                </div>

                <!-- /CARD CONVOCATORIA -->


                <!-- CARD USUARIO -->

                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-md bg-white w-64">
                    <div align="center" class="mt-10">
                        <a href="{{route('users.index')}}" class="" >
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-20 h-20 text-black">
                                <path fill-rule="evenodd" d="M8.25 6.75a3.75 3.75 0 117.5 0 3.75 3.75 0 01-7.5 0zM15.75 9.75a3 3 0 116 0 3 3 0 01-6 0zM2.25 9.75a3 3 0 116 0 3 3 0 01-6 0zM6.31 15.117A6.745 6.745 0 0112 12a6.745 6.745 0 016.709 7.498.75.75 0 01-.372.568A12.696 12.696 0 0112 21.75c-2.305 0-4.47-.612-6.337-1.684a.75.75 0 01-.372-.568 6.787 6.787 0 011.019-4.38z" clip-rule="evenodd" />
                                <path d="M5.082 14.254a8.287 8.287 0 00-1.308 5.135 9.687 9.687 0 01-1.764-.44l-.115-.04a.563.563 0 01-.373-.487l-.01-.121a3.75 3.75 0 013.57-4.047zM20.226 19.389a8.287 8.287 0 00-1.308-5.135 3.75 3.75 0 013.57 4.047l-.01.121a.563.563 0 01-.373.486l-.115.04c-.567.2-1.156.349-1.764.441z" />
                            </svg>
                        </a>
                    </div>
                    
                    <div class="p-5">
                        <a href="{{route('users.index')}}">
                            <h5 class="mb-2 text-2xl text-center font-bold tracking-tight text-black">Usuarios</h5>
                        </a>
                    </div>

                    <div align="center" class="py-5">
                        <a href="{{route('users.index')}}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-yellow-600 hover:bg-yellow-700 rounded-lg focus:ring-4 focus:outline-none focus:ring-yellow-300  dark:focus:ring-yellow-800">
                            Entrar
                            <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </a>
                    </div>
                </div>

                <!-- /CARD USUARIO -->

                <!-- CARD PERMISOS -->

                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-md bg-white w-64">
                    <div align="center" class="mt-10">
                        <a href="{{route('permissions.index')}}" class="" >
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-20 h-20 text-black">
                                <path fill-rule="evenodd" d="M4.125 3C3.089 3 2.25 3.84 2.25 4.875V18a3 3 0 003 3h15a3 3 0 01-3-3V4.875C17.25 3.839 16.41 3 15.375 3H4.125zM12 9.75a.75.75 0 000 1.5h1.5a.75.75 0 000-1.5H12zm-.75-2.25a.75.75 0 01.75-.75h1.5a.75.75 0 010 1.5H12a.75.75 0 01-.75-.75zM6 12.75a.75.75 0 000 1.5h7.5a.75.75 0 000-1.5H6zm-.75 3.75a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5H6a.75.75 0 01-.75-.75zM6 6.75a.75.75 0 00-.75.75v3c0 .414.336.75.75.75h3a.75.75 0 00.75-.75v-3A.75.75 0 009 6.75H6z" clip-rule="evenodd" />
                                <path d="M18.75 6.75h1.875c.621 0 1.125.504 1.125 1.125V18a1.5 1.5 0 01-3 0V6.75z" />
                            </svg>
                        </a>
                    </div>
                    
                    <div class="p-5">
                        <a href="{{route('permissions.index')}}">
                            <h5 class="mb-2 text-2xl text-center font-bold tracking-tight text-black">Permisos</h5>
                        </a>
                    </div>

                    <div align="center" class="py-5">
                        <a href="{{route('permissions.index')}}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-yellow-600 hover:bg-yellow-700 rounded-lg focus:ring-4 focus:outline-none focus:ring-yellow-300  dark:focus:ring-yellow-800">
                            Entrar
                            <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </a>
                    </div>
                </div>

                <!-- /CARD PERMISOS -->

                <!-- CARD ROLES -->

                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-md bg-white w-64">
                    <div align="center" class="mt-10">
                        <a href="{{route('roles.index')}}" class="" >
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-20 h-20 text-black">
                                <path d="M6 3a3 3 0 00-3 3v2.25a3 3 0 003 3h2.25a3 3 0 003-3V6a3 3 0 00-3-3H6zM15.75 3a3 3 0 00-3 3v2.25a3 3 0 003 3H18a3 3 0 003-3V6a3 3 0 00-3-3h-2.25zM6 12.75a3 3 0 00-3 3V18a3 3 0 003 3h2.25a3 3 0 003-3v-2.25a3 3 0 00-3-3H6zM17.625 13.5a.75.75 0 00-1.5 0v2.625H13.5a.75.75 0 000 1.5h2.625v2.625a.75.75 0 001.5 0v-2.625h2.625a.75.75 0 000-1.5h-2.625V13.5z" />
                            </svg>
                        </a>
                    </div>
                    
                    <div class="p-5">
                        <a href="{{route('roles.index')}}">
                            <h5 class="mb-2 text-2xl text-center font-bold tracking-tight text-black">Roles</h5>
                        </a>
                    </div>

                    <div align="center" class="py-5">
                        <a href="{{route('roles.index')}}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-yellow-600 hover:bg-yellow-700 rounded-lg focus:ring-4 focus:outline-none focus:ring-yellow-300  dark:focus:ring-yellow-800">
                            Entrar
                            <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </a>
                    </div>
                </div>

                <!-- /CARD ROLES -->

            </div>
            @endif
            

            @if(@Auth::user()->hasRole('admin'))
                <!-- CARD PROYECTOS -->


                <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5">
                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-md bg-white w-64">
                    <div align="center" class="mt-10">
                        <a href="{{route('proyectos.index')}}" class="" >
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-20 h-20 text-black ">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
                            </svg>
                        </a>
                    </div>
                    
                    <div class="p-5">
                        <a href="{{route('proyectos.index')}}">
                            <h5 class="mb-2 text-2xl text-center font-bold tracking-tight text-black">Proyectos</h5>
                        </a>
                    </div>

                    <div align="center" class="py-5">
                        <a href="{{route('proyectos.index')}}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-yellow-600 hover:bg-yellow-700 rounded-lg focus:ring-4 focus:outline-none focus:ring-yellow-300  dark:focus:ring-yellow-800">
                            Entrar
                            <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </a>
                    </div>
                </div>

                <!-- /CARD PROYECTOS -->


                <!-- CARD CONVOCATORIA -->

                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-md bg-white w-64">
                    <div align="center" class="mt-10">
                        <a href="{{route('convocatorias.index')}}" class="" >
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-20 h-20 text-black">
                                <path d="M12.75 12.75a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM7.5 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM8.25 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM9.75 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM10.5 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM12.75 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM14.25 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM15 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM16.5 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM15 12.75a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM16.5 13.5a.75.75 0 100-1.5.75.75 0 000 1.5z" />
                                <path fill-rule="evenodd" d="M6.75 2.25A.75.75 0 017.5 3v1.5h9V3A.75.75 0 0118 3v1.5h.75a3 3 0 013 3v11.25a3 3 0 01-3 3H5.25a3 3 0 01-3-3V7.5a3 3 0 013-3H6V3a.75.75 0 01.75-.75zm13.5 9a1.5 1.5 0 00-1.5-1.5H5.25a1.5 1.5 0 00-1.5 1.5v7.5a1.5 1.5 0 001.5 1.5h13.5a1.5 1.5 0 001.5-1.5v-7.5z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                    
                    <div class="p-5">
                        <a href="{{route('convocatorias.index')}}">
                            <h5 class="mb-2 text-2xl text-center font-bold tracking-tight text-black">Convocatorias</h5>
                        </a>
                    </div>

                    <div align="center" class="py-5">
                        <a href="{{route('convocatorias.index')}}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-yellow-600 hover:bg-yellow-700 rounded-lg focus:ring-4 focus:outline-none focus:ring-yellow-300  dark:focus:ring-yellow-800">
                            Entrar
                            <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </a>
                    </div>
                </div>

                <!-- /CARD CONVOCATORIA -->


                <!-- CARD USUARIO -->

                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-md bg-white w-64">
                    <div align="center" class="mt-10">
                        <a href="{{route('users.index')}}" class="" >
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-20 h-20 text-black">
                                <path fill-rule="evenodd" d="M8.25 6.75a3.75 3.75 0 117.5 0 3.75 3.75 0 01-7.5 0zM15.75 9.75a3 3 0 116 0 3 3 0 01-6 0zM2.25 9.75a3 3 0 116 0 3 3 0 01-6 0zM6.31 15.117A6.745 6.745 0 0112 12a6.745 6.745 0 016.709 7.498.75.75 0 01-.372.568A12.696 12.696 0 0112 21.75c-2.305 0-4.47-.612-6.337-1.684a.75.75 0 01-.372-.568 6.787 6.787 0 011.019-4.38z" clip-rule="evenodd" />
                                <path d="M5.082 14.254a8.287 8.287 0 00-1.308 5.135 9.687 9.687 0 01-1.764-.44l-.115-.04a.563.563 0 01-.373-.487l-.01-.121a3.75 3.75 0 013.57-4.047zM20.226 19.389a8.287 8.287 0 00-1.308-5.135 3.75 3.75 0 013.57 4.047l-.01.121a.563.563 0 01-.373.486l-.115.04c-.567.2-1.156.349-1.764.441z" />
                            </svg>
                        </a>
                    </div>
                    
                    <div class="p-5">
                        <a href="{{route('users.index')}}">
                            <h5 class="mb-2 text-2xl text-center font-bold tracking-tight text-black">Usuarios</h5>
                        </a>
                    </div>

                    <div align="center" class="py-5">
                        <a href="{{route('users.index')}}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-yellow-600 hover:bg-yellow-700 rounded-lg focus:ring-4 focus:outline-none focus:ring-yellow-300  dark:focus:ring-yellow-800">
                            Entrar
                            <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </a>
                    </div>
                </div>

                <!-- /CARD USUARIO -->

            </div>
            @endif



            @if(@Auth::user()->hasRole('usuario'))
            <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5">
                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-md bg-white w-64">
                    <div align="center" class="mt-10">
                        <a href="{{route('proyectos.index')}}" class="" >
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-20 h-20 text-black ">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
                            </svg>
                        </a>
                    </div>
                    
                    <div class="p-5">
                        <a href="{{route('proyectos.index')}}">
                            <h5 class="mb-2 text-2xl text-center font-bold tracking-tight text-black">Proyectos</h5>
                        </a>
                    </div>

                    <div align="center" class="py-5">
                        <a href="{{route('proyectos.index')}}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-yellow-600 hover:bg-yellow-700 rounded-lg focus:ring-4 focus:outline-none focus:ring-yellow-300  dark:focus:ring-yellow-800">
                            Entrar
                            <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </a>
                    </div>
                </div>

                <!-- /CARD PROYECTOS -->


                <!-- CARD CONVOCATORIA -->

                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-md bg-white w-64">
                    <div align="center" class="mt-10">
                        <a href="{{route('convocatorias.index')}}" class="" >
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-20 h-20 text-black">
                                <path d="M12.75 12.75a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM7.5 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM8.25 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM9.75 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM10.5 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM12.75 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM14.25 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM15 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM16.5 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM15 12.75a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM16.5 13.5a.75.75 0 100-1.5.75.75 0 000 1.5z" />
                                <path fill-rule="evenodd" d="M6.75 2.25A.75.75 0 017.5 3v1.5h9V3A.75.75 0 0118 3v1.5h.75a3 3 0 013 3v11.25a3 3 0 01-3 3H5.25a3 3 0 01-3-3V7.5a3 3 0 013-3H6V3a.75.75 0 01.75-.75zm13.5 9a1.5 1.5 0 00-1.5-1.5H5.25a1.5 1.5 0 00-1.5 1.5v7.5a1.5 1.5 0 001.5 1.5h13.5a1.5 1.5 0 001.5-1.5v-7.5z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                    
                    <div class="p-5">
                        <a href="{{route('convocatorias.index')}}">
                            <h5 class="mb-2 text-2xl text-center font-bold tracking-tight text-black">Convocatorias</h5>
                        </a>
                    </div>

                    <div align="center" class="py-5">
                        <a href="{{route('convocatorias.index')}}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-yellow-600 hover:bg-yellow-700 rounded-lg focus:ring-4 focus:outline-none focus:ring-yellow-300  dark:focus:ring-yellow-800">
                            Entrar
                            <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </a>
                    </div>
                </div>

                <!-- /CARD CONVOCATORIA -->


            </div>
            @endif


        </div>
        @endsection



            <!--contenido-->
            @yield('contenido')

            @yield('js')
            <!--/contenido-->
            

        </div>


    </div>
    <!--/contenedor-->

    

    <script>
    /*Toggle dropdown list*/
    /*https://gist.github.com/slavapas/593e8e50cf4cc16ac972afcbad4f70c8*/

    var userMenuDiv = document.getElementById("userMenu");
    var userMenu = document.getElementById("userButton");

    var navMenuDiv = document.getElementById("nav-content");
    var navMenu = document.getElementById("nav-toggle");

    document.onclick = check;

    function check(e) {
        var target = (e && e.target) || (event && event.srcElement);

        //User Menu
        if (!checkParent(target, userMenuDiv)) {
            // click NOT on the menu
            if (checkParent(target, userMenu)) {
                // click on the link
                if (userMenuDiv.classList.contains("invisible")) {
                    userMenuDiv.classList.remove("invisible");
                } else { userMenuDiv.classList.add("invisible"); }
            } else {
                // click both outside link and outside menu, hide menu
                userMenuDiv.classList.add("invisible");
            }
        }

        //Nav Menu
        if (!checkParent(target, navMenuDiv)) {
            // click NOT on the menu
            if (checkParent(target, navMenu)) {
                // click on the link
                if (navMenuDiv.classList.contains("hidden")) {
                    navMenuDiv.classList.remove("hidden");
                } else { navMenuDiv.classList.add("hidden"); }
            } else {
                // click both outside link and outside menu, hide menu
                navMenuDiv.classList.add("hidden");
            }
        }

    }

    function checkParent(t, elm) {
        while (t.parentNode) {
            if (t == elm) { return true; }
            t = t.parentNode;
        }
        return false;
    }
    </script>

</body>

</x-app-layout>
