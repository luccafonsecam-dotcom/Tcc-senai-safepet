<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AutenticacaoController extends Controller
{
    public function mostrarLogin() {
        return view('auth.login');
    }

   public function login(Request $request) {
        $credenciais = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credenciais)) {
            $request->session()->regenerate();
            
            // Colocamos o óculos para o VS Code entender de qual Usuário estamos falando
            /** @var \App\Models\User $usuarioLogado */
            $usuarioLogado = Auth::user();

            if ($usuarioLogado->eAdmin()) {
                return redirect()->route('admin.triagem');
            }
            return redirect()->route('vitrine.index');
        }

        return back()->withErrors(['email' => 'As credenciais fornecidas estão incorretas.']);
    }

    public function mostrarCadastro() {
        return view('auth.cadastro');
    }

  public function cadastro(Request $request) {
        $dados = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'tipo' => 'required|in:candidato,administrador' // Facilitador mantido
        ]);

        // 1. Criamos a instância apenas com os dados permitidos no Model (Seguro)
        $usuario = new User([
            'name' => $dados['name'],
            'email' => $dados['email'],
            'password' => Hash::make($dados['password']),
        ]);

        // 2. Atribuímos o campo restrito de forma explícita, fora do "mass assignment"
        $usuario->tipo = $dados['tipo']; 

        // 3. Salvamos no banco
        $usuario->save();

        Auth::login($usuario);

        if ($usuario->eAdmin()) {
            return redirect()->route('admin.triagem');
        }
        return redirect()->route('vitrine.index');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('vitrine.index');
    }
}