<div x-data>{{--  Añadir items al carrito de compra --}}
    <p class="mb-4 font-extralight text-black">
        <span class="text-lg font-semibold">Stock disponible:</span> {{$quantity}}
    </p>

    <div class="flex">
        <div class="mr-4">
            <x-jet-secondary-button 
                disabled
                x-bind:disabled="$wire.qty <= 1"
                wire:loading.attr="disabled"
                wire:target="decrement"
                wire:click="decrement">
                -
            </x-jet-secondary-button>

            <span class="mx-2 font-extralight text-black">{{$qty}}</span>

            <x-jet-secondary-button 
                x-bind:disabled="$wire.qty >= $wire.quantity"
                wire:loading.attr="disabled"
                wire:target="increment"
                wire:click="increment">
                +
            </x-jet-secondary-button>
        </div>

        <div class="flex-1">
            <x-components.button
                x-bind:disabled="$wire.qty > $wire.quantity"
                class="w-full"
                color="black" 
                wire:click="addItem"
                wire:loading.attr="disabled"
                wire:target="addItem">
                Añadir a su cesta de compras
            </x-components.button>
        </div>
    </div>
</div>
