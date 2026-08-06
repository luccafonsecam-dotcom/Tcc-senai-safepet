<?php

namespace App\Http\Controllers;

class NotificationController extends Controller
{
    public function marcarComoLidas()
    {
        auth()->user()->unreadNotifications->markAsRead();

        return back();
    }

    public function marcarUmaLida($id)
    {
        $notificacao = auth()->user()->notifications()->findOrFail($id);
        $notificacao->markAsRead();

        return back();
    }
}