@php
    $nav_links = [
        /*[
            'name' => 'Cliente Vip',
            'route' => route('vip-client'),
            'active' => request()->routeIs('vip-client'),
        ], */
        /*   [
        'name' => 'Aliados Comerciales Vip',
        'route' => route('vip-ally'),
        'active' => request()->routeIs('vip-ally'),
    ], */
    ];
    
@endphp{{-- fin links de navegacion --}}

<section class="mb-8" x-data="dropdown()">
    {{-- header del menu de navegacion --}}

    <div class="h-24 hidden md:block">{{-- se debe ocultar estando en una pantalla pequeña --}}

        <div class="container topbar-menu-area">{{-- menu desplegable parte superior izquierda --}}
            <div>

                <div class="topbar-menu right-menu relative" style="z-index: 999">{{-- dropdown links de navegacion segun el rol --}}
                    <ul>

                        @if (Route::has('login'))
                            @auth

                                @if (Auth::user())
                                    <li class="menu-item menu-item-has-children parent">
                                        <a title="My Account" class="cursor-default">¡Hola,
                                            {{ Auth::user()->name }}!<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                        <ul class="submenu curency">

                                            @can('Only admin')
                                                <li class="menu-item">
                                                    <a title="Products" href="{{ route('admin.index') }}">Gestionar
                                                        productos</a>
                                                </li>

                                                <li class="menu-item">
                                                    <a title="Categories" href="{{ route('admin.categories.index') }}">Gestionar
                                                        categorias</a>
                                                </li>

                                                <li class="menu-item">
                                                    <a title="Brands" href="{{ route('admin.brands.index') }}">Gestionar
                                                        marcas</a>
                                                </li>

                                                <li class="menu-item">
                                                    <a title="Manage Home Sliders"
                                                        href="{{ route('admin.banners.index') }}">Gestionar
                                                        Publicidad </a>
                                                </li>

                                                <li class="menu-item">
                                                    <a title="All Order List" href="{{ route('admin.orders.index') }}">Gestionar
                                                        ordenes</a>
                                                </li>

                                                <li class="menu-item">
                                                    <a title="Manage Coupon"
                                                        href="{{ route('admin.contacts.index') }}">Gestionar Mensajes</a>
                                                </li>

                                                <li class="menu-item">
                                                    <a title="Manage users" href="{{ route('admin.users.index') }}">Gestionar
                                                        usuarios</a>
                                                </li>

                                                <li class="menu-item">
                                                    <a title="Manage Coupon" href="{{ route('admin.roles.index') }}">Gestionar
                                                        Roles</a>
                                                </li>
                                            @endcan

                                            @can('Ver dashboard')
                                                <li class="menu-item">
                                                    <a title="ATC" href="{{ route('admin.index') }}">Gestiones
                                                        ATC</a>
                                                </li>
                                            @endcan

                                            <li class="menu-item">
                                                <a href="{{route('subscribe.show')}}" class="link-term">Suscripción</a>
                                            </li>

                                            <li class="menu-item">
                                                <a title="Settings" href="{{ route('profile.show') }}">Gestionar
                                                    perfil</a>
                                            </li>

                                            <li class="menu-item">
                                                <a href="{{ route('logout') }}"
                                                    onClick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    Cerrar sesión
                                                </a>
                                            </li>
                                            <form id="logout-form" method="POST" action="{{ route('logout') }}">
                                                @csrf
                                            </form>

                                        </ul>
                                    </li>
                                @else
                                    <li class="menu-item menu-item-has-children parent">
                                        <a title="My Account" href="#">Mi cuenta ({{ Auth::user()->name }})<i
                                                class="fa fa-angle-down" aria-hidden="true"></i></a>
                                        <ul class="submenu curency">

                                            <li class="menu-item">
                                                <a title="Dashboard" href="{{ route('profile.show') }}">Mi perfil</a>
                                            </li>

                                            <li class="menu-item">
                                                <a title="My Order List" href="{{ route('orders.index') }}">Mis
                                                    pedidos</a>
                                            </li>

                                            <li class="menu-item">
                                                <a href="{{ route('logout') }}"
                                                    onClick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    Cerrar sesíon
                                                </a>
                                            </li>
                                            <form id="logout-form" method="POST" action="{{ route('logout') }}">
                                                @csrf
                                            </form>
                                        </ul>
                                    </li>
                                @endif
                            @else
                                <li class="menu-item"><a title="Register or Login" href="{{ route('login') }}">Acceder</a>
                                </li>
                                <li class="menu-item"><a title="Register or Login"
                                        href="{{ route('register') }}">Registrarse</a></li>
                            @endauth
                        @endif
                    </ul>
                </div>{{-- end dropdown --}}

            </div>
        </div>{{-- end menu desplegable  superior --}}

    </div>{{-- end Menu y links de navegacion pantalla grande, logo, componente search menu arriba login,debajo de esto viene en nav --}}

    <div class="container flex items-center justify-center h-24  ">{{-- NAV ojo pantalla grande --}}


        <a href="/" class="items-center justify-center">
            <x-jet-application-mark class="block w-auto {{-- h-9 --}}" />{{-- logo /componente jestream --}}
        </a>


    </div>

    <div class="container items-center space-x-8 sm:-my-px sm:ml-10 sm:flex scroll-mr-0">

        <div class="flex-1 hidden md:block">{{-- arriba de esto estaba el icono de bag; links de navegacion: recibe los datos de la variable $nav_link ejecutada en la sentencia php que esta en el principio de esta view --}}
            @foreach ($nav_links as $nav_link)
                <x-jet-nav-link href="{{ $nav_link['route'] }}" :active="$nav_link['active']">
                    {{ $nav_link['name'] }}
                </x-jet-nav-link>
            @endforeach
        </div>

        <!-- acordeon o tres rayas esto es en responsive -->
        <div class="flex items-center -mr-2 sm:hidden" style="z-index: 900" x-on:click="show()">
            <button {{-- @click="open = ! open" --}}
                class="inline-flex items-center justify-center p-2 text-gray-400 transition rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500">
                <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        {{-- menu  celular responsive, Categorias y links de navegacion --}}
        <div class="h-full mb-24 overflow-y-auto bg-white  sm:hidden  " x-show="open"
            :class="{ 'block': open, 'hidden': !open }">

            <div class="container py-3 mb-2 bg-gray-200">{{-- componente Search resource/livewire/search --}}
                @livewire('search') 
            </div>

            <div class="pt-2 pb-3 space-y-1">{{-- links de navegacion --}}
                @foreach ($nav_links as $nav_link)
                    <x-jet-responsive-nav-link href="{{ $nav_link['route'] }}" :active="$nav_link['active']">
                        {{ $nav_link['name'] }}
                    </x-jet-responsive-nav-link>
                @endforeach
            </div>

            <x-jet-responsive-nav-link href="{{ route('subscribe.show') }}" :active="request()->routeIs('subscribe.show')"
                class="flex items-center px-4 py-2 text-sm text-trueGray-500">

                <span class="flex justify-center w-9">
                    <i class="fa fa-plus-square" aria-hidden="true"></i>
                </span>

                Afíliate
            </x-jet-responsive-nav-link>

            <p class="px-6 my-2 text-trueGray-500">CATEGORÍAS</p>

            <ul class="pt-2 pb-3 space-y-1 border-t border-gray-200">
                @foreach ($categories as $key => $item)
                    <li class="text-trueGray-500">
                        <x-jet-responsive-nav-link href="{{ route('categories.show', $item) }}"
                            class="flex items-center px-4 text-sm">

                            <span class="flex justify-center w-9">
                                {!! $item->icon !!}
                            </span>

                            {{ $item->name }}
                        </x-jet-responsive-nav-link>
                    </li>
                @endforeach
            </ul>

            <p class="px-6 my-2 text-trueGray-500">USUARIOS</p>

            @auth
                <!-- Responsive Settings Options -->
                <div class="pt-4 pb-4 border-t border-gray-200">

                    <div class="flex items-center px-4 mb-2">

                        <div class="flex-shrink-0 mr-3">
                            <img class="object-cover w-10 h-10 rounded-full" src="{{ Auth::user()->profile_photo_url }}"
                                alt="{{ Auth::user()->name }}" />
                        </div>

                        <div>
                            <div class="text-base font-medium text-gray-800">{{ Auth::user()->name }}</div>
                            <div class="text-sm font-medium text-gray-500">{{ Auth::user()->email }}</div>
                        </div>
                    </div>

                    @livewire('cart-phone'){{-- componente resources/livewire/cart-phone --}}

                    <x-jet-responsive-nav-link href="{{ route('orders.index') }}" :active="request()->routeIs('orders.index')"
                        class="flex items-center px-4 py-2 text-sm text-trueGray-500">

                        <span class="flex justify-center w-9">
                            <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                        </span>

                        Mis pedidos
                    </x-jet-responsive-nav-link>


                    @can('Ver dashboard')
                        {{-- solo los que tengan este permiso pueden visualisar esta opcion --}}

                        <x-jet-responsive-nav-link href="{{ route('admin.index') }}" :active="request()->routeIs('admin.index')"
                            class="flex items-center px-4 py-2 text-sm text-trueGray-500">

                            <span class="flex justify-center w-9">
                                <i class="fa fa-cogs"></i>
                            </span>

                            Gestiones ATC
                        </x-jet-responsive-nav-link>
                    @endcan

                    <div class="mb-8">
                        <!-- Account Management -->
                        <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')"
                            class="flex items-center px-4 text-sm text-trueGray-500">

                            <span class="flex justify-center w-9">
                                <i class="far fa-address-card"></i>
                            </span>

                            Perfil
                        </x-jet-responsive-nav-link>

                        <!-- Authentication -->
                        <x-jet-responsive-nav-link href="{{ route('logout') }}" :active="request()->routeIs('logout')"
                            onClick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            class="flex items-center px-4 py-2 text-sm text-trueGray-500">

                            <span class="flex justify-center w-9">
                                <i class="fas fa-sign-out-alt"></i>
                            </span>

                            Cerrar sesión
                        </x-jet-responsive-nav-link>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            @csrf
                        </form>

                    </div>
                </div>

                <div class="h-full">

                </div>
            @else
                <x-jet-responsive-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')"
                    class="flex items-center px-4 py-2 text-sm text-trueGray-500 ">

                    <span class="flex justify-center w-9">
                        <i class="fas fa-user-circle"></i>
                    </span>

                    Iniciar sesión
                </x-jet-responsive-nav-link>

                <x-jet-responsive-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')"
                    class="flex items-center px-4 py-2 mb-8 text-sm text-trueGray-500 ">

                    <span class="flex justify-center w-9">
                        <i class="fas fa-fingerprint"></i>
                    </span>

                    registrate
                </x-jet-responsive-nav-link>
                <div class="h-full">

                </div>
            @endauth

        </div>

    </div>{{-- end --}}

</section>

<header class="sticky top-0 " style="z-index: 900" x-data="dropdown()">
    <!-- interes nuevo nav-->
    <nav class="container  bg-white mx-auto px-4 py-6 hidden  md:block">

        <div class="flex items-center justify-between">

            <div class="hidden w-full text-black md:flex  md:tems-center md:justify-between">

                <div>
                    <a href="/"><i class="fa fa-home fa-lg" aria-hidden="true"></i></a>
                    {{-- inicio --}}
                </div>

                <div :class="{ 'bg-opacity-100 text-gold': open }" x-on:click="show()" {{-- ico de categorias --}}
                    class="flex flex-col items-center justify-center {{-- order-last --}} hidden h-full{{--  px-6 --}} text-black bg-white bg-opacity-25 cursor-pointer {{-- md:order-first --}} md:px-4 md:block">
                    <i class="fa fa-bars fa-lg" aria-hidden="true"></i>
                </div>{{-- end icono categorias --}}

                <div class="md:block  w-3/4 mr-6">
                    @livewire('search')
                </div>

                <div class="{{-- w-2/3 --}} w-full h-full">
                    {{-- Logo nav icono pequeño tipo gif --}}
                    <a href="{{ route('vip-client') }}">
                        <img src="{{ asset('img/VERSAGGE50048.gif') }}" />
                    </a>
                </div>

                {{-- iconos de orden/ carrito de compras --}}
                <div class="flex items-center justify-end w-full">

                    <div class="flex md:justify-start">

                        <div class="hidden mr-6 md:block">
                            @livewire('dropdown-order')
                        </div>

                        <div class="hidden md:block">
                            @livewire('dropdown-cart')
                        </div>

                    </div>

                </div>

            </div>


        </div>

        {{-- Fin iconos de nuevo Nav --}}

        <div id="navigation-menu" style="z-index: 900" x-show="open" :class="{ 'block': open, 'hidden': !open }"
            class="absolute hidden w-full bg-opacity-25 bg-trueGray-700">

            <div class="container py-6 hidden h-full md:block">{{-- Menu categorias y subcategorias computadora --}}

                <div x-on:click.away="close()" class="relative grid h-full grid-cols-4">
                    <ul class="bg-white">
                        <div class="mt-8">
                            <p class="mb-3 text-lg font-bold text-center text-trueGray-500">Categorías</p>
                            @foreach ($categories as $category)
                                <li class="navigation-link text-trueGray-500 hover:bg-gold hover:text-white">
                                    <a href="{{ route('categories.show', $category) }}"
                                        class="flex items-center px-4 py-2 text-sm">

                                        <span class="flex justify-center w-9">
                                            {!! $category->icon !!}
                                        </span>

                                        {{ $category->name }}
                                    </a>

                                    <div
                                        class="absolute top-0 right-0 hidden w-3/4 h-full bg-gray-100 navigation-submenu">
                                        <x-components.navigation-subcategories :category="$category" />
                                    </div>

                                </li>
                            @endforeach
                        </div>

                    </ul>

                    <div class="col-span-3 bg-gray-100">
                        <x-components.navigation-subcategories :category="$categories->first()" />
                    </div>
                </div>
            </div>{{-- end categorias y sub --}}

        </div>

    </nav>


</header>
