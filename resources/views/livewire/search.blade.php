<div class="relative flex-1" x-data>{{-- Componente Busqueda de productos en tiempo real --}} 

   
    <form x-data="{ showInput: false }" action="{{ route('search') }}" autocomplete="off">

        <button @mouseenter="showInput = true"
            class="absolute top-0 left-0  flex items-center justify-center  w-12 h-full {{-- bg-orange-500 --}}  {{-- rounded-r-md --}} ">
            <x-components.search size="35" color="white" />
        </button>

        <x-jet-input x-show="showInput" @click.away="showInput = false" name="name" wire:model="search" type="text"
            class=" w-full text-center" />

    </form>{{--  fin input de busqueda --}}    

    <div class="absolute z-50 hidden w-full mt-1" :class="{ 'hidden': !$wire.open }" @click.away="$wire.open = false">
        <div class="bg-white {{-- rounded-lg --}} shadow-lg">
            <div class="px-4 py-3 space-y-1">
                @forelse ($products as $product)
                    <a href="{{ route('products.show', $product) }}" class="flex">
                        <img class="object-cover w-16 h-12" src="{{ Storage::url($product->images->first()->url) }}"
                            alt="">
                        <div class="ml-4 text-black">
                            <p class="text-lg font-extralight leading-5">{{ $product->name }}</p>
                            <p>Categoria: {{ $product->subcategory->category->name }}</p>
                        </div>
                    </a>
                @empty
                    <p class="text-lg  justify-center leading-5">
                        ¡Lo sentimos! No encontramos ninguna coincidencia.
                    </p>
                @endforelse
            </div>
        </div>
    </div>
</div>
