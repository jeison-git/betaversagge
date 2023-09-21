<x-app-layout>

    <header class=" bg-white shadow">
        <div class=" px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex items-center {{-- justify-between --}}">

                <a href="{{ URL::previous() }}" class="mr-6 flex items-center">
                    {{-- <img src="https://img.icons8.com/dusk/25/000000/circled-left-2.png" /> --}}
                    <i class="fa fa-arrow-left text-sm mr-2" aria-hidden="true"> volver </i>
                </a>

                <h1 class="flex items-center font-extralight leading-tight text-black {{-- uppercase --}} md:text-2xl">

                    Detalles del Producto

                </h1>

            </div>
        </div>
    </header>

    <div class="container py-8">{{-- Mostras detalles del producto y opciones de agregar al shoping card --}}

        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 md:gap-6">

            <div>{{-- Slider de imagen y descripcion del producto --}}
                <div class="flexslider">
                    <ul class="slides">
                        @foreach ($product->images as $image)
                            <li data-thumb=" {{ Storage::url($image->url) }}">
                                <img src=" {{ Storage::url($image->url) }}" />
                            </li>
                        @endforeach
                    </ul>
                </div>

            </div>

            <div >{{-- Opciones para agregar al carro de compra --}}
                <h1 class="mb-2 text-center text-xl font-semibold text-black uppercase">{{ $product->name }}</h1>
                <p class="my-4  text-center text-2xl font-semibold text-black">US ${{ $product->price }}</p>
                <div class="flex items-center justify-start"> {{-- div texto marca y reseñas --}}
                    <p class="text-black">Marca:
                        <a class="underline capitalize hover:text-orange-500"
                            {{-- href="" --}}>{{ $product->brand->name }}</a>
                    </p>
                    <p class="mx-6 text-black">5 <i class="text-sm text-yellow-400 fas fa-star"></i></p>
                    <a class="text-orange-500 underline hover:text-orange-600" {{-- href="" --}}></a>
                </div>

                {{-- precio vip  del  producto --}}

                {{-- div fecha de entrega del producto --}}

                <div x-data="{ open: false }" class="py-2 bg-white shadow-lg text-justify text-black ">
                    {{-- <div class="flex items-center p-2">
                        <span class="flex items-center justify-center w-10 h-10 rounded-full bg-greenLime-600">
                            <i class="text-xs text-white fas fa-truck"></i>
                        </span>

                        <div class="ml-4">
                            <p class="text-center text-greenLime-600">Se hace envíos a todo el país</p>
                            <p class="text-sm font-semibold text-center">Recibelo antes del
                                {{ Date::now()->addDay(1)->locale('es')->format('l j F') }}</p>
                        </div>
                    </div>  --}}
                    <header x-on:click="open= !open"  class="mx-4">

                        <div  class="flex items-center justify-between">
                            <h2 class="text-lg py-2  font-semibold uppercase">DETALLES DEL
                                PRODUCTO</h2>
                            <i class="fa fa-sort" aria-hidden="true"></i>
                        </div>

                    </header>
                     
                        <ul x-show="open" class="mx-4">
                            <p  class="text-base">{!! $product->description !!}</p>
                        </ul>  

                </div>

                @if ($product->subcategory->size)
                    {{-- componentes opciones de stock, color, talla enlace al shopingcard --}}
                    <div class="mt-2">
                        @livewire('add-cart-item-size', ['product' => $product])
                    </div>
                @elseif($product->subcategory->color)
                    @livewire('add-cart-item-color', ['product' => $product])
                @else
                    @livewire('add-cart-item', ['product' => $product])
                @endif

            </div>

        </div>

        <section class="px-6 py-4 mx-auto cursor-default ">{{-- productos similares --}}

            <div class="mb-8">{{-- texto productos similares --}}
                <div class="flex items-center justify-between block">

                    <span class="flex text-xs font-semibold  text-center text-black uppercase md:text-xl ">
                        Seguir Explorando
                    </span>

                    <div class="flex-1 items-center w-full h-2 mx-6 rounded-full">
                        <hr class="bg-black">
                    </div>

                </div>
            </div>

            <div class="grid gap-6 mb-8 md:grid-cols-2 lg:grid-cols-4">
                @foreach ($similares as $similar)
                    <div class="flex flex-col items-center justify-center h-full">
                        <a href="{{ route('products.show', $similar) }}">
                            <div
                                class="p-2 transition-all duration-500 transform bg-white shadow-xl w- hover:shadow-2xl hover:scale-105">

                                @if ($similar->images->count())
                                    <img class="object-fill object-center w-full h-48 {{-- rounded-t-md --}}"
                                        src="{{ Storage::url($similar->images->first()->url ?? null) }}"
                                        alt="similares">
                                @else
                                    <img class="object-contain w-48 h-48 rounded-full"
                                        src="https://img.icons8.com/fluency/48/000000/nothing-found.png"
                                        alt="nothing-found">
                                @endif

                                <div class="mt-4">

                                    <h1 class="text-base font-extralight text-black uppercase hover:text-gold">
                                        {{ Str::limit($similar->name, 20) }}
                                    </h1>
                                    {{-- <p class="text-sm font-extralight text-black hover:text-gold">UD ${{ $similar->price }}</p> --}}
                                </div>
                            </div>

                        </a>
                    </div>
                @endforeach
            </div>

        </section>

    </div>

    @push('script')
        <script>
            $(document).ready(function() {
                $('.flexslider').flexslider({
                    animation: "slide",
                    controlNav: "thumbnails"
                });
            });
        </script>
    @endpush

</x-app-layout>
