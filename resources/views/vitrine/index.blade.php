@extends('layouts.app')

@section('conteudo')
<div class="max-w-6xl mx-auto space-y-10">

 <h2 class="text-xl font-extrabold text-gray-800 dark:text-gray-100 -mb-2">Destaques da Vitrine</h2>
    <div class="w-full bg-white dark:bg-gray-800 rounded-3xl p-6 shadow-md dark:shadow-none border border-gray-100 dark:border-gray-700">
        <div class="flex items-center justify-between mb-4">
        </div>
        
        <div id="carousel-container" class="w-full overflow-hidden relative cursor-grab active:cursor-grabbing">
            <div id="carousel-track" class="flex gap-4 w-max">
                @foreach($animais->concat($animais)->concat($animais) as $animal)
                    <a href="{{ route('vitrine.show', $animal->id) }}" class="inline-block w-48 h-48 rounded-2xl overflow-hidden relative shrink-0 border border-gray-100 dark:border-gray-700 group select-none">
                        @if($animal->foto_url && (Str::startsWith($animal->foto_url, 'http://') || Str::startsWith($animal->foto_url, 'https://')))
                            <img src="{{ $animal->foto_url }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500 pointer-events-none" alt="{{ $animal->nome }}">
                        @elseif($animal->foto_url)
                            <img src="{{ asset('storage/' . $animal->foto_url) }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500 pointer-events-none" alt="{{ $animal->nome }}">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-3xl bg-gray-50 dark:bg-gray-700 pointer-events-none">🐾</div>
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent flex items-end p-3 pointer-events-none">
                            <span class="text-white font-bold text-sm truncate">{{ $animal->nome }}</span>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    <!-- 🏠 CABEÇALHO DA VITRINE DE PETS -->
    <div class="flex justify-between items-center pt-4 border-t border-gray-200/60 dark:border-gray-700/60">
        <h1 class="text-2xl font-extrabold text-gray-800 dark:text-gray-100 tracking-tight">Animais aguardando adoção 🐾</h1>
        
        @can('access-admin')
            <a href="{{ route('admin.animais.index') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-5 py-2.5 rounded-xl text-sm shadow-md dark:shadow-none transition flex items-center gap-2">
                <span>➕</span> Adicionar Animal
            </a>
        @endcan
    </div>

    <!-- 🔍 BARRA DE FILTROS INTELIGENTES -->
<div class="bg-white dark:bg-gray-800 p-5 rounded-2xl shadow-md dark:shadow-none border border-gray-100 dark:border-gray-700">
    <form action="{{ route('vitrine.index') }}" method="GET" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4 items-end">
        <div>
            <label class="block text-xs font-bold text-gray-400 dark:text-gray-500 uppercase mb-1 ml-1">Espécie</label>
            <select name="especie" class="w-full bg-gray-50 dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-xl p-2.5 text-sm font-medium text-gray-700 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 outline-none transition">
                <option value="">Todos os animais</option>
                <option value="Cachorro" {{ request('especie') == 'Cachorro' ? 'selected' : '' }}> Cachorros</option>
                <option value="Gato" {{ request('especie') == 'Gato' ? 'selected' : '' }}> Gatos</option>
            </select>
        </div>
        <div>
            <label class="block text-xs font-bold text-gray-400 dark:text-gray-500 uppercase mb-1 ml-1">Porte</label>
            <select name="porte" class="w-full bg-gray-50 dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-xl p-2.5 text-sm font-medium text-gray-700 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 outline-none transition">
                <option value="">Todos os tamanhos</option>
                <option value="Pequeno" {{ request('porte') == 'Pequeno' ? 'selected' : '' }}>Pequeno</option>
                <option value="Médio" {{ request('porte') == 'Médio' ? 'selected' : '' }}>Médio</option>
                <option value="Grande" {{ request('porte') == 'Grande' ? 'selected' : '' }}>Grande</option>
            </select>
        </div>
        <div>
            <label class="block text-xs font-bold text-gray-400 dark:text-gray-500 uppercase mb-1 ml-1">Idade</label>
            <select name="idade" class="w-full bg-gray-50 dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-xl p-2.5 text-sm font-medium text-gray-700 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 outline-none transition">
                <option value="">Todas as idades</option>
                <option value="Filhote" {{ request('idade') == 'Filhote' ? 'selected' : '' }}>Filhote</option>
                <option value="Adulto" {{ request('idade') == 'Adulto' ? 'selected' : '' }}>Adulto</option>
                <option value="Idoso" {{ request('idade') == 'Idoso' ? 'selected' : '' }}>Idoso</option>
            </select>
        </div>
        <div>
            <label class="block text-xs font-bold text-gray-400 dark:text-gray-500 uppercase mb-1 ml-1">Sexo</label>
            <select name="sexo" class="w-full bg-gray-50 dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-xl p-2.5 text-sm font-medium text-gray-700 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 outline-none transition">
                <option value="">Ambos</option>
                <option value="Macho" {{ request('sexo') == 'Macho' ? 'selected' : '' }}> Macho</option>
                <option value="Fêmea" {{ request('sexo') == 'Fêmea' ? 'selected' : '' }}> Fêmea</option>
            </select>
        </div>
        <div>
            <label class="block text-xs font-bold text-gray-400 dark:text-gray-500 uppercase mb-1 ml-1">Ordenar por</label>
            <select name="ordenar" class="w-full bg-gray-50 dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-xl p-2.5 text-sm font-medium text-gray-700 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 outline-none transition">
                <option value="recentes" {{ request('ordenar', 'recentes') == 'recentes' ? 'selected' : '' }}>Mais recentes</option>
                <option value="antigos" {{ request('ordenar') == 'antigos' ? 'selected' : '' }}>Mais antigos</option>
                <option value="nome_asc" {{ request('ordenar') == 'nome_asc' ? 'selected' : '' }}>Nome (A-Z)</option>
                <option value="nome_desc" {{ request('ordenar') == 'nome_desc' ? 'selected' : '' }}>Nome (Z-A)</option>
            </select>
        </div>
        <div class="lg:col-span-5 flex gap-2">
            <button type="submit" class="flex-1 bg-emerald-600 hover:bg-emerald-700 text-white font-semibold p-2.5 rounded-xl text-sm shadow-md dark:shadow-none transition cursor-pointer">
                Filtrar Pets
            </button>
            @if(request('especie') || request('porte') || request('idade') || request('sexo') || request('ordenar'))
                <a href="{{ route('vitrine.index') }}" class="bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 text-gray-600 dark:text-gray-300 font-semibold p-2.5 px-4 rounded-xl text-sm transition flex items-center justify-center" title="Limpar Filtros">✕ Limpar</a>
            @endif
        </div>
    </form>
</div>
    <!-- 🐕 GRID DE ANIMAIS -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($animais as $animal)
            <div class="bg-white dark:bg-gray-800 rounded-3xl overflow-hidden shadow-md dark:shadow-none border border-gray-100 dark:border-gray-700 hover:shadow-xl dark:hover:shadow-none transition duration-300 flex flex-col justify-between group">
                <div>
                    <div class="overflow-hidden relative h-56 bg-gray-50 dark:bg-gray-700">
                        @if($animal->foto_url && (Str::startsWith($animal->foto_url, 'http://') || Str::startsWith($animal->foto_url, 'https://')))
                            <img src="{{ $animal->foto_url }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500" alt="{{ $animal->nome }}">
                        @elseif($animal->foto_url)
                            <img src="{{ asset('storage/' . $animal->foto_url) }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500" alt="{{ $animal->nome }}">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-3xl">🐾</div>
                        @endif
                        <span class="absolute top-3 right-3 bg-white/90 dark:bg-gray-900/80 backdrop-blur-sm text-gray-800 dark:text-gray-100 text-xs font-bold px-3 py-1.5 rounded-full shadow-sm">
                            {{ $animal->porte }}
                        </span>
                    </div>
                    <div class="p-6 space-y-2">
                        <div class="flex justify-between items-center">
                            <h2 class="text-xl font-bold text-gray-800 dark:text-gray-100">{{ $animal->nome }}</h2>
                            <span class="text-xs font-semibold text-indigo-600 dark:text-indigo-300 bg-indigo-50 dark:bg-indigo-900/50 px-2.5 py-1 rounded-lg">{{ $animal->idade }}</span>
                        </div>
                        <p class="text-gray-500 dark:text-gray-400 text-sm line-clamp-2">{{ $animal->descricao }}</p>
                    </div>
                </div>
                <div class="p-6 pt-0">
                    <a href="{{ route('vitrine.show', $animal->id) }}" class="block w-full text-center bg-gray-50 dark:bg-gray-700 hover:bg-indigo-600 dark:hover:bg-indigo-600 hover:text-white border border-gray-100 dark:border-gray-600 text-gray-700 dark:text-gray-200 font-bold py-3.5 rounded-2xl text-sm transition duration-200">
                        Conhecer História ➔
                    </a>
                </div>
            </div>
        @empty
            <div class="col-span-full bg-white dark:bg-gray-800 text-center p-16 rounded-3xl border border-gray-100 dark:border-gray-700 space-y-3 shadow-md dark:shadow-none">
                <span class="text-4xl">😿</span>
                <h3 class="text-gray-700 dark:text-gray-200 font-bold text-lg">Nenhum pet encontrado</h3>
                <p class="text-gray-400 dark:text-gray-500 text-sm max-w-xs mx-auto">Não encontramos nenhum animalzinho com essas características no momento.</p>
            </div>
        @endforelse
    </div>

</div>

@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", function() {
    const container = document.getElementById("carousel-container");
    const track = document.getElementById("carousel-track");
    if (!container || !track) return;

    let scrollPos = 0;
    let speed = 0.4;
    let isHovered = false;
    let isDragging = false;
    let startX, scrollLeft;

    container.addEventListener("mouseenter", () => isHovered = true);
    container.addEventListener("mouseleave", () => {
        isHovered = false;
        isDragging = false;
    });

    container.addEventListener("mousedown", (e) => {
        isDragging = true;
        startX = e.pageX - container.offsetLeft;
        scrollLeft = scrollPos;
    });

    container.addEventListener("mouseup", () => isDragging = false);

    container.addEventListener("mousemove", (e) => {
        if (!isDragging) return;
        e.preventDefault();
        const x = e.pageX - container.offsetLeft;
        const walk = (x - startX) * 1.5;
        scrollPos = scrollLeft - walk;
    });

    container.addEventListener("wheel", (e) => {
        e.preventDefault();
        scrollPos += e.deltaY;
    }, { passive: false });

    function animate() {
        if (!isHovered && !isDragging) {
            scrollPos += speed;
        }

        const singleSetWidth = track.scrollWidth / 3;

        if (scrollPos >= singleSetWidth) {
            scrollPos -= singleSetWidth;
        } else if (scrollPos < 0) {
            scrollPos += singleSetWidth;
        }

        track.style.transform = `translateX(${-scrollPos}px)`;
        requestAnimationFrame(animate);
    }

    requestAnimationFrame(animate);
});
</script>
@endpush
@endsection