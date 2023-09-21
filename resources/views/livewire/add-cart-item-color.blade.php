<div x-data>{{-- Añadir items al shopping-card --}}
    <p class="text-xl font-extralight text-black">Color:</p>

    <select wire:model="color_id" class="w-full form-control">
        <option value="" selected disabled>Seleccionar un color</option>
        @foreach ($colors as $color)
            <option value="{{$color->id}}">{{ __($color->name) }}</option>
        @endforeach
    </select>

    <p class="my-4 font-extralight text-black">
        <span class="text-lg">Stock disponible:</span>
        @if ($quantity)
            {{$quantity}}
        @else
            {{$product->stock}}
        @endif
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
                x-bind:disabled="!$wire.quantity"
                color="black" 
                class="w-full"
                wire:click="addItem"
                wire:loading.attr="disabled"
                wire:target="addItem">
                Añadir a su cesta de compras
            </x-components.button>
        </div>
    </div>
</div>
