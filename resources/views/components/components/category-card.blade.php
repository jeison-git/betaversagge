@props(['category']){{-- Card de categorias usado en el home --}}

<div class="flex flex-col items-center justify-center h-full bg-gray-100">

    <div
        class="p-6 bg-white shadow-xl w- ">{{-- ojo aca tenemos que averiguar cual es el tamaño de la imagen de categori y quitae wl w-64 --}}
        <img class="object-fill object-center w-64 h-64 transition-all duration-500 transform w-  hover:scale-105" src="{{ Storage::url($category->image) }}" alt="{{ $category->name }}" />
        <div class="flex items-center justify-between"> 
            <div>
                <h1 class="mt-5 text-sm font-semibold text-black uppercase">{{ $category->name }}</h1>
            </div>
            <div>
                <button
                    class="flex items-center mt-4 text-xs text-black uppercase rounded hover:underline focus:outline-none">
                    <a class="" href="{{ route('categories.show', $category) }}" title="Heading Link">
                        <span>Ver más</span>
                    </a>
                    <svg class="w-5 h-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

</div> 
