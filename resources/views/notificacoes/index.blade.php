@extends('layouts.app')

@section('conteudo')
<div class="max-w-3xl mx-auto mt-6 space-y-6">

    <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 transition-colors duration-300">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">🔔 Central de Notificações</h1>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Acompanhe as atualizações das suas solicitações no SafePet.</p>
            </div>

            @if(auth()->user()->unreadNotifications->count() > 0)
                <form action="{{ route('notificacoes.marcarLidas') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-xs font-semibold text-emerald-600 dark:text-emerald-400 hover:underline whitespace-nowrap">
                        Marcar todas como lidas
                    </button>
                </form>
            @endif
        </div>
    </div>

    <div class="space-y-3">
        @forelse($notificacoes as $notificacao)
            <div class="p-4 rounded-xl border transition-colors duration-300
                {{ $notificacao->read_at
                    ? 'bg-white dark:bg-gray-800 border-gray-100 dark:border-gray-700 opacity-70'
                    : 'bg-emerald-50 dark:bg-emerald-950/30 border-emerald-200 dark:border-emerald-800' }}">

                <div class="flex items-start justify-between gap-3">
                    <div class="flex items-start gap-3">
                        <span class="w-2 h-2 mt-1.5 rounded-full flex-shrink-0 {{ $notificacao->read_at ? 'bg-transparent' : 'bg-emerald-500' }}"></span>

                        <div>
                            <p class="text-sm font-bold text-gray-800 dark:text-gray-100">
                                {{ $notificacao->data['titulo'] ?? 'Notificação' }}
                            </p>
                            <p class="text-sm text-gray-600 dark:text-gray-300 mt-0.5">
                                {{ $notificacao->data['mensagem'] ?? '' }}
                            </p>

                            @if(($notificacao->data['tipo'] ?? null) === 'adocao_recusada')
                                <p class="text-xs text-gray-500 dark:text-gray-400 mt-2 italic bg-white dark:bg-gray-900/40 p-2 rounded-lg border border-gray-100 dark:border-gray-700">
                                    Justificativa: "{{ $notificacao->data['justificativa'] }}"
                                </p>
                            @endif

                            @if(($notificacao->data['tipo'] ?? null) === 'adocao_aprovada')
                                <div class="text-xs text-gray-500 dark:text-gray-400 mt-2 space-y-0.5">
                                    <p>📍 {{ $notificacao->data['ong_endereco'] }}</p>
                                    <p>📱 WhatsApp: {{ $notificacao->data['ong_whatsapp'] }}</p>
                                    <p>🕒 {{ $notificacao->data['ong_horario'] }}</p>
                                </div>
                            @endif

                            <p class="text-[10px] text-gray-400 dark:text-gray-500 mt-2">
                                {{ $notificacao->created_at->diffForHumans() }}
                            </p>
                        </div>
                    </div>

                    @unless($notificacao->read_at)
                        <form action="{{ route('notificacoes.marcarUmaLida', $notificacao->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="text-[11px] font-semibold text-gray-400 hover:text-emerald-600 dark:hover:text-emerald-400 transition whitespace-nowrap">
                                Marcar como lida
                            </button>
                        </form>
                    @endunless
                </div>
            </div>
        @empty
            <div class="bg-gray-50 dark:bg-gray-800/50 p-10 rounded-2xl text-center text-gray-400 dark:text-gray-400 border border-dashed border-gray-200 dark:border-gray-700 transition-colors duration-300">
                Você ainda não tem nenhuma notificação.
            </div>
        @endforelse
    </div>
</div>
@endsection