<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    /**
     * Exibe a tela com todas as notificações do usuário logado
     */
    public function index()
    {
        $notificacoes = Auth::user()->notifications;

        return view('notificacoes.index', compact('notificacoes'));
    }

    /**
     * Marca uma notificação específica como lida
     */
    public function marcarUmaLida($id)
    {
        $notificacao = Auth::user()->notifications()->findOrFail($id);
        $notificacao->markAsRead();

        return back();
    }

    /**
     * Marca todas as notificações não lidas do usuário como lidas
     */
    public function marcarComoLidas(Request $request)
    {
        Auth::user()->unreadNotifications->markAsRead();

        return back();
    }
}