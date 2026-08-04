<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body style="font-family: Arial, sans-serif; background:#f4f4f5; padding: 24px;">
    <div style="max-width: 560px; margin: 0 auto; background:#fff; border-radius: 16px; padding: 32px; border: 1px solid #e5e7eb;">

        @if($anuncio->status === 'aprovado')
            <h2 style="color:#059669;">🎉 Boas notícias, {{ $anuncio->usuario->name }}!</h2>
            <p style="color:#374151; font-size: 15px; line-height: 1.6;">
                Seu anúncio de <strong>{{ $anuncio->nome_pet ?? 'pet' }}</strong> foi <strong>aprovado</strong>
                e já está visível pra comunidade! 🐾
            </p>
        @else
            <h2 style="color:#374151;">Olá, {{ $anuncio->usuario->name }}</h2>
            <p style="color:#374151; font-size: 15px; line-height: 1.6;">
                Seu anúncio de <strong>{{ $anuncio->nome_pet ?? 'pet' }}</strong> não foi aprovado desta vez.
                Revise as informações e sinta-se à vontade para publicar novamente.
            </p>
        @endif

        <hr style="border:none; border-top:1px solid #e5e7eb; margin: 24px 0;">
        <p style="color:#9ca3af; font-size: 12px;">
            Este é um email automático do SafePet. Em caso de dúvidas, entre em contato pelos nossos canais oficiais.
        </p>
    </div>
</body>
</html>