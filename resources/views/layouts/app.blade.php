<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SafePet</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        .scrollbar-hide::-webkit-scrollbar { display: none; }
        .scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<body class="bg-gray-50 font-sans antialiased flex min-h-screen overflow-x-hidden">

    <aside class="w-20 hover:w-64 bg-gradient-to-r from-emerald-600 to-emerald-700 text-white flex flex-col fixed h-full z-50 shadow-2xl transition-all duration-300 ease-in-out overflow-hidden group">
        
        <a href="{{ route('vitrine.index') }}" title="Ir para a Página Inicial" class="h-20 flex items-center px-4 border-b border-emerald-500/50 flex-shrink-0 hover:bg-black/10 transition-colors cursor-pointer">
            <div class="w-12 flex justify-center flex-shrink-0">
                <span class="text-4xl">🐾</span>
            </div>
            <span class="text-2xl font-black tracking-tight text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap ml-4">
                SafePet
            </span>
        </a>

        <nav class="flex-1 py-6 flex flex-col gap-1 overflow-y-auto scrollbar-hide">
            
            <p class="text-[10px] font-bold text-emerald-200 uppercase tracking-wider px-6 mb-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap">Serviços</p>

            <a href="{{ route('comunidade.ver', 'perdi') }}" class="flex items-center px-4 py-3 mx-2 rounded-xl hover:bg-white/10 transition">
                <div class="w-12 flex justify-center flex-shrink-0">
                    <span class="text-2xl">⚠️</span>
                </div>
                <span class="font-medium text-sm ml-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap">Perdi um Pet</span>
            </a>

            <a href="{{ route('comunidade.ver', 'encontrei') }}" class="flex items-center px-4 py-3 mx-2 rounded-xl hover:bg-white/10 transition">
                <div class="w-12 flex justify-center flex-shrink-0">
                    <span class="text-2xl">🧭</span>
                </div>
                <span class="font-medium text-sm ml-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap">Encontrei um Pet</span>
            </a>

            <a href="{{ route('ongs') }}" class="flex items-center px-4 py-3 mx-2 rounded-xl hover:bg-white/10 transition">
                <div class="w-12 flex justify-center flex-shrink-0">
                    <span class="text-2xl">🏥</span>
                </div>
                <span class="font-medium text-sm ml-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap">ONGs Parceiras</span>
            </a>

            <hr class="border-emerald-500/50 my-4 mx-4">

            <p class="text-[10px] font-bold text-emerald-200 uppercase tracking-wider px-6 mb-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap">Informações</p>

            <a href="{{ route('termos') }}" class="flex items-center px-4 py-3 mx-2 rounded-xl hover:bg-white/10 transition text-emerald-100 hover:text-white">
                <div class="w-12 flex justify-center flex-shrink-0">
                    <span class="text-xl">📄</span>
                </div>
                <span class="font-medium text-sm ml-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap">Termos de Uso</span>
            </a>
            
            <a href="{{ route('politica') }}" class="flex items-center px-4 py-3 mx-2 rounded-xl hover:bg-white/10 transition text-emerald-100 hover:text-white">
                <div class="w-12 flex justify-center flex-shrink-0">
                    <span class="text-xl">🔒</span>
                </div>
                <span class="font-medium text-sm ml-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap">Privacidade</span>
            </a>
        </nav>
    </aside>

    <div class="flex-1 ml-20 flex flex-col min-h-screen">
        
        <header class="bg-white/80 backdrop-blur-md border-b border-gray-100 h-16 flex items-center justify-end px-8 sticky top-0 z-40 gap-4">
            @auth
                <a href="{{ Auth::user()->tipo_acesso === 'admin' ? route('admin.triagem') : route('candidato.painel') }}" 
                   class="font-semibold text-sm text-gray-600 hover:text-emerald-600 transition flex items-center gap-2">
                    <span>👤 Meu Painel</span>
                </a>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-xl text-sm transition">
                        Sair
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="font-semibold text-sm text-gray-600 hover:text-emerald-600 transition">
                    Entrar
                </a>
                <a href="{{ route('cadastro') }}" class="bg-gradient-to-r from-emerald-600 to-emerald-700 hover:from-emerald-700 hover:to-emerald-800 text-white font-bold text-xs py-2.5 px-5 rounded-xl shadow-sm transition">
                    Criar Conta
                </a>
            @endauth
        </header>

        <main class="flex-grow p-8">
            @yield('conteudo')
        </main>

    </div>

</body>
</html>