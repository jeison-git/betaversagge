<div>
    {{-- barra de opcion para visualizar los productos por lista o columnas --}}
    <div class="bg-white {{-- rounded-lg --}} shadow-lg">

        <div class="flex items-center justify-between px-6 py-2">
            <h1 class="font-semibold text-black uppercase">{{ $category->name }}</h1>

            <div class="grid grid-cols-2 text-black border border-black divide-gray-200">
                <li class="p-3 cursor-pointer fas fa-border-all {{ $view == 'grid' ? 'text-gold' : '' }} "
                    wire:click="$set('view', 'grid')"></li>
                <li class="p-3 cursor-pointer fas fa-th-list {{ $view == 'list' ? 'text-gold' : '' }} "
                    wire:click="$set('view', 'list')"></li>
            </div>

        </div>

    </div>

    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5">

        <aside>{{-- filtros de busquedas de la categoria selecionada subcategorias, marcas --}}

            <div x-data="{ open: false }">{{-- header filtros Subcategorias --}}
                <header
                    class="flex items-center justify-between px-4 py-2 mt-8 {{-- rounded  --}}shadow-lg cursor-pointer bg-gray-50"
                    x-on:click="open= !open">

                    <div class="text-xs font-semibold text-black uppercase md:text-sm">

                        <span class="flex items-center mr-2">
                            <img class="mr-2" src="https://img.icons8.com/dusk/25/000000/uncheck-all.png" />
                            Subcategorías
                        </span>

                    </div>
                    <a class="items-center ml-2 font-semibold hover:text-gold text-black hover:underline"><i
                            class="fa fa-angle-down" aria-hidden="true"></i>
                    </a>
                </header>

                <ul class="divide-y divide-gray-200" x-show="open">
                    @foreach ($category->subcategories as $subcategory)
                        <li class="py-2 ml-4 text-sm">
                            <a class="capitalize cursor-pointer hover:text-gold {{ $subcategoria == $subcategory->name ? 'text-gold font-semibold' : '' }}"
                                wire:click="$set('subcategoria', '{{ $subcategory->name }}')">
                                {{ $subcategory->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div x-data="{ open: false }">{{-- header filtros marcas --}}

                <header
                    class="flex items-center justify-between px-4 py-2 mt-2 mb-2 {{-- rounded --}} shadow-lg cursor-pointer bg-gray-50"
                    x-on:click="open= !open">{{-- Marcas --}}

                    <div class="text-xs font-semibold text-black uppercase md:text-sm">

                        <span class="flex items-center mr-2">
                            <img class="mr-2"
                                src="https://img.icons8.com/dusk/25/000000/sales-channels.png" /> Marcas
                        </span>

                    </div>
                    <a class="items-center ml-2 font-semibold hover:text-gold text-black hover:underline"><i
                            class="fa fa-angle-down" aria-hidden="true"></i>
                    </a>
                </header>

                <ul class="divide-y divide-gray-200" x-show="open">
                    @foreach ($category->brands as $brand)
                        <li class="py-2 ml-4 text-sm">
                            <a class="capitalize cursor-pointer hover:text-gold {{ $marca == $brand->name ? 'text-gold font-semibold' : '' }}"
                                wire:click="$set('marca', '{{ $brand->name }}')">
                                {{ $brand->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>

            </div>

            <x-components.button class="items-center px-12 mt-4" wire:click="limpiar">
                Eliminar filtros
            </x-components.button>

        </aside>{{-- end filtros --}}

        <div class="py-6 md:col-span-2 lg:col-span-4">{{-- tarjeta que muestra los detalles del product de la categoria seleccinada --}}
            @if ($view == 'grid')
                <ul class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 ">
                    @forelse ($products as $product)

                        <div class="flex flex-col items-center justify-center h-full mb-4 {{-- bg-gray-100 --}}">
                            {{-- tarjeta que muestra informacion del producto --}}

                            <div
                                class="p-2 transition-all duration-500 transform bg-white shadow-xl w- {{-- rounded-xl --}} hover:shadow-2xl">

                                @if ($product->images->count())
                                    <img class="{{-- object-fill --}}object-center w-full h-64 {{-- rounded-t-md --}}"
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

                                    <div class="flex justify-between {{-- pl-4 pr-2 --}} mt-4 mb-2">{{-- precio real del producto y boton que redirecciona a la vista del producto --}}

                                        {{-- cambiar variable por $realprice --}}
                                        {{-- <button class="block text-xl font-semibold text-gray-700 cursor-auto">
                                            ${{ $product->realprice }}
                                        </button> --}}

                                        <button
                                            class="block w-full px-2 py-2 text-sm font-semibold text-white transition duration-300 {{-- rounded-lg --}} shadow bg-gold hover:text-gray-700 hover:shadow-md">
                                            <a href="{{ route('products.show', $product) }}">
                                                Más detalles
                                            </a>
                                        </button>
                                    </div>
                                </div>

                            </div>

                        </div>

                    @empty
                        <li class="md:col-span-2 lg:col-span-4">{{-- mensaje de notificacion que no se encontro datos --}}
                            <div class="relative flex items-center justify-start px-4 py-3 text-red-700 bg-red-100 border border-red-400 rounded"
                                role="alert">
                                <strong class="items-center font-bold text-center"> <img class="mr-2"
                                        src="https://img.icons8.com/dusk/64/000000/sad-ghost.png" /> Upss!</strong>
                                <span class="flex ml-2 font-semibold">¡Lo sentimos! No encontramos ningún producto con esa especificación.</span> 
                            </div>
                        </li>

                    @endforelse
                </ul>

            @else
                <ul>{{-- tarjeta que muestra los productos en lista --}}
                    @forelse ($products as $product)

                        <x-components.product-list :product="$product" /> {{-- este componente se encuenta en resources/views/components/components --}}

                    @empty

                        <div class="relative flex items-center justify-start px-4 py-3 text-red-700 bg-red-100 border border-red-400 rounded"
                            role="alert">

                            <strong class="items-center font-bold text-center"> <img class="mr-2"
                                    src="https://img.icons8.com/dusk/64/000000/sad-ghost.png" /> Upss!</strong>
                            <span class="flex ml-2 font-semibold">Se completo la busqueda y no se encontro ningún
                                producto con esa especificacíon.</span>

                        </div>

                    @endforelse

                </ul>

            @endif

            <div class="py-4">
                {{ $products->links() }}
            </div>
        </div>

    </div>

</div>
