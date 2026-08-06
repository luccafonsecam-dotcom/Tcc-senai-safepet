<?php

namespace App\Notifications;

use App\Models\SolicitacaoAdocao;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class AdocaoAprovadaNotification extends Notification
{
    use Queueable;

    public function __construct(protected SolicitacaoAdocao $solicitacao)
    {
    }

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toDatabase(object $notifiable): array
    {
        return [
            'tipo' => 'adocao_aprovada',
            'solicitacao_id' => $this->solicitacao->id,
            'animal_id' => $this->solicitacao->animal_id,
            'animal_nome' => $this->solicitacao->animal->nome,
            'titulo' => 'Sua adoção foi aprovada! 🎉',
            'mensagem' => "Boas notícias! Sua solicitação para adotar {$this->solicitacao->animal->nome} foi aprovada. Providencie a retirada com os dados da ONG abaixo.",
            'ong_endereco' => config('ong.endereco'),
            'ong_whatsapp' => config('ong.whatsapp'),
            'ong_horario' => config('ong.horario'),
        ];
    }
}