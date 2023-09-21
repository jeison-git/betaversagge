<div class="container">

    @if (session('success'))
        <h1>{{ session('success') }}</h1>
    @endif

    <!-- component super mega offertas vip-->
    <div class="w-full min-h-full p-6 mt-12 bg-cover  {{-- rounded-lg --}} shadow-2xl container "
        style="background-image: url('https://images.unsplash.com/photo-1497997092403-f091fcf5b6c4?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80');'">


        {{-- <h3 class="mb-4 text-base font-extrabold text-left text-white uppercase md:text-2xl">Promoción del día</h3> --}}

        <div
            class="flex items-center justify-center w-3/4 h-16 py-8 mx-auto mt-8 mb-8 text-center transition duration-500 ease-in-out transform rounded-full shadow-lg cursor-default hover:-translate-y-1 hover:shadow-2xl">

            <h3
                class="font-extrabold text-center text-transparent uppercase md:text-2xl bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 hover:from-pink-500 hover:to-yellow-500">
                Tu elegancia, nuestro compromiso
            </h3>

        </div>

        <div class="flex items-center justify-center">
            <div class="grid order-1 grid-cols-2 px-6 md:grid-cols-5 gap-x-6 gap-y-8">{{-- contiene productos estaticos definidos en el controlador welcome $offers --}}

                @foreach ($offers as $offer)
                    <div class="flex items-center justify-center">

                        <div class="overflow-hidden rounded-lg shadow-lg cursor-pointer ">


                            <a href="{{ route('products.show', $offer) }}">
                                <div class="items-center flex-1 bg-white justify-centerp-4">

                                    @if ($offer->images->count())
                                        <img class="object-cover object-center w-full h-32 p-2 duration-500 transform hover:shadow-xl hover:scale-105"
                                            src="{{ Storage::url($offer->images->first()->url) }}" alt="..." />
                                    @else
                                        <img class="object-contain w-full rounded-full h-3264"
                                            src="https://img.icons8.com/fluency/64/000000/nothing-found.png"
                                            alt="nothing-found">
                                    @endif

                                    <span
                                        class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full">${{ $offer->price }}</span>
                                </div>
                            </a>

                        </div>

                    </div>
                @endforeach

            </div>
        </div>


    </div>



    <section class="py-16">

        {{-- barra de opcion para visualizar los productos por lista o columnas y filtros --}}
        <div class="bg-white {{-- rounded-lg --}} shadow-lg">

            <div class="flex items-center justify-between px-6 py-2">

                {{-- prueba  filtros --}}
                <div class="container topbar-menu-area">
                    <div class="items-center topbar-menu">
                        <ul>

                            <li class="text-sm cursor-pointer menu-item menu-item-has-children parent">
                                {{-- filtros por  categorias --}}
                                <a title="Categories">Categorias
                                    <i class="fa fa-angle-down" aria-hidden="true">
                                    </i>
                                </a>
                                <ul class="submenu curency">
                                    @foreach ($categories as $category)
                                        <li class="cursor-pointer menu-item">
                                            <a title="Categories" value="{{ $category->id }}"
                                                wire:click="$set('category_id', {{ $category->id }})">
                                                {{ $category->name }}
                                            </a>
                                        </li>
                                    @endforeach

                                </ul>
                            </li>

                            <li class="ml-6 text-sm cursor-pointer menu-item menu-item-has-children parent">
                                {{-- filtros por subcategorias --}}
                                <a title="Subcategorías">Subcategorias
                                    <i class="fa fa-angle-down" aria-hidden="true">
                                    </i>
                                </a>
                                <ul class="submenu curency">
                                    @foreach ($subcategories as $subcategory)
                                        <li class="cursor-pointer menu-item">
                                            <a title="Subcategories" value="{{ $subcategory->id }}"
                                                wire:click="$set('subcategory_id', {{ $subcategory->id }})">
                                                {{ $subcategory->name }}
                                            </a>
                                        </li>
                                    @endforeach

                                </ul>
                            </li>

                            <li class="ml-6 text-sm cursor-pointer menu-item menu-item-has-children parent">
                                {{-- filtros por marcar --}}
                                <a title="Categories">Marcas
                                    <i class="fa fa-angle-down" aria-hidden="true">
                                    </i>
                                </a>
                                <ul class="submenu curency">
                                    @foreach ($brands as $brand)
                                        <li class="cursor-pointer menu-item">
                                            <a title="brand" value="{{ $brand->id }}"
                                                wire:click="$set('brand_id', {{ $brand->id }})">
                                                {{ $brand->name }}
                                            </a>
                                        </li>
                                    @endforeach

                                </ul>
                            </li>

                            <li class="ml-6 text-sm cursor-pointer menu-item menu-item-has-children parent">
                                {{-- limpiar filtros --}}
                                <a title="All products" wire:click="resetFilters">Todos los productos
                                    <i class="fa fa-angle-double-left" aria-hidden="true"></i>
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
                {{-- fin prueba filtros,-categorias, subcategoria, marca --}}

                <div class="grid grid-cols-1 text-black border border-black divide-gray-200 md:grid-cols-2">
                    {{-- opciones para visualizar  card de productos: listas o columnas --}}
                    <li class="p-3 cursor-pointer fas fa-border-all {{ $view == 'grid' ? 'text-gold' : '' }} "
                        wire:click="$set('view', 'grid')"></li>
                    <li class="p-3 cursor-pointer fas fa-th-list {{ $view == 'list' ? 'text-gold' : '' }} "
                        wire:click="$set('view', 'list')"></li>
                </div>

            </div>

        </div>{{-- end opciones --}}

        <div class="container mt-8">{{-- texto saludo --}}
            <div class="flex items-center justify-between block">
                @auth
                    <span class="flex text-xs text-center text-black font-light uppercase md:text-2xl ">
                        {{ Auth::user()->name }} ¡Bienvenido a tu espacio personalizado Versagge, Un lugar donde te sentirás como una estrella!
                    </span>
                @endauth

            </div>
        </div>

        <div
            class="grid px-4 mx-auto max-w-7xl sm:px-6 lg:px-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">

            {{-- todos los productos --}}
            <div class="py-6 md:order-2 md:col-span-4 lg:col-span-4">
                @if ($view == 'grid')
                    <ul class="grid grid-cols-1 gap-6 md:grid-cols-3 lg:grid-cols-4">


                        @forelse ($products as $product)
                            <div class="flex flex-col items-center justify-center h-full">
                                {{-- tarjeta que muestra informacion del producto --}}

                                <div
                                    class="p-2 transition-all duration-500 transform bg-white shadow-xl w- {{-- rounded-xl --}} hover:shadow-2xl hover:scale-105">

                                    @if ($product->images->count())
                                        <img class="{{-- object-fill --}}object-center w-64 h-64 {{-- rounded-t-md --}}"
                                            src="{{ Storage::url($product->images->first()->url) }}"
                                            alt="" />{{-- primera imagen del producto --}}
                                    @else
                                        <img class="object-contain w-64 h-64 rounded-full"
                                            src="https://img.icons8.com/fluency/64/000000/nothing-found.png"
                                            alt="nothing-found">
                                    @endif

                                    <div class="mt-4">{{-- detalles del producto, nombre, etc --}}
                                        <h1 class="text-base text-black uppercase">
                                            <a href="{{ route('products.show', $product) }}">
                                                {{ Str::limit($product->name, 20) }}
                                            </a>
                                        </h1>

                                        {{-- <a href="{{ route('vip-client') }}"
                                            class="flex items-center mt-2 text-xs font-semibold text-gray-700 "> Mega
                                            Oferta Clientes <svg class="ml-2 " xmlns="http://www.w3.org/2000/svg"
                                                x="0px" y="0px" width="30" height="30"
                                                viewBox="0 0 172 172" style=" fill:#000000;">
                                                <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1"
                                                    stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10"
                                                    stroke-dasharray="" stroke-dashoffset="0" font-family="none"
                                                    font-weight="none" font-size="none" text-anchor="none"
                                                    style="mix-blend-mode: normal">
                                                    <path d="M0,172v-172h172v172z" fill="none"></path>
                                                    <g>
                                                        <path
                                                            d="M163.9375,40.3125v91.375c0,5.93706 -4.81294,10.75 -10.75,10.75h-134.375c-1.52171,-0.00123 -3.02518,-0.33126 -4.4075,-0.9675c-3.0631,-1.37185 -5.3097,-4.09561 -6.07375,-7.36375c-0.17197,-0.79495 -0.26202,-1.60544 -0.26875,-2.41875v-91.375c0,-5.93706 4.81294,-10.75 10.75,-10.75h134.375c5.93706,0 10.75,4.81294 10.75,10.75z"
                                                            fill="#f1c40f"></path>
                                                        <path
                                                            d="M163.9375,40.3125v29.5625l-72.5625,72.5625h-40.3125l109.73063,-109.73062c2.0155,2.01774 3.14662,4.75369 3.14437,7.60563zM153.1875,29.5625l-112.875,112.875h-16.125l112.875,-112.875zM126.3125,29.5625l-111.9075,111.9075c-3.0631,-1.37185 -5.3097,-4.09561 -6.07375,-7.36375l104.54375,-104.54375z"
                                                            fill="#ffefb8"></path>
                                                        <path
                                                            d="M163.9375,131.6875v0c0,5.93706 -4.81294,10.75 -10.75,10.75h-134.375c-1.52171,-0.00123 -3.02518,-0.33126 -4.4075,-0.9675c-3.0631,-1.37185 -5.3097,-4.09561 -6.07375,-7.36375c-0.17197,-0.79495 -0.26202,-1.60544 -0.26875,-2.41875v-2.6875h153.1875c1.48427,0 2.6875,1.20323 2.6875,2.6875z"
                                                            fill="#f5c872"></path>
                                                        <path
                                                            d="M153.1875,26.875h-134.375c-7.42133,0 -13.4375,6.01617 -13.4375,13.4375v91.375c0,7.42133 6.01617,13.4375 13.4375,13.4375h134.375c7.42133,0 13.4375,-6.01617 13.4375,-13.4375v-91.375c0,-7.42133 -6.01617,-13.4375 -13.4375,-13.4375zM161.25,131.6875c0,4.4528 -3.6097,8.0625 -8.0625,8.0625h-134.375c-4.4528,0 -8.0625,-3.6097 -8.0625,-8.0625v-91.375c0,-4.4528 3.6097,-8.0625 8.0625,-8.0625h134.375c4.4528,0 8.0625,3.6097 8.0625,8.0625z"
                                                            fill="#8d6c9f"></path>
                                                        <path
                                                            d="M18.8125,123.625c-1.48427,0 -2.6875,1.20323 -2.6875,2.6875v5.375c0,1.48427 1.20323,2.6875 2.6875,2.6875c1.48427,0 2.6875,-1.20323 2.6875,-2.6875v-5.375c0,-1.48427 -1.20323,-2.6875 -2.6875,-2.6875zM32.25,123.625c-1.48427,0 -2.6875,1.20323 -2.6875,2.6875v5.375c0,1.48427 1.20323,2.6875 2.6875,2.6875c1.48427,0 2.6875,-1.20323 2.6875,-2.6875v-5.375c0,-1.48427 -1.20323,-2.6875 -2.6875,-2.6875zM45.6875,123.625c-1.48427,0 -2.6875,1.20323 -2.6875,2.6875v5.375c0,1.48427 1.20323,2.6875 2.6875,2.6875c1.48427,0 2.6875,-1.20323 2.6875,-2.6875v-5.375c0,-1.48427 -1.20323,-2.6875 -2.6875,-2.6875zM59.125,123.625c-1.48427,0 -2.6875,1.20323 -2.6875,2.6875v5.375c0,1.48427 1.20323,2.6875 2.6875,2.6875c1.48427,0 2.6875,-1.20323 2.6875,-2.6875v-5.375c0,-1.48427 -1.20323,-2.6875 -2.6875,-2.6875zM72.5625,123.625c-1.48427,0 -2.6875,1.20323 -2.6875,2.6875v5.375c0,1.48427 1.20323,2.6875 2.6875,2.6875c1.48427,0 2.6875,-1.20323 2.6875,-2.6875v-5.375c0,-1.48427 -1.20323,-2.6875 -2.6875,-2.6875zM86,123.625c-1.48427,0 -2.6875,1.20323 -2.6875,2.6875v5.375c0,1.48427 1.20323,2.6875 2.6875,2.6875c1.48427,0 2.6875,-1.20323 2.6875,-2.6875v-5.375c0,-1.48427 -1.20323,-2.6875 -2.6875,-2.6875zM99.4375,123.625c-1.48427,0 -2.6875,1.20323 -2.6875,2.6875v5.375c0,1.48427 1.20323,2.6875 2.6875,2.6875c1.48427,0 2.6875,-1.20323 2.6875,-2.6875v-5.375c0,-1.48427 -1.20323,-2.6875 -2.6875,-2.6875zM112.875,123.625c-1.48427,0 -2.6875,1.20323 -2.6875,2.6875v5.375c0,1.48427 1.20323,2.6875 2.6875,2.6875c1.48427,0 2.6875,-1.20323 2.6875,-2.6875v-5.375c0,-1.48427 -1.20323,-2.6875 -2.6875,-2.6875zM126.3125,123.625c-1.48427,0 -2.6875,1.20323 -2.6875,2.6875v5.375c0,1.48427 1.20323,2.6875 2.6875,2.6875c1.48427,0 2.6875,-1.20323 2.6875,-2.6875v-5.375c0,-1.48427 -1.20323,-2.6875 -2.6875,-2.6875zM139.75,123.625c-1.48427,0 -2.6875,1.20323 -2.6875,2.6875v5.375c0,1.48427 1.20323,2.6875 2.6875,2.6875c1.48427,0 2.6875,-1.20323 2.6875,-2.6875v-5.375c0,-1.48427 -1.20323,-2.6875 -2.6875,-2.6875zM153.1875,123.625c-1.48427,0 -2.6875,1.20323 -2.6875,2.6875v5.375c0,1.48427 1.20323,2.6875 2.6875,2.6875c1.48427,0 2.6875,-1.20323 2.6875,-2.6875v-5.375c0,-1.48427 -1.20323,-2.6875 -2.6875,-2.6875zM76.11,59.25938c-0.67708,-0.22992 -1.41787,-0.18053 -2.05844,0.13723c-0.64057,0.31776 -1.12809,0.8777 -1.35469,1.55589l-13.57188,40.7425l-13.57187,-40.7425c-0.46754,-1.41005 -1.98964,-2.17411 -3.39969,-1.70656c-1.41005,0.46754 -2.17411,1.98964 -1.70656,3.39969l16.125,48.375v0.18812l0.16125,0.3225c0.10482,0.18446 0.23112,0.35586 0.37625,0.51062l0.215,0.215c0.22592,0.1831 0.48005,0.32832 0.7525,0.43v0c0.54139,0.17653 1.12486,0.17653 1.66625,0v0c0.27245,-0.10168 0.52658,-0.2469 0.7525,-0.43l0.215,-0.215c0.14513,-0.15476 0.27143,-0.32616 0.37625,-0.51062l0.16125,-0.3225v-0.18812l16.125,-48.375c0.51411,-1.2856 -0.03265,-2.7514 -1.26312,-3.38625zM88.6875,59.125c-1.48427,0 -2.6875,1.20323 -2.6875,2.6875v48.375c0,1.48427 1.20323,2.6875 2.6875,2.6875c1.48427,0 2.6875,-1.20323 2.6875,-2.6875v-48.375c0,-1.48427 -1.20323,-2.6875 -2.6875,-2.6875zM120.9375,59.125h-16.125c-1.48427,0 -2.6875,1.20323 -2.6875,2.6875v48.375c0,1.48427 1.20323,2.6875 2.6875,2.6875c1.48427,0 2.6875,-1.20323 2.6875,-2.6875v-18.8125h13.4375c7.42133,0 13.4375,-6.01617 13.4375,-13.4375v-5.375c0,-7.42133 -6.01617,-13.4375 -13.4375,-13.4375zM129,77.9375c0,4.4528 -3.6097,8.0625 -8.0625,8.0625h-13.4375v-21.5h13.4375c4.4528,0 8.0625,3.6097 8.0625,8.0625z"
                                                            fill="#8d6c9f"></path>
                                                        <path
                                                            d="M135.28875,37.625l-3.3325,6.07375l-6.10063,3.3325l6.10063,3.3325l3.3325,6.07375l3.30562,-6.07375l6.10063,-3.3325l-6.10063,-3.3325zM30.66438,51.0625l-2.28437,4.1925l-4.1925,2.31125l4.1925,2.28437l2.28437,4.21937l2.31125,-4.21937l4.1925,-2.28437l-4.1925,-2.31125zM127.6025,101.31875l-1.55875,2.87562l-2.87563,1.55875l2.87563,1.58562l1.55875,2.84875l1.55875,-2.84875l2.87563,-1.58562l-2.87563,-1.55875z"
                                                            fill="#fff8f8"></path>
                                                    </g>
                                                </g>
                                            </svg>
                                        </a> --}}{{-- muestra el precio vip o con descuento icono obtenido de https://icons8.com/ --}}

                                        <div class="flex justify-between pl-4 pr-2 mt-4 mb-2">{{-- precio real del producto y boton que redirecciona a la vista del producto --}}

                                            {{-- <button class="block text-xl font-semibold text-gray-700 cursor-auto">
                                                ${{ $product->price }}
                                            </button>  --}}{{-- cambiar variable por $price --}}

                                            <button
                                                class="block w-full px-4 py-2 {{-- ml-2 --}} text-sm font-semibold text-white uppercase transition duration-300 {{-- rounded-lg --}} shadow bg-gold hover:text-gray-900 hover:shadow-md">
                                                <a href="{{ route('products.show', $product) }}">
                                                    Más detalles
                                                </a>
                                            </button>

                                        </div>
                                    </div>

                                </div>

                            </div>
                        @empty
                            <li class="md:col-span-2 lg:col-span-4">
                                <div class="relative flex items-center justify-start px-4 py-3 text-red-700 bg-red-100 border border-red-400 rounded"
                                    role="alert">
                                    <strong class="items-center font-bold text-center"> <img class="mr-2"
                                            src="https://img.icons8.com/dusk/64/000000/sad-ghost.png" /> Upss!</strong>
                                    <span class="flex ml-2 font-semibold">Se completo la busqueda y no se encontro
                                        ningún producto con esa especificacíon.</span>
                                </div>
                            </li>
                        @endforelse

                    </ul>
                @else
                    {{-- vista de productos en lista, falta mejorar diseño --}}

                    <ul>
                        @forelse ($products as $product)
                            <x-components.product-list :product="$product" /> {{-- este componente se encuenta en resources/views/components/components --}}

                        @empty

                            <div class="relative flex items-center justify-start px-4 py-3 text-red-700 bg-red-100 border border-red-400 rounded"
                                role="alert">

                                <strong class="items-center font-bold text-center"> <img class="mr-2"
                                        src="https://img.icons8.com/dusk/64/000000/sad-ghost.png" /> Upss!</strong>
                                <span class="flex ml-2 font-semibold">¡Lo sentimos! No encontramos ningún producto con esa especificación.</span>

                            </div>
                        @endforelse
                    </ul>

                @endif

                <div class="py-4"> {{-- links de paginacion --}}
                    {{ $products->links() }}
                </div>

            </div>

        </div>

    </section>

</div>
