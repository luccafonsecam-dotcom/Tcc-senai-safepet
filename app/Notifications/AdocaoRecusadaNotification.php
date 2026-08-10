<?php

namespace App\Notifications;

use App\Models\SolicitacaoAdocao;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class AdocaoRecusadaNotification extends Notification
{
    use Queueable;

    public function __construct(protected SolicitacaoAdocao $solicitacao, protected string $justificativa)
    {
    }

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toDatabase(object $notifiable): array
    {
        return [
            'tipo' => 'adocao_recusada',
            'solicitacao_id' => $this->solicitacao->id,
            'animal_id' => $this->solicitacao->animal_id,
            'animal_nome' => $this->solicitacao->animal->nome,
            'titulo' => 'Atualização sobre sua solicitação',
            'mensagem' => "Sua solicitação para adotar {$this->solicitacao->animal->nome} não foi aprovada desta vez.",
            'justificativa' => $this->justificativa,
        ];
    }
}