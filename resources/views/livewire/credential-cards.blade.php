<!-- component -->
<div class="container flex items-center justify-center min-h-screen bg-white">

    <div class="space-y-16">

        <div class="">{{-- identifica la seccion de categorias --}}
            <div class="flex items-center justify-between block">

                <span class="flex text-xs text-center text-black uppercase md:text-2xl ">
                    Active su credencial cliente vip
                </span>

                <div class="flex-1 w-full h-2 mx-6 bg-gray-400 rounded-full ">
                </div>

            </div>
        </div>

        <div
            class="relative h-56 m-auto text-white transition-transform transform bg-red-100 shadow-2xl md:w-96 rounded-xl hover:scale-110">

            <img class="object-center w-full h-full rounded-xl" src="{{ asset('img/credencialuno.png') }}">
            
            <div class="absolute w-full px-8 mt-16 top-8">

                <div class="grid grid-cols-1 mt-6">

                    <div class="flex justify-center">

                        <div>
                            <!-- Card number -->
                            <div class="font-bold md:text-2xl number text-white  {{-- hover:text-red-600 --}} bg-gray-800 bg-opacity-50 whitespace-nowrap"
                                style="font-family:Courier new, mono;">
                                {{ auth()->user()->id }}&nbsp;{{ auth()->user()->subscription->id ?? null }}&nbsp;{{ auth()->user()->subscription->plan_id ?? null }}&nbsp;4242
                            </div>
                        </div>

                    </div>

                    <div>

                        <div class="font-extralight text-white md:text-2xl uppercase number whitespace-nowrap"
                            style="font-family:Courier new, mono;">{{ auth()->user()->name }}</div>
                    </div>

                </div>
                <div class="pt-1 pr-2">
                    <div class="flex items-center justify-between">
                        <div class="">
                            <p class="text-xs font-light">
                                Valid
                                </h1>
                            <p class="text-xs font-medium tracking-wider">
                                {{ \Carbon\Carbon::parse(auth()->user()->subscription->active_until ?? null)->format('d/m/Y') }}
                            </p>
                        </div>
                        <div class="">
                            <p class="text-xs font-light">
                                Expiry
                                </h1>
                            <p class="text-xs font-medium tracking-wider">
                                {{ \Carbon\Carbon::parse(auth()->user()->subscription->active_until ?? null)->addDays(auth()->user()->subscription->plan->duration_in_days ?? null)->format('d/m/Y') }}
                            </p>
                        </div>

                        <div class="">
                            <p class="text-xs font-light">
                                CVV
                                </h1>
                            <p class="text-sm font-bold tracking-more-wider">
                                {{ auth()->user()->id }}{{ auth()->user()->subscription->id ?? null }}
                            </p>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        {{--  <div class="relative h-56 m-auto text-white transition-transform transform bg-red-100 shadow-2xl md:w-96 rounded-xl hover:scale-110">
                
            <img class="object-center w-full h-full rounded-xl" src="{{asset('img/credentialcardother.jpg')}}">
            
            <div class="absolute w-full px-8 mt-8 top-8">
                <div class="grid grid-cols-1">

                    <div class="flex justify-center text-black">
                        <p class="font-light">
                            {{ auth()->user()->id }}&nbsp;{{ auth()->user()->subscription->id ?? null }}&nbsp;{{ auth()->user()->subscription->plan_id ?? null }}&nbsp;4242
                        </h1>
                        <p class="font-medium tracking-widest">
                            {{ auth()->user()->id }} {{ auth()->user()->subscription->id ?? null }}
                        </p>
                    </div>

                </div>
            </div> 
        </div> --}}

        @if ($hideForm != true)
            <div class="flex items-center justify-end">

                <x-jet-action-message class="mr-3" on="saved">
                    Credencial creada y activada
                </x-jet-action-message>


                <x-jet-button wire:loading.attr="disabled" wire:target="save" wire:click="save" class="ml-auto">
                    Activar Credencial
                </x-jet-button>

            </div>
        @endif

    </div>

</div>
