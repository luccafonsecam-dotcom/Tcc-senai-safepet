<?php

namespace App\Mail;

use App\Models\SolicitacaoAdocao;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SolicitacaoRespondida extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public SolicitacaoAdocao $solicitacao
    ) {}

    public function envelope(): Envelope
    {
        $aprovado = $this->solicitacao->status === 'aprovado';

        return new Envelope(
            subject: $aprovado
                ? '🎉 Sua adoção foi aprovada!'
                : 'Atualização sobre sua solicitação de adoção',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.solicitacao-respondida',
        );
    }
}