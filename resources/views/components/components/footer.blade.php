<footer class="flex justify-center px-4 text-black bg-gray-50">

    <div class="container">

        <!-- icons redes sociales -->
        <section class="flex flex-col items-center justify-center mt-6 mb-2 md:flex-row">

            <div class="flex md:m-0">

                <!-- facebook -->
                <a href="https://www.facebook.com/people/Versagge-Elegance-Alquiler-de-Trajes/100067775966516/">
                    <img src="https://img.icons8.com/color/48/000000/facebook-circled--v5.png" />
                </a>

                <!-- twitter -->
                <a href="https://twitter.com/trajesversagge">
                    <img src="https://img.icons8.com/color/48/000000/twitter--v2.png" />
                </a>

                <!-- instagram -->
                <a href="https://www.instagram.com/trajesversagge/">
                    <img src="https://img.icons8.com/color/48/000000/instagram-new--v2.png" />
                </a>

                <!-- youtoube -->
                <a href="https://www.instagram.com/trajesversagge/">
                    <img src="https://img.icons8.com/color/48/000000/youtube--v3.png" />
                </a>

            </div>

        </section>

        <hr class="h-px  bg-gray-700 border-none ">
        <!-- links pages about, contact,etc-->

        <section class="flex-col items-center justify-between hidden mb-4 md:flex-row lg:block">
            <div class="flex items-center justify-between ">
                <a href="/" class="items-center">
                    <div class=" flex">
                        <x-jet-application-mark class="block w-auto " />
                    </div>

                </a>
                <div class="-mx-4">
                    <a href="{{ route('about') }}" class="px-4 text-sm no-underline hover:underline">Sobre
                        Nosotros</a>
                    <a href="{{ route('subscribe.show') }}"
                        class="px-4 text-sm no-underline hover:underline">Suscripción</a>
                    <a href="{{ route('contacts.index') }}"
                        class="px-4 text-sm no-underline hover:underline">Contactanos</a>
                    <a href="{{ route('job-application') }}"
                        class="px-4 text-sm no-underline hover:underline">Empleos</a>
                    <a href="{{ route('terms') }}" class="px-4 text-sm no-underline hover:underline">Terms &amp;
                        Conditions</a>
                    <a href="{{ route('policy') }}" class="px-4 text-sm no-underline hover:underline">Privacy &amp;
                        Policy</a>
                </div>
            </div>
            <!-- copy right  message-->
            <div class="flex items-center justify-center text-center md:flex-row">

                <div class="flex  md:m-0">

                    <span class="text-xs">Copyright © 2023 Versagge Elegance C.A. All rights reserved - by
                        Jaguilar</span>

                </div>

            </div>
        </section>

        @push('script')
            {{-- formulario de suscripcion E-goi --}}
            {{-- <script type="text/javascript">
                (function() {
                    let u = "https://egoi.page/1e2e5MW2/forms",
                        c = "1e2e5MW2",
                        i = document.createElement("iframe"),
                        e = document.getElementById(c);
                    i.setAttribute("src", u);
                    i.setAttribute('style', 'border:none;width:100%;height:100%');
                    e.appendChild(i);
                })();
            </script> --}}
        @endpush

    </div>

</footer>
