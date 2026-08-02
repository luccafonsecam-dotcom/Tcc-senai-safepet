@extends('layouts.app')

@section('conteudo')
<div class="max-w-6xl mx-auto mt-6 space-y-6 px-4">

    <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100 flex items-center gap-2 transition-colors duration-300">📢 Aprovação de Anúncios da Comunidade</h1>

    @if(session('sucesso'))
        <div class="bg-green-100 dark:bg-green-900/50 border border-green-400 dark:border-green-700 text-green-700 dark:text-green-200 px-4 py-3 rounded-xl transition-colors duration-300">
            {{ session('sucesso') }}
        </div>
    @endif

    <div class="space-y-4">
        @forelse($anuncios as $a)
            <div class="bg-white dark:bg-gray-800 p-5 rounded-2xl border border-gray-100 dark:border-gray-700 shadow-sm flex flex-col sm:flex-row gap-4 items-center transition-colors duration-300">

                @if($a->foto_url && (Str::startsWith($a->foto_url, 'http://') || Str::startsWith($a->foto_url, 'https://')))
                    <img src="{{ $a->foto_url }}" class="w-24 h-24 object-cover rounded-xl shadow-inner flex-shrink-0">
                @elseif($a->foto_url)
                    <img src="{{ asset('storage/' . $a->foto_url) }}" class="w-24 h-24 object-cover rounded-xl shadow-inner flex-shrink-0">
                @else
                    <div class="w-24 h-24 bg-gray-100 dark:bg-gray-700 rounded-xl flex items-center justify-center text-2xl flex-shrink-0">🐾</div>
                @endif

                <div class="space-y-1 w-full">
                    <div class="flex justify-between items-start">
                        <h3 class="font-bold text-gray-800 dark:text-gray-100 text-lg">
                            {{ $a->nome_pet ?? 'Pet Sem Nome' }}
                            <span class="text-xs font-normal text-gray-400 dark:text-gray-400">({{ $a->especie }})</span>
                        </h3>
                        <span class="text-[10px] font-bold uppercase tracking-wider px-2 py-1 rounded-md
                            {{ $a->tipo_anuncio === 'doar' ? 'bg-indigo-100 dark:bg-indigo-950/40 text-indigo-700 dark:text-indigo-400' : ($a->tipo_anuncio === 'perdi' ? 'bg-red-100 dark:bg-red-950/40 text-red-700 dark:text-red-400' : 'bg-amber-100 dark:bg-amber-950/40 text-amber-700 dark:text-amber-400') }}">
                            {{ $a->tipo_anuncio === 'doar' ? 'Doação' : ($a->tipo_anuncio === 'perdi' ? 'Perdi um Pet' : 'Encontrei um Pet') }}
                        </span>
                    </div>
                    <p class="text-xs text-gray-500 dark:text-gray-400">📍 {{ $a->cidade }} · Por: <strong class="dark:text-gray-300">{{ $a->usuario->name }}</strong></p>
                    <p class="text-gray-600 dark:text-gray-300 text-sm italic">"{{ $a->descricao }}"</p>
                    <p class="text-xs text-indigo-600 dark:text-indigo-300 font-bold">📞 Contato: {{ $a->contato }}</p>

                    <div class="pt-3 mt-3 flex justify-end gap-3 border-t border-gray-50 dark:border-gray-700">
                        <form action="{{ route('admin.anuncios.responder', $a->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="status" value="rejeitado">
                            <button type="submit" onclick="return confirm('Rejeitar este anúncio?')" class="text-red-500 dark:text-red-400 hover:text-red-700 dark:hover:text-red-300 font-semibold text-sm transition-colors">
                                ❌ Rejeitar
                            </button>
                        </form>
                        <form action="{{ route('admin.anuncios.responder', $a->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="status" value="aprovado">
                            <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white text-sm px-4 py-2 rounded-lg font-semibold transition shadow-sm">
                                ✅ Aprovar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="bg-gray-50 dark:bg-gray-800/50 text-center p-12 rounded-2xl border border-dashed border-gray-200 dark:border-gray-700 text-gray-400 dark:text-gray-500 text-sm transition-colors duration-300">
                Nenhum anúncio pendente de aprovação no momento. 🎉
            </div>
        @endforelse
    </div>
</div>
@endsection