@extends('layouts.app')

@section('conteudo')
<div class="max-w-6xl mx-auto space-y-10">

    <!-- 🎯 BOTÕES PRINCIPAIS (CENTRO DA TELA) -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        
        <!-- Card Adotar -->
        <a href="{{ route('vitrine.index') }}" class="bg-white border border-gray-100 hover:border-pink-300 hover:shadow-xl rounded-3xl p-8 flex items-center gap-6 transition duration-300 group">
            <div class="text-6xl group-hover:scale-110 transition duration-300">🐶</div>
            <div>
                <h2 class="text-2xl font-black text-gray-800 group-hover:text-pink-600 transition">Quero Adotar</h2>
                <p class="text-gray-500 text-sm mt-1 leading-relaxed">Encontre um novo melhor amigo que está esperando ansiosamente por você.</p>
            </div>
        </a>

        <!-- Card Doar -->
        <a href="{{ route('comunidade.ver', 'doar') }}" class="bg-white border border-gray-100 hover:border-amber-300 hover:shadow-xl rounded-3xl p-8 flex items-center gap-6 transition duration-300 group">
            <div class="text-6xl group-hover:scale-110 transition duration-300">📢</div>
            <div>
                <h2 class="text-2xl font-black text-gray-800 group-hover:text-amber-500 transition">Quero Doar</h2>
                <p class="text-gray-500 text-sm mt-1 leading-relaxed">Ajude um animalzinho a encontrar um lar cheio de amor e carinho.</p>
            </div>
        </a>

    </div>

    <!-- 🏠 CABEÇALHO DA VITRINE DE PETS -->
    <div class="space-y-2 pt-4 border-t border-gray-200/60">
        <h1 class="text-2xl font-extrabold text-gray-800 tracking-tight">Animais aguardando adoção 🐾</h1>
    </div>

    <!-- 🔍 BARRA DE FILTROS INTELIGENTES -->
    <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100">
        <form action="{{ route('vitrine.index') }}" method="GET" class="grid grid-cols-1 sm:grid-cols-3 gap-4 items-end">
            <div>
                <label class="block text-xs font-bold text-gray-400 uppercase mb-1 ml-1">Espécie</label>
                <select name="especie" class="w-full bg-gray-50 border border-gray-200 rounded-xl p-2.5 text-sm font-medium text-gray-700 focus:ring-2 focus:ring-indigo-500 outline-none transition">
                    <option value="">Todos os animais</option>
                    <option value="Cachorro" {{ request('especie') == 'Cachorro' ? 'selected' : '' }}>🐶 Cachorros</option>
                    <option value="Gato" {{ request('especie') == 'Gato' ? 'selected' : '' }}>🐱 Gatos</option>
                </select>
            </div>
            <div>
                <label class="block text-xs font-bold text-gray-400 uppercase mb-1 ml-1">Porte</label>
                <select name="porte" class="w-full bg-gray-50 border border-gray-200 rounded-xl p-2.5 text-sm font-medium text-gray-700 focus:ring-2 focus:ring-indigo-500 outline-none transition">
                    <option value="">Todos os tamanhos</option>
                    <option value="Pequeno" {{ request('porte') == 'Pequeno' ? 'selected' : '' }}>Pequeno</option>
                    <option value="Médio" {{ request('porte') == 'Médio' ? 'selected' : '' }}>Médio</option>
                    <option value="Grande" {{ request('porte') == 'Grande' ? 'selected' : '' }}>Grande</option>
                </select>
            </div>
            <div class="flex gap-2">
                <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold p-2.5 rounded-xl text-sm shadow-sm transition cursor-pointer">
                    Filtrar Pets
                </button>
                @if(request('especie') || request('porte'))
                    <a href="{{ route('vitrine.index') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-600 font-semibold p-2.5 rounded-xl text-sm transition flex items-center justify-center" title="Limpar Filtros">✕</a>
                @endif
            </div>
        </form>
    </div>

    <!-- 🐕 GRID DE ANIMAIS -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($animais as $animal)
            <div class="bg-white rounded-3xl overflow-hidden shadow-sm border border-gray-100 hover:shadow-lg transition duration-300 flex flex-col justify-between group">
                <div>
                    <div class="overflow-hidden relative h-56 bg-gray-50">
                        <img src="{{ $animal->foto_url }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        <span class="absolute top-3 right-3 bg-white/90 backdrop-blur-sm text-gray-800 text-xs font-bold px-3 py-1.5 rounded-full shadow-sm">
                            {{ $animal->porte }}
                        </span>
                    </div>
                    <div class="p-6 space-y-2">
                        <div class="flex justify-between items-center">
                            <h2 class="text-xl font-bold text-gray-800">{{ $animal->nome }}</h2>
                            <span class="text-xs font-semibold text-indigo-600 bg-indigo-50 px-2.5 py-1 rounded-lg">{{ $animal->idade }}</span>
                        </div>
                        <p class="text-gray-500 text-sm line-clamp-2">{{ $animal->descricao }}</p>
                    </div>
                </div>
                <div class="p-6 pt-0">
                    <a href="{{ route('vitrine.show', $animal->id) }}" class="block w-full text-center bg-gray-50 hover:bg-indigo-600 hover:text-white border border-gray-100 text-gray-700 font-bold py-3.5 rounded-2xl text-sm transition duration-200">
                        Conhecer História ➔
                    </a>
                </div>
            </div>
        @empty
            <div class="col-span-full bg-white text-center p-16 rounded-3xl border border-gray-100 space-y-3 shadow-sm">
                <span class="text-4xl">😿</span>
                <h3 class="text-gray-700 font-bold text-lg">Nenhum pet encontrado</h3>
                <p class="text-gray-400 text-sm max-w-xs mx-auto">Não encontramos nenhum animalzinho com essas características no momento.</p>
            </div>
        @endforelse
    </div>

</div>
@endsection