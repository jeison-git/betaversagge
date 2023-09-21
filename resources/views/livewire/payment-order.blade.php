<div>

    <header class="bg-white shadow">
        <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex items-center">

                <div class="mr-6">
                    <a href="{{ URL::previous() }}" class="mr-2">
                        <i class="fa fa-arrow-left text-sm" aria-hidden="true"></i>
                    </a>
                </div>

                <h1 class="flex items-center font-extralight leading-tight text-center text-black md:text-2xl">
                    ¡Destácate en tu ocasión especial! Paga ahora y luce espectacular.
                </h1>

            </div>
        </div>
    </header>

    <div class="container mt-4"> {{-- orden de pago --}}

        {{-- sdk de mercado pago no funciona en VE --}}
        {{-- @php
            // SDK de Mercado Pago
            require base_path('vendor/autoload.php');
            // Agrega credenciales
            MercadoPago\SDK::setAccessToken(config('services.mercadopago.token'));

            // Crea un objeto de preferencia
            $preference = new MercadoPago\Preference();

            $shipments = new MercadoPago\Shipments();

            $shipments->cost = $order->shipping_cost;
            $shipments->mode = "not_specified";

            $preference->shipments = $shipments;

            // Crea un ítem en la preferencia
            
            foreach ($items as $product) {
                $item = new MercadoPago\Item();
                $item->title = $product->name;
                $item->quantity = $product->qty;
                $item->unit_price = $product->price;

                $products[] = $item;
            }

            $preference->back_urls = array(
                "success" => route('orders.pay', $order),
                "failure" => "http://www.tu-sitio/failure",
                "pending" => "http://www.tu-sitio/pending"
            );
            $preference->auto_return = "approved";

            $preference->items = $products;
            $preference->save();
        @endphp --}}
        {{-- end Sdk Mpago --}}

        <div class="container grid grid-cols-1 gap-6 py-8 lg:grid-cols-2 xl:grid-cols-5">{{-- orden de pago --}}

            <div class="order-2 lg:order-1 xl:col-span-3"> {{-- detalles de orden de compra --}}

                <div class="px-6 py-4 mb-6 bg-white {{-- rounded-lg --}} shadow-lg">{{-- # orden --}}
                    <p class="text-black uppercase"><span class="font-semibold">Número de orden:</span>
                        Orden-{{ $order->id }}</p>
                </div>

                <div class="p-6 mb-6 bg-white {{-- rounded-lg --}} shadow-lg">{{-- card direccion datos de contacto, recepcion, domicilio --}}
                    <div class="grid grid-cols-1 gap-6 text-black md:grid-cols-2">
                        <div>
                            <p class="text-lg font-semibold uppercase">Envío</p>

                            @if ($order->envio_type == 1)
                                <p class="text-sm">Los productos de su pedido deben ser recogidos en: </p>
                                <p class="text-sm">{{ $envio->claim ?? null }}</p>
                                {{-- <p>{{ $envio->address}}</p> --}}
                            @else
                                <p class="text-sm">Los productos de su pedido Serán enviados a:</p>
                                <p class="text-sm">{{ $envio->address }} - {{ $envio->references }}</p>
                                <p>{{ $envio->department }} - {{ $envio->city }} - {{ $envio->district }}
                                </p>
                            @endif


                        </div>

                        <div>
                            <p class="text-lg font-semibold uppercase">Datos de contacto</p>

                            <p class="text-sm">Persona que recibirá el producto es: <br> {{ $order->contact }}</p>
                            <p class="text-sm">Teléfono de contacto: {{ $order->phone }}</p>
                        </div>
                    </div>
                </div>{{-- end datos de contacto --}}

                <div class="p-6 mb-6 text-black bg-white {{-- rounded-lg --}} shadow-lg">{{-- card resumen --}}
                    <p class="mb-4 text-xl font-semibold">Resumen</p>

                    <x-components.table-responsive>{{-- tabla resumen productos del pedido --}}
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="relative px-6 py-3">
                                        <span
                                            class="text-xs font-medium tracking-wider text-left text-black uppercase">Producto</span>
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-black uppercase">
                                        Precio</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-black uppercase">
                                        Cant</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-black uppercase">
                                        Total</th>
                                </tr>
                            </thead>

                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($items as $item)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">

                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 w-20 h-15">
                                                    <img class="object-cover w-20 mr-4 h-15"
                                                        src="{{ $item->options->image }}" alt="">
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-black">
                                                        <article>
                                                            <div>{{ $item->name }}</div>
                                                            <div class="flex text-xs">

                                                                @isset($item->options->color)
                                                                    Color: {{ __($item->options->color) }}
                                                                @endisset

                                                                @isset($item->options->size)
                                                                    - {{ $item->options->size }}
                                                                @endisset
                                                            </div>
                                                        </article>
                                                    </div>
                                                </div>
                                            </div>

                                        </td>

                                        <td class="px-6 py-4 text-sm text-black whitespace-nowrap">
                                            US ${{ $item->price }}
                                        </td>

                                        <td class="px-6 py-4 text-sm text-black whitespace-nowrap">
                                            {{ $item->qty }}
                                        </td>

                                        <td class="px-6 py-4 text-sm text-black whitespace-nowrap">
                                            US ${{ $item->price * $item->qty }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </x-components.table-responsive>
                </div>

            </div>

            <div class="order-1 lg:order-2 xl:col-span-2">{{-- card contenedor de metodo de pago --}}

                <div x-data="{ open: false }"class="px-4 font-extralight bg-white shadow-lg text-black ">

                    <h1 class="uppercase"> <strong>Pagos</strong></h1>
                    <p class="uppercase">Puede realizar el pago de su pedido de la siguiente manera:</p> <br>


                    <header x-on:click="open= !open">

                        <div class="flex items-center justify-between cursor-pointer">
                            <h2 class="text-base font-semibold uppercase">Pago en efectivo, pago móvil o
                                punto de
                                venta:</h2>
                            <i class="fa fa-sort" aria-hidden="true"></i>
                        </div>

                    </header>

                    <ul x-show="open" class="mx-4">
                        <p class="text-base">- Diríjase a una de nuestras sucursales. <br>- Comuníquese con
                            nosotros a través de los canales disponibles (WhatsApp, Póngase en contacto con
                            nosotros a traves de este portal). <br></p>
                    </ul>

                    <header x-on:click="open= !open">

                        <div class="flex items-center justify-between">
                            <h2 class="text-base font-semibold uppercase">Pago en línea (solo Paypal):
                            </h2>
                            {{-- <i class="fa fa-sort" aria-hidden="true"></i> --}}
                        </div>

                    </header>

                    <ul x-show="open" class="mx-4">
                        <p class="text-base">- Haga clic en el botón "Pagar" en su cesta de compras. <br>-
                            Ingrese
                            los detalles de su tarjeta de crédito o débito. <br> - Haga clic en el botón
                            "Pagar".
                            <br>
                        </p>
                    </ul>

                    <header x-on:click="open= !open">

                        <div class="flex items-center justify-between">
                            <h2 class="text-base  font-semibold uppercase">Términos y condiciones:</h2>
                            {{-- <i class="fa fa-sort" aria-hidden="true"></i> --}}
                        </div>

                    </header>

                    <ul x-show="open" class="mx-4">
                        <p class="text-base">- Su pedido estará como Pendiente de Pago hasta que se complete
                            el
                            pago. <br>- Si el tiempo límite para procesar el pago se vence, su pedido regresará
                            al
                            inventario.<br> - Haga clic en el botón "Pagar". <br> </p>
                    </ul>

                    <header x-on:click="open= !open">

                        <div class="flex items-center justify-between">
                            <h2 class="text-base font-semibold uppercase">¿Tiene alguna pregunta?</h2>
                            {{-- <i class="fa fa-sort" aria-hidden="true"></i> --}}
                        </div>

                    </header>

                    <ul x-show="open" class="mx-4">
                        <p class="text-base">- Comuníquese con nosotros para obtener ayuda. <br> </p>
                    </ul>

                    <hr>

                </div>

                <div class="px-2 py-4 bg-white {{-- rounded-lg --}} shadow-lg">

                    <div class="grid items-center justify-between grid-cols-1 mb-4 text-center md:grid-cols-2">

                        <div class="flex-shrink-0 ">
                            <img class="object-cover h-8 mb-4 mr-4" src="{{ asset('img/MC_VI_DI_2-1.jpg') }}"
                                alt="">
                        </div>

                        <div class="text-black">
                            <p class="text-sm font-semibold">
                                Subtotal: US ${{ $order->total - $order->shipping_cost }}
                            </p>
                            <p class="text-sm font-semibold">
                                Envío: US ${{ $order->shipping_cost }}
                            </p>
                            <p class="text-lg font-semibold uppercase">
                                Total: US ${{ $order->total }}
                            </p>

                            <div class="cho-container">

                            </div>
                        </div>

                    </div>

                    <div class="items-center block py-2">

                        <div id="paypal-button-container"></div>

                    </div>

                </div>
            </div>

        </div>

        {{-- <script src="https://sdk.mercadopago.com/js/v2"></script>

            <script>
                
                const mp = new MercadoPago("{{config('services.mercadopago.key')}}", {
                        locale: 'es-AR'
                });
                
                mp.checkout({
                    preference: {
                        id: '{{ $preference->id }}'
                    },
                    render: {
                            container: '.cho-container', 
                            label: 'Pagar',
                    }
                });

            </script> --}}

        @push('script')
            {{-- script   cdn paypal --}}

            <script src="https://www.paypal.com/sdk/js?client-id={{ config('services.paypal.client_id') }}">
                // Replace YOUR_CLIENT_ID with your sandbox client ID
            </script>

            <script>
                paypal.Buttons({
                    createOrder: function(data, actions) {
                        return actions.order.create({
                            purchase_units: [{
                                amount: {
                                    value: "{{ $order->total }}"
                                }
                            }]
                        });
                    },
                    onApprove: function(data, actions) {
                        return actions.order.capture().then(function(details) {

                            /* window.livewire.emit('payOrder'); */
                            Livewire.emit('payOrder');

                            console.log(details);

                            alert(details.payer.name.given_name +
                                ' Gracias por su compra. Luego de ver este mensaje por favor dirijase a sus pedidos para màs detalles :) '
                            );

                        });
                    }
                }).render('#paypal-button-container'); // Display payment options on your web page
            </script>
        @endpush
    </div>

</div>
