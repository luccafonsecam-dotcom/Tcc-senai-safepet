@extends('layouts.app')

@section('conteudo')
<div class="max-w-3xl mx-auto mt-6 space-y-4 px-4">

    <div class="flex justify-between items-center">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">🔔 Suas Notificações</h1>

        @if($notificacoes->whereNull('read_at')->count() > 0)
            <form action="{{ route('notificacoes.marcarLidas') }}" method="POST">
                @csrf
                <button type="submit" class="text-sm text-indigo-600 dark:text-indigo-400 font-semibold hover:underline">
                    Marcar todas como lidas
                </button>
            </form>
        @endif
    </div>

    <div class="space-y-3">
        @forelse($notificacoes as $notificacao)
            <div class="p-5 rounded-2xl border shadow-sm transition-colors duration-300
                {{ $notificacao->read_at
                    ? 'bg-white dark:bg-gray-800 border-gray-100 dark:border-gray-700'
                    : 'bg-indigo-50 dark:bg-indigo-950/30 border-indigo-200 dark:border-indigo-800' }}">

                <div class="flex justify-between items-start gap-3">
                    <div class="space-y-1">
                        <h3 class="font-bold text-gray-800 dark:text-gray-100">
                            {{ $notificacao->data['titulo'] }}
                            @unless($notificacao->read_at)
                                <span class="inline-block w-2 h-2 bg-indigo-500 rounded-full ml-1"></span>
                            @endunless
                        </h3>
                        <p class="text-sm text-gray-600 dark:text-gray-300">
                            {{ $notificacao->data['mensagem'] }}
                        </p>

                        @if($notificacao->data['tipo'] === 'adocao_aprovada')
                            <div class="mt-3 p-3 bg-gray-50 dark:bg-gray-900/50 rounded-xl text-xs text-gray-600 dark:text-gray-400 space-y-1">
                                <p>📍 <strong>Endereço:</strong> {{ $notificacao->data['ong']['endereco'] }}</p>
                                <p>📞 <strong>WhatsApp:</strong> {{ $notificacao->data['ong']['whatsapp'] }}</p>
                                <p>🕒 <strong>Horário:</strong> {{ $notificacao->data['ong']['horario_funcionamento'] }}</p>
                            </div>
                        @endif

                        @if($notificacao->data['tipo'] === 'adocao_recusada')
                            <div class="mt-3 p-3 bg-gray-50 dark:bg-gray-900/50 rounded-xl text-xs text-gray-600 dark:text-gray-400">
                                <p><strong>Motivo:</strong> {{ $notificacao->data['justificativa'] }}</p>
                            </div>
                        @endif

                        <p class="text-[11px] text-gray-400 dark:text-gray-500 pt-1">
                            {{ $notificacao->created_at->diffForHumans() }}
                        </p>
                    </div>

                    @unless($notificacao->read_at)
                        <form action="{{ route('notificacoes.marcarUmaLida', $notificacao->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="text-xs text-indigo-600 dark:text-indigo-400 font-semibold hover:underline whitespace-nowrap">
                                Marcar como lida
                            </button>
                        </form>
                    @endunless
                </div>
            </div>
        @empty
            <div class="bg-gray-50 dark:bg-gray-800/50 text-center p-12 rounded-2xl border border-dashed border-gray-200 dark:border-gray-700 text-gray-400 dark:text-gray-500 text-sm">
                Nenhuma notificação por enquanto.
            </div>
        @endforelse
    </div>
</div>
@endsection