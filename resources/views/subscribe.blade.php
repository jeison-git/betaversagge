<x-app-layout>
    @error('message')
        <div class="mt-4 text-center invalid-feedback d-block" role="alert">
            <strong>{{ $message }}</strong>
        </div>
    @enderror
    <div class="relative bg-center bg-no-repeat bg-cover"
        style="background-image: url(https://images.unsplash.com/photo-1573676048035-9c2a72b6a12a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1471&q=80);">
        <div class="absolute inset-0 opacity-50 bg-white"></div>
        <div class=" justify-center min-h-screen mx-0 sm:flex sm:flex-row">

            <div class=" container relative z-10 flex flex-col self-center p-10 md:max-w-2xl">

                <div class="flex-col self-start text-black text-justify lg:fle">

                    <strong class="mb-3 font-semibold md:text-3xl">Nuestros trajes y vestidos
                        son perfectos para cualquier ocasión, desde eventos formales hasta citas casuales.</strong>
                    <p class="pr-3 text-justify">
                        Versagge Elegance ¡Elegancia para cada ocasión!. <br>
                    </p>
                </div>

            </div>

            <div class="container relative z-10 flex self-center justify-center ">

                <div class="p-8 mx-auto bg-white {{-- rounded-2xl --}} ">

                    @if (optional(auth()->user())->hasActiveSubscription() || auth()->user()->subscription)
                        <div class="mt-8 font-medium text-justify text-black {{-- card --}}">
                            <div class="capitalize {{-- card-body --}}">
                                ¡Ya eres miembro de la Comunidad Versace Elegance! <br>
                                Disfruta de nuestra atención personalizada y de los beneficios exclusivos que tenemos
                                para ti.
                            </div>
                        </div>
                        
                        <x-components.button-enlace class="w-full text-center md:text-lg"
                            href="{{ route('vip-client') }}">
                            ¡Ahora puedes solicitar tu pedido, aquí!
                        </x-components.button-enlace>

                    @else
                        <div id="toggler"
                            class="col-span-12 mt-4 sm:col-span-12 md:col-span-5 lg:col-span-5 xxl:col-span-5 form-group">
                            <!-- Start Card List -->
                            <div data-toggle="buttons">

                                <label class="font-semibold">Para solicitar tu credencial, sigue estos pasos:</label>
                                <hr>
                                <div
                                    class="flex items-center text-justify font-semibold px-2 bg-white shadow-xl {{-- rounded-xl --}}">
                                    1. Completa tu registro en el sitio web. <br>
                                    2. Una vez registrado, accede al formulario de contacto. <br>
                                    3. En el asunto, escribe "Solicitud de suscripción o credencial". <br>
                                    4. Una vez aprobada, activa tu credencial en tu perfil. <br>
                                    <br>
                                </div>
                                <hr>

                            </div>
                            <!-- End Card List -->
                        </div>

                        <x-components.button-enlace class="w-full text-center md:text-lg"
                            href="{{ route('contacts.index') }}">
                            ¡Ahora puedes solicitar tu credencial, aquí!
                        </x-components.button-enlace>
                    @endif

                </div>

            </div>

        </div>
    </div>

</x-app-layout>
