<section>
    <h1 class="text-2xl font-bold text-balck">REFERENCIAS PERSONALES</h1>
    <hr class="mt-2 mb-6">
    
    @foreach ($employment->references as $item)

        <article class="mb-4 card">
            <div class="bg-gray-200 card-body">

            @if ($reference->id == $item->id)

                <form wire:submit.prevent="update">
                    <input wire:model="reference.name" class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 {{-- rounded-md --}} shadow-sm form-input focus:outline-none focus:ring-indigo-500 focus:border-blue-500 sm:text-sm">
                    @error('reference.name')
                        <span class="text-xs text-red-500">{{$message}}</span>
                    @enderror                
                </form>
                
            @else
                <header class="flex justify-between">
                    <h1>{{$item->name}}</h1>
                    <div>
                        <i wire:click="edit({{$item}})" class="text-blue-500 cursor-pointer fas fa-edit"></i>
                        <i wire:click="destroy({{$item}})" class="text-red-500 cursor-pointer fas fa-trash"></i>
                    </div>
                </header>
                
            @endif                

            </div>
        </article>

    @endforeach

    <article class="card">
        <div class="bg-gray-200 card-body">
            <form wire:submit.prevent="store">
                <input wire:model="name" class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 {{-- rounded-md --}} shadow-sm form-input focus:outline-none focus:ring-indigo-500 focus:border-blue-500 sm:text-sm" placeholder="Agregar referencias ejem.: Nombre, Teléfono, etc ...">
                
                @error('name')
                    <span class="text-xs text-red-500">{{$message}}</span>                    
                @enderror

                <div class="flex justify-end mt-2">
                    {{-- <button type="submit" class="btn btn-primary">Agregar referencias</button> --}}
                    <x-jet-button class="ml-2" type="submit">Agregar referencia</x-jet-button>
                </div>
            </form>

        </div>

    </article>
</section>
