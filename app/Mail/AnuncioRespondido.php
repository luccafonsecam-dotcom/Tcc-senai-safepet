<?php

namespace App\Mail;

use App\Models\AnuncioPet;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AnuncioRespondido extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public AnuncioPet $anuncio
    ) {}

    public function envelope(): Envelope
    {
        $aprovado = $this->anuncio->status === 'aprovado';

        return new Envelope(
            subject: $aprovado
                ? '🎉 Seu anúncio foi aprovado!'
                : 'Atualização sobre seu anúncio',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.anuncio-respondido',
        );
    }
}