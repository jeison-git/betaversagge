<x-home-layout>

    @if (session('success'))
        <h1>{{ session('success') }}</h1>
    @endif

    @error('unsubscribed')
        <div class="mt-4 text-center invalid-feedback d-block" role="alert">
            <strong>{{ $message }}</strong>
        </div>
    @enderror

    {{-- inicio de Layouts ojo modificar para que solo sea uno --}}
    <section class="container grid grid-cols-1 gap-2 mt-8 cursor-default md:p-4 md:grid-cols-4 md:gap-6">

        {{-- guiarse separacion de los layout  --}}

        <div> {{-- primer layouts  derecho contiene productos definidos en el controlador welcome $twohomes  --}}

        </div> {{-- end  --}}

        <div class="col-span-2">{{-- Los controles deslizantes que muestran los items de la variable $banners // la publicidad  --}}

            <div class="flexslider"> {{--  FlexSlider 2  responsive slider  es utilizado en esta seccion  --}}
                <ul class="slides">
                    @foreach ($banners as $banner)
                        <li>
                            <img src=" {{ Storage::url($banner->image) }}" />
                        </li>
                    @endforeach

                </ul>
            </div> {{-- end FlexSlider - --}}

        </div>

        <div class="{{-- bg-orange-500 --}}">{{-- tercer layouts  izquierdo contiene productos definidos en el controlador welcome $homes, asi como panel de iniciar sesion --}}

        </div> {{-- end  primer layouts izquierdo  --}}

    </section> {{-- aca terminan los layouts --}}

    {{-- Productos todos los ultimos agregados - --}}


    <section class="container ">

        <div class="container">{{-- identifica la seccion de categorias --}}
            <div class="flex items-center justify-center block">

                <span class="flex text-center text-base font-semibold text-black uppercase md:text-2xl ">
                    Nuestros artículos DESTACADOS
                </span>

            </div>
        </div>

        <div class="container grid grid-cols-1 gap-2 cursor-default md:p-4 md:grid-cols-4 md:gap-6">

            {{-- guiarse separacion de los layout Productos  --}}

            <div class="col-span-2">{{-- Los controles deslizantes que muestran los items de la variable $banners // la publicidad  --}}

                <div class="flexslider"> {{--  FlexSlider 2  responsive slider  es utilizado en esta seccion  --}}
                    <ul class="slides">
                        @foreach ($products as $product)
                            <li>
                                <a href="{{ route('products.show', $product) }}">
                                    <img class="hover:shadow-md transition-all duration-500 transform w-  hover:scale-105"
                                        src="{{ Storage::url($product->images->first()->url) }}" />

                                    <p
                                        class="flex-caption mt-2 text-center text-xs md:text-lg text-black uppercase  font-semibold transition duration-300 hover:text-gold hover:underline">
                                        {{ Str::limit($product->name, 20) }}</p>
                                </a>
                            </li>
                        @endforeach

                    </ul>
                </div> {{-- end FlexSlider - --}}

            </div>

            <div>

            </div>

            <div>

            </div>

        </div>

    </section>
    {{-- identifica la seccion de categorias --}}
    <section class="container mb-16 min-h-screen">

        <div class="container">{{-- identifica la seccion de categorias --}}
            <div class="flex items-center justify-center block">

                <span class="flex text-base font-semibold text-center text-black uppercase md:text-2xl ">
                    Explora nuestras colecciones
                </span>

            </div>
        </div>
        {{-- este card se encuentra en resources/views/components/components --}}
        <div class="container grid grid-cols-1 gap-2 cursor-default md:p-4 md:grid-cols-4 md:gap-6">

            {{-- guiarse separacion de los layout Productos  --}}

            <div>

            </div>

            <div>

            </div>

            <div class="col-span-2">{{-- Los controles deslizantes que muestran los items de la variable $category // la categorias  --}}
                <div class="flexslider">
                    <ul class="slides">
                        @foreach ($categories as $category)
                            <li>
                                <a href="{{ route('categories.show', $category) }}" title="Heading Link">
                                    <img class="hover:shadow-md transition-all duration-500 transform w-  hover:scale-105"
                                        src="{{ Storage::url($category->image) }}" alt="{{ $category->name }}" />

                                    <p
                                        class="flex-caption mt-2 text-center text-xs md:text-lg text-black uppercase  font-semibold transition duration-300 hover:text-gold hover:underline">
                                        {{ Str::limit($product->name, 20) }}</p>
                                </a>
                            </li>
                        @endforeach

                    </ul>
                </div> {{-- end FlexSlider - --}}
            </div>

        </div>

    </section>
    <!-- component texto aumenta tus ganacias -->
    {{-- comercios  - --}}
    <section class="container mt-16 {{-- h-80 --}} {{-- hidden md:block --}} ">

        <div class=" mb-12">{{-- identifica la seccion de categorias --}}
            <div class="flex items-center justify-center block">

                <span class="flex text-base font-semibold text-center text-black uppercase md:text-2xl ">
                    "Tu estilo, tu momento, ¡nosotros lo hacemos posible!"
                </span>

            </div>
        </div>
        {{-- prubas imagenes logo --}}

        <div class="flex items-center justify-between p-3 mt-4 {{-- rounded-xl --}}">

            <div class="flex items-center  bg-white {{-- shadow-xl --}}">

                <figure class="w-auto h-full"> <img
                        class="object-center object-fill{{--  h-48  --}}{{-- rounded-lg --}}"
                        src="{{ asset('img/versaggelogouno.svg') }}" /></figure>
            </div>

            <div class="flex items-center   bg-white {{-- shadow-xl --}}">
                <figure class="w-auto h-full"> <img
                        class="object-center object-fill {{-- h-48  --}}{{-- rounded-lg --}}"
                        src="{{ asset('img/lsavage500.jpg') }}" /></figure>
            </div>

        </div>

        <div class="grid px-4 mx-auto max-w-7xl sm:px-6 lg:px-8 sm:grid-cols-2 {{-- md:grid-cols-4 --}} gap-x-6 gap-y-8">

            @foreach ($claims as $claim)
                <x-components.commerce-card :claim="$claim" />{{-- este card se encuentra en resources/views/components/components --}}
            @endforeach

        </div>
    </section>

    {{-- Script para los slider bar- --}}
    @push('script')
        <script>
            $(document).ready(function() {
                $('.flexslider').flexslider({
                    animation: "slide",
                });
            });
        </script>
    @endpush

</x-home-layout>
