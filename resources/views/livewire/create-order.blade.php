<div> {{-- Registrar orden de compra  --}}

    <header class="bg-white shadow">
        <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex items-center {{-- justify-between --}}">

                <div class="mr-6">
                    <a href="{{ URL::previous() }}" class="mr-2">
                        <i class="fa fa-arrow-left text-sm" aria-hidden="true"></i>
                    </a>

                    <a href="{{ URL::previous() }}" class="mr-2">
                        <i class="fa fa-arrow-right text-sm" aria-hidden="true"></i>
                    </a>
                </div>

                <h1 class="flex items-center font-extralight leading-tight text-center text-black md:text-2xl">

                    ¡Ordene este producto ahora y sienta la elegancia de Versagge!

                </h1>

            </div>
        </div>
    </header>

    <div class="container grid gap-6 py-8 lg:grid-cols-2 xl:grid-cols-5">{{-- seccion que le permite al usuario generar un pedido o orden --}}

        <div class="order-2 lg:order-1 lg:col-span-1 xl:col-span-3">{{-- seccion de contacto y direccion donde sera reclamado el producto o entregado posible delivery --}}

            <div class="p-6 bg-white text-black {{-- rounded-lg  --}}shadow">{{-- datos de contacto nombre y tlf: --}}
                <div class="mb-4">
                    <x-jet-label value="Nombre del destinatario" />
                    <x-jet-input type="text" wire:model.defer="contact"
                        placeholder="Introduzca el nombre del destinatario" class="w-full" />
                    <x-jet-input-error for="contact" />
                </div>

                <div>
                    <x-jet-label value="Número de teléfono del destinatario" />
                    <x-jet-input type="text" wire:model.defer="phone"
                        placeholder="Introduzca el número de teléfono del destinatario" class="w-full" />

                    <x-jet-input-error for="phone" />
                </div>
            </div>

            <div x-data="{ envio_type: @entangle('envio_type') }">{{-- opciones de direccion tipos de envios 1;2 --}}
                <p class="mt-6 mb-3 text-lg font-semibold text-black">Envíos</p>

                <div class="mb-4 bg-white {{-- rounded-lg --}} shadow">{{-- aliados comerciales y comencios opciones --}}

                    <label
                        class="flex items-center px-6 py-4 mb-4 bg-white {{-- rounded-lg --}} shadow cursor-pointer">

                        <input x-model="envio_type" type="radio" value="1" name="envio_type" class="text-black">
                        <span class="ml-2 text-left text-base text-black">
                            Para retirar el producto, diríjase a
                        </span>

                    </label>

                    <div class="grid hidden grid-cols-1 gap-6 px-6 pb-6" :class="{ 'hidden': envio_type != 1 }">
                        {{-- comercios aliados y comercios para retirar el producto --}}


                        <div>
                            <x-jet-label value="¿Desea retirar su pedido personalmente?" />

                            <select class="w-full text-sm form-control text-black" wire:model="claim_id">

                                <option class="mb-2" value="" disabled selected>Elija un lugar de recogida
                                </option>


                                @foreach ($claims as $claim)
                                    <option value="{{ $claim->id }}">{{ Str::limit($claim->name, 40) }} -
                                        {{ $claim->address }}</option>
                                @endforeach

                            </select>

                            <x-jet-input-error for="claim_id" />
                        </div>

                    </div>
                </div>

                <div class="bg-white {{-- rounded-lg --}} shadow">{{-- envio a domicilio --}}

                    <label class="flex items-center px-6 py-4 cursor-pointer">

                        <input x-model="envio_type" type="radio" value="2" name="envio_type" class="text-black">
                        <span class="ml-2 text-gray-700">
                            Entrega a domicilio
                        </span>

                    </label>

                    <div class="grid hidden grid-cols-2 gap-6 px-6 pb-6" :class="{ 'hidden': envio_type != 2 }">

                        {{-- Estados --}}
                        <div>
                            <x-jet-label value="Estado" />

                            <select class="w-full form-control" wire:model="department_id">

                                <option value="" disabled selected>Seleccione un Estado</option>

                                @foreach ($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                                @endforeach
                            </select>

                            <x-jet-input-error for="department_id" />
                        </div>

                        {{-- Ciudades --}}
                        <div>
                            <x-jet-label value="Municipio" />

                            <select class="w-full form-control" wire:model="city_id">

                                <option value="" disabled selected>Seleccione un municipio</option>

                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>

                            <x-jet-input-error for="city_id" />
                        </div>

                        {{-- parroquias * --}}
                        <div>
                            <x-jet-label value="Parroquia" />

                            <select class="w-full form-control" wire:model="district_id">

                                <option value="" disabled selected>Seleccione una parroquia</option>

                                @foreach ($districts as $district)
                                    <option value="{{ $district->id }}">{{ $district->name }}</option>
                                @endforeach
                            </select>

                            <x-jet-input-error for="district_id" />
                        </div>

                        {{-- direcciòn del cliente --}}
                        <div>
                            <x-jet-label value="Dirección" />
                            <x-jet-input class="w-full" wire:model="address" type="text" />
                            <x-jet-input-error for="address" />
                        </div>

                        <div class="col-span-2">
                            <x-jet-label value="Punto de referencia" />
                            <x-jet-input class="w-full" wire:model="references" type="text" />
                            <x-jet-input-error for="references" />
                        </div>

                    </div>
                </div>

            </div>

            <div>
                <x-jet-button wire:loading.attr="disabled" wire:target="create_order" class="mt-6 mb-4"
                    wire:click="create_order">
                    Continúe con su compra
                </x-jet-button>

                <hr>

                <p class="mt-2 text-xs text-black text-justify">Este acuerdo de usuario (en adelante, el Acuerdo)
                    contiene las condiciones sujetas a las cuales los autores de los servicios prestados en el sitio web
                    meganegociosvip.com (en adelante, el Titular de los derechos) brindan a una parte o partes
                    interesadas (en adelante, el Usuario) la capacidad de utilizar estos servicios (en adelante los
                    servicios). <a href="/terms" class="font-semibold text-orange-500">Terminos & Condiciones</a></p>
            </div>

        </div>

        <div class="order-1 lg:order-2 lg:col-span-1 xl:col-span-2">{{-- card de resumen  y reseñas --}}
            <div class="p-6 mb-4 bg-white {{-- rounded-lg --}} shadow">{{-- card de resumen --}}
                <ul>
                    @forelse (Cart::content() as $item)
                        <li class="flex items-center justify-between p-2 border-b border-gray-200">
                            <img class="object-fill w-20 mr-4 h-15" src="{{ $item->options->image }}" alt="">

                            <article class="flex-1">
                                <h1 class="font-semibold uppercase text-black">{{ $item->name }}</h1>

                                <div class="flex justify-between text-sm text-black">
                                    <p>Cant: {{ $item->qty }}</p>
                                    @isset($item->options['color'])
                                        <p class="mx-2"> Color: {{ __($item->options['color']) }}</p>
                                    @endisset

                                    @isset($item->options['size'])
                                        <p>{{ $item->options['size'] }}</p>
                                    @endisset

                                </div>

                                <p>US ${{ $item->price }}</p>
                            </article>
                        </li>
                    @empty
                        <li class="px-4 py-6">
                            <p class="text-center font-extralight text-black">
                                No tiene agregado ningún producto en la cesta
                            </p>
                        </li>
                    @endforelse
                </ul>

                <hr class="mt-4 mb-3">

                <div class="text-black">
                    <p class="flex items-center justify-between">
                        Subtotal
                        <span class="font-semibold">US ${{ Cart::subtotal() }}</span>
                    </p>
                    <p class="flex items-center justify-between">
                        Envío
                        <span class="font-semibold">
                            @if ($envio_type == 1 || $shipping_cost == 0)
                                Gratis
                            @else
                                US ${{ $shipping_cost }}
                            @endif
                        </span>
                    </p>

                    <hr class="mt-4 mb-3">

                    <p class="flex items-center justify-between font-semibold">
                        <span class="text-lg">Total</span>
                        @if ($envio_type == 1)
                            US ${{ Cart::subtotal() }}
                        @else
                            {{-- floatval(implode(explode(',',$this->shipping_cost))) + floatval(implode(explode(',',Cart::subtotal()))) --}}
                            {{-- US ${{ Cart::subtotal() + $shipping_cost }} --}}
                            US
                            ${{ floatval(implode(explode(',', Cart::subtotal()))) + floatval(implode(explode(',', $shipping_cost))) }}
                        @endif
                    </p>
                </div>
            </div>{{-- end card resumen --}}


            <div class="flex items-center px-6 py-4 mb-6 bg-white {{-- rounded-lg --}} shadow-lg  md:px-12">
                {{-- card- respuesta o comentario del usuario --}}

                <div class="w-full mt-8 md:mt-0" x-data="{ open: false }">

                    <header
                        class="flex items-center justify-between px-4 py-4 {{-- rounded --}} shadow-lg cursor-pointer bg-gray-50"
                        x-on:click="open= !open">{{-- etiqueta --}}

                        <div class="text-xs font-semibold text-black uppercase md:text-sm">

                            <p class="text-xs font-medium tracking-wider uppercase">
                                ¡Sus calificaciones nos ayudan a mejorar!
                            </p>

                        </div>
                        <a class="items-center ml-2 font-semibold hover:text-gray-800 text-black hover:underline"><i
                                class="fa fa-angle-down" aria-hidden="true"></i>
                        </a>
                    </header>

                    <div x-show="open"
                        class="relative z-10 h-auto p-4 py-10 overflow-hidden bg-white border-b-2 border-gray-300 {{-- rounded-lg --}} shadow-2xl px-7">


                        @forelse ($comments as $comment)
                            {{-- recorrer la coleccion rating->comment para buscar calificaciones --}}

                            <article class="grid items-center justify-between grid-cols-1 mb-4">{{-- valoraciones --}}


                                <figure class="mb-2 order">
                                    <img class="object-cover w-12 h-12 rounded-full shadow-lg"
                                        src="{{ $comment->user->profile_photo_url ?? null }}" alt="">
                                </figure>

                                <div class="order-1">
                                    <p class="flex items-center text-xs">
                                        <b class="mr-1 text-black">{{ $comment->user->name ?? null }}</b>
                                        <i class="text-yellow-300 fas fa-star"></i>
                                        ({{ $comment->rating ?? null }})
                                        &nbsp;

                                    </p>

                                    <div
                                        class="items-center flex-1 w-full text-xs tracking-wider text-justify uppercase card-body">
                                        {{ $comment->comment ?? null }}
                                    </div>
                                </div>


                            </article>
                        @empty
                            <div class="flex col-span-1 mt-2">
                                <div class="relative px-4 py-4 leading-6 text-center">
                                    <div class="text-xs font-medium tracking-wider text-black uppercase">
                                        Lo sentimos, no hay comentarios sobre ordenes de compra.
                                    </div>
                                </div>
                            </div>
                        @endforelse

                    </div>

                </div>

            </div>

        </div>

    </div>
