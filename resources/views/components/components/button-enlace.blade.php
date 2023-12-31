@props(['color' => 'red'])

{{--<a
    {{ $attributes->merge(['type' => 'button', 'class' => "inline-flex justify-center items-center px-4 py-2 bg-$color-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-$color-600 active:bg-$color-500 focus:outline-none focus:border-$color-500 focus:shadow-outline-$color disabled:opacity-25 transition"]) }}>
    {{ $slot }}
</a>--}}

<a {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex justify-center items-center px-4 py-2 bg-white border border-transparent shadow-lg font-semibold text-xs text-black uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 hove:text-white focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition']) }}>
    {{ $slot }}
</a>
