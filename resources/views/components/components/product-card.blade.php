@props(['product']){{-- Card Productos --}}


<div class="flex flex-col items-center justify-center h-full">{{-- tarjeta que muestra informacion del producto --}}

    <div
        class="p-2 transition-all duration-500 transform bg-blue-500 shadow-xl w- {{-- rounded-xl --}} hover:shadow-2xl hover:scale-105">
        @if ($product->images->count())
            <img style="object-fit: fill;"class="{{-- object-fill  --}}object-center w-64 h-64 {{-- rounded-t-md --}}"
                src="{{ Storage::url($product->images->first()->url) }}" alt="" />{{-- primera imagen del producto --}}
          
        @else
            <img class="object-contain w-64 h-64 {{-- rounded-full --}}"
                src="https://img.icons8.com/fluency/64/000000/nothing-found.png"
                alt="nothing-found">
        @endif

        <div class="mt-4">{{-- detalles del producto, nombre, etc --}}
            <h1 class="text-base text-black uppercase">
                <a href="{{ route('products.show', $product) }}">
                    {{ Str::limit($product->name, 20) }}
                </a>
            </h1>            

            <div class="flex justify-between pl-2 pr-2 mt-4 mb-2">{{-- precio real del producto y boton que redirecciona a la vista del producto --}}

                {{-- <button class="block text-xl font-semibold text-gray-700 cursor-auto">
                    ${{ $product->realprice }}
                </button> --}} {{-- PRECio cambiar variable por $realprice --}}

                <button
                    class=" w-full block py-2 text-sm font-semibold text-white transition duration-300 rounded-lg shadow bg-gold hover:text-gray-700 hover:shadow-md">
                    <a href="{{ route('products.show', $product) }}">
                        Más detalles
                    </a>
                </button>
            </div>
        </div>

    </div>

</div>
