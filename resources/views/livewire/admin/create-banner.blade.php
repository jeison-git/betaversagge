<div>
    <div class="container">
        <x-jet-form-section submit="save" class="mb-6">
            <x-slot name="title">
                Añadir publicidad
            </x-slot>

            <x-slot name="description">
                Para añadir un banner o imagen a su tienda Versagge, tenga en cuenta las siguientes recomendaciones:
                <br>

                * Al agregar una imagen, la misma puede tener los siguientes &nbsp;&nbsp;&nbsp;formatos: jpeg, png, jpg,
                gif, svg. <br>
                * El tamaño de la imagen no debe superar los &nbsp;&nbsp;&nbsp;2048 megabytes (2MB). <br>
                * Todas las imágenes deben tener las mismas dimensiones.&nbsp;&nbsp;&nbsp;{{-- posean las mismas
                dimesiones. --}} <br>
                * Se recomienda que las dimensiones de las imágenes sean &nbsp;&nbsp;&nbsp; de 640 x 480 píxeles.<br>
                * La dimensiones máximas aceptadas en este registro son &nbsp;&nbsp;&nbsp;640px * 480px. <br>
                * Antes de añadir otro registro, actualice la página.

            </x-slot>

            <x-slot name="form">
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label>
                        Titulo
                    </x-jet-label>

                    <x-jet-input wire:model.defer="createForm.title" type="text" class="w-full mt-1" />

                    <x-jet-input-error for="createForm.title" />
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label>
                        ¿A qué empresa o marca pertenece esta publicidad?
                    </x-jet-label>

                    <x-jet-input wire:model.defer="createForm.owner" type="text" class="w-full mt-1" />
                    <x-jet-input-error for="createForm.owner" />
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label>
                        ¿Desea establecer un límite de tiempo para esta publicidad?
                    </x-jet-label>

                    <input wire:model.defer="createForm.finished_at" type="datetime-local"
                        class="w-full mt-1 form-control">
                    <x-jet-input-error for="createForm.finished_at" />
                </div>

                <div class="col-span-6 text-xs sm:col-span-4">
                    <x-jet-label>
                        Imagen
                    </x-jet-label>

                    <input wire:model="createForm.image" accept="image/*" type="file" class="mt-1" name=""
                        id="{{ $rand ?? null }}">
                    <x-jet-input-error for="createForm.image" />
                </div>

            </x-slot>

            <x-slot name="actions">

                <x-jet-action-message class="mr-3" on="saved">
                    Publicidad agregada
                </x-jet-action-message>

                <x-jet-button wire:loading.attr="disabled">
                    Agregar
                </x-jet-button>
            </x-slot>
        </x-jet-form-section>

        <x-jet-action-section>
            <x-slot name="title">
                Lista de publícaciones
            </x-slot>

            <x-slot name="description">
                &nbsp;Aquí encontrará todos los banner o publicaciones agregados
            </x-slot>

            <x-slot name="content">

                <table class="text-xs text-gray-600">
                    <thead class="border-b border-gray-300">
                        <tr class="text-left">
                            <th class="w-full py-2">Titulo&nbsp;-&nbsp;Vencimiento</th>
                            <th class="py-2">Acción</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-300 cursor-default">
                        @foreach ($banners as $banner)
                            <tr>
                                <td class="py-2">

                                    <span class="text-xs uppercase hover:text-blue-600">
                                        {{ $banner->title }}
                                    </span>

                                    <span class="ml-1 mr-1 text-xs hover:text-red-600">
                                        Vence&nbsp;{{ $banner->finished_at ? $banner->finished_at->diffForHumans() : 'Sin límite de tiempo' }}
                                    </span>

                                </td>

                                <td class="py-2">
                                    <div class="flex divide-x divide-gray-300">
                                        <a class="pr-2 cursor-pointer hover:text-blue-600"
                                            wire:click="edit('{{ $banner->id }}')">Editar</a>
                                        <a class="pl-2 cursor-pointer hover:text-red-600"
                                            wire:click="$emit('deleteBanner', '{{ $banner->id }}')">Eliminar</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </x-slot>
        </x-jet-action-section>

        <x-jet-dialog-modal wire:model="editForm.open">

            <x-slot name="title">
                Editar Banner
            </x-slot>

            <x-slot name="content">

                <div class="space-y-3">

                    <div>
                        @if ($editImage)
                            <img class="object-cover object-center w-full h-64" src="{{ $editImage->temporaryUrl() }}"
                                alt="">
                        @else
                            <img class="object-cover object-center w-full h-64"
                                src="{{ Storage::url($editForm['image']) }}" alt="">
                        @endif
                    </div>

                    <div>
                        <x-jet-label>
                            Titulo
                        </x-jet-label>

                        <x-jet-input wire:model="editForm.title" type="text" class="w-full mt-1" />

                        <x-jet-input-error for="editForm.title" />
                    </div>

                    <div>
                        <x-jet-label>
                            ¿ A quíen pertenece esta publicidad ?
                        </x-jet-label>

                        <x-jet-input wire:model.defer="editForm.owner" type="text" class="w-full mt-1" />
                        <x-jet-input-error for="editForm.owner" />
                    </div>

                    <div>
                        <x-jet-label>
                            Fecha de vencimiento
                        </x-jet-label>

                        <input wire:model.defer="editForm.finished_at" type="datetime-local"
                            class="w-full mt-1 form-control">

                        <x-jet-input-error for="editForm.finished_at" />
                    </div>

                    <div>
                        <x-jet-label>
                            Imagen
                        </x-jet-label>

                        <input wire:model="editImage" accept="image/*" type="file" class="mt-1" name=""
                            id="{{ $rand ?? null }}">
                        <x-jet-input-error for="editImage" />
                    </div>

                </div>
            </x-slot>

            <x-slot name="footer">
                <x-jet-danger-button wire:click="update" wire:loading.attr="disabled" wire:target="editImage, update">
                    Actualizar
                </x-jet-danger-button>
            </x-slot>

        </x-jet-dialog-modal>
    </div>
</div>
