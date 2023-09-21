@props(['claim']){{-- Card de comercios afiliados usado en el home --}}

<div class="flex items-center justify-between p-3 mt-4 mb-4 bg-white shadow {{-- rounded-xl --}}">

    <div class="flex items-center space-x-6">
        <figure class="w-auto h-12"> {!! $claim->icon !!}</figure>
        {{-- <div>
            <p class="text-base font-semibold">{{ $claim->name }}</p>
        </div> --}} 
    </div>

    <div class="flex items-center space-x-2">
        {{-- <a class="" href="{{ route('claims.show', $claim) ?? null }}" title="Heading Link">
            <div class="flex items-center p-2 bg-gold">
                <p class="text-xs font-semibold text-black">Visitar</p>
            </div>
        </a> --}}

        <button class="flex items-center mt-4 text-xs text-black uppercase rounded hover:underline focus:outline-none">
            <a class="" href="{{ route('claims.show', $claim) ?? null }}" title="Heading Link">
                <span>Visitar</span>
            </a>
            <svg class="w-5 h-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                viewBox="0 0 24 24" stroke="currentColor">
                <path d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
            </svg>
        </button>
    </div>

</div>
