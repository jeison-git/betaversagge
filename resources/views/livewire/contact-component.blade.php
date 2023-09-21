<div>

    
    <header class=" container bg-white shadow mb-4">
        <div class=" px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex items-center {{-- justify-between --}}">

                <a href="{{ URL::previous() }}" class="mr-6 flex items-center">
                    {{-- <img src="https://img.icons8.com/dusk/25/000000/circled-left-2.png" /> --}}
                    <i class="fa fa-arrow-left text-sm mr-2" aria-hidden="true"> volver </i>
                </a>

                <h1 class="flex items-center font-extralight leading-tight text-black {{-- uppercase --}} md:text-2xl">

                    PÓNGASE EN CONTACTO CON NOSOTROS

                </h1>

            </div>
        </div>
    </header>

    {{-- Componente Formulario de contacto --}}
    <x-jet-form-section submit="save" class="mb-6">
        <x-slot name="title">
           
        </x-slot>

        <x-slot name="description">

            <div class="">
                <p class="text-sm text-justify text-black "> Si tienes alguna duda o pregunta, no dudes en
                    contactarnos. Estamos aquí para ayudarte a encontrar lo que necesitas en Versace Elegance:
                    <br>

                    <br> ¿Necesitas ayuda con tu compra o con tu orden? Nuestro equipo de atención al cliente está aquí
                    para
                    ayudarte. <br>

                    <br> Puedes comunicarte con nosotros por teléfono, correo electrónico o chat. <br>

                    <br> Si estás dentro del horario de atención, te recomendamos chatear con nosotros. Te contestaremos
                    de
                    inmediato. <br>
                </p>

                <div class="flex items-center mt-4 mb-2 text-sm text-black"><img class="mr-2"
                        src="https://img.icons8.com/dusk/20/000000/phone.png" /> Llama a éste teléfono:
                        0414-1401307 - 0424-1714802</div>

                <div class="flex items-center mb-2 text-sm text-black"><img class="mr-2"
                        src="https://img.icons8.com/dusk/20/000000/whatsapp.png" /> Por Whatsapp (llamada o mensaje):
                        0414-1401307</div>

                <div class="flex items-center mb-2 text-sm text-black0"><img class="mr-2"
                        src="https://img.icons8.com/dusk/20/000000/like-message.png" /> Email:
                        versaggeelegance@cantv.net
                </div>

                <div class="flex items-center mb-2 text-sm text-black"><img class="mr-2"
                        src="https://img.icons8.com/dusk/20/000000/address.png" /> Dirección física: La Florida, Calle Garcia Quinta Isa 1080 Caracas, Distrito Capital, Venezuela</div>

            </div>

        </x-slot>

        <x-slot name="form">

            <div class="col-span-6 sm:col-span-4 text-black">
                <x-jet-label>
                    Asunto
                </x-jet-label>

                <x-jet-input wire:model="createForm.issue" type="text" class="w-full mt-1"
                    placeholder="Describe brevemente el motivo de tu contacto." />

                <x-jet-input-error for="createForm.issue" />
            </div>

            <div class="col-span-6 sm:col-span-4 text-black">
                <x-jet-label>
                    Nombre
                </x-jet-label>

                <x-jet-input wire:model="createForm.name" type="text" class="w-full mt-1"
                    placeholder="Ingresa tu nombre completo." />

                <x-jet-input-error for="createForm.name" />
            </div>

            <div class="col-span-6 sm:col-span-4 text-black">
                <x-jet-label>
                    Correo electrónico
                </x-jet-label>

                <x-jet-input wire:model="createForm.email" type="text" class="w-full mt-1"
                    placeholder="Ingresa tu dirección de correo electrónico." />

                <x-jet-input-error for="createForm.email" />
            </div>

            <div class="col-span-6 sm:col-span-4 text-black">
                <x-jet-label>
                    Teléfono
                </x-jet-label>

                <x-jet-input wire:model="createForm.phone" type="text" class="w-full mt-1"
                    placeholder="Ingresa tu número de teléfono móvil." />
                <x-jet-input-error for="createForm.phone" />
            </div>

            <div class="col-span-6 sm:col-span-4 text-black">
                <x-jet-label>
                    Mensaje
                </x-jet-label>

                <textarea wire:model="createForm.comment"
                    class="block w-full h-32 px-3 py-2 text-sm text-black border rounded border-red-300er"
                    placeholder="Ingresa tu mensaje completo."></textarea>

                <x-jet-input-error for="createForm.comment" />
            </div>

        </x-slot>

        <x-slot name="actions">

            <x-jet-action-message class="mr-3" on="saved">
                ¡Recibimos su mensaje!
            </x-jet-action-message>

            <x-jet-button>
                Enviar
            </x-jet-button>

        </x-slot>

    </x-jet-form-section>

</div>
