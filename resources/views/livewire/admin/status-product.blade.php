<div class="p-6 mb-4 bg-white rounded-lg shadow-xl"> {{-- Componente estado del producto borrador o publicado --}}
    <p class="mb-2 text-2xl font-semibold text-center">Obtener el estado del producto</p>

    <div class="flex">
        <label class="mr-6">
            <input wire:model.defer="status" type="radio" name="status" value="1">
            Cambiar el estado del producto a "borrador"
        </label>
        <label>
            <input wire:model.defer="status" type="radio" name="status" value="2">
            Cambiar el estado del producto a "publicado"
        </label>
    </div>

    <div class="flex items-center justify-end">

        <x-jet-action-message class="mr-3" on="saved">
            Actualizado
        </x-jet-action-message>

        <x-jet-button wire:click="save"
            wire:loading.attr="disabled"
            wire:target="save">
            Actualizar
        </x-jet-button>
    </div>
</div>
