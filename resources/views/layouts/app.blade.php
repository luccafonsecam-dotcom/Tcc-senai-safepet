<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SafePet</title>

    <link rel="icon" type="image/svg+xml"
        href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'%3E%3Cellipse cx='50' cy='68' rx='26' ry='22' fill='%23059669'/%3E%3Cellipse cx='20' cy='38' rx='12' ry='15' fill='%23059669'/%3E%3Cellipse cx='46' cy='22' rx='12' ry='16' fill='%23059669'/%3E%3Cellipse cx='74' cy='26' rx='12' ry='15' fill='%23059669'/%3E%3Cellipse cx='90' cy='46' rx='11' ry='14' fill='%23059669' transform='rotate(20 90 46)'/%3E%3C/svg%3E">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@500;600;700&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class'
        }
    </script>

    <script>
        if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }

        function toggleDarkMode() {
            if (document.documentElement.classList.contains('dark')) {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('theme', 'light');
            } else {
                document.documentElement.classList.add('dark');
                localStorage.setItem('theme', 'dark');
            }
        }
    </script>

    <style>
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }

        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .bg-pet-pattern {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100' height='100'%3E%3Cg fill='%23065f46' fill-opacity='0.09'%3E%3Cellipse cx='50' cy='66' rx='17' ry='13'/%3E%3Cellipse cx='30' cy='42' rx='7' ry='9'/%3E%3Cellipse cx='46' cy='30' rx='7' ry='9'/%3E%3Cellipse cx='64' cy='30' rx='7' ry='9'/%3E%3Cellipse cx='78' cy='44' rx='7' ry='9' transform='rotate(18 78 44)'/%3E%3C/g%3E%3C/svg%3E");
            background-repeat: repeat;
            background-size: 130px 130px;
            background-attachment: fixed;
        }

        .dark .bg-pet-pattern {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100' height='100'%3E%3Cg fill='%23ffffff' fill-opacity='0.045'%3E%3Cellipse cx='50' cy='66' rx='17' ry='13'/%3E%3Cellipse cx='30' cy='42' rx='7' ry='9'/%3E%3Cellipse cx='46' cy='30' rx='7' ry='9'/%3E%3Cellipse cx='64' cy='30' rx='7' ry='9'/%3E%3Cellipse cx='78' cy='44' rx='7' ry='9' transform='rotate(18 78 44)'/%3E%3C/g%3E%3C/svg%3E");
        }

        .font-brand {
            font-family: 'Fredoka', sans-serif;
        }

        .scrollbar-hide a svg {
            transition: transform 0.2s ease;
        }

        .scrollbar-hide a:hover svg {
            animation: wag 0.5s ease;
        }

        @keyframes wag {
            0%, 100% { transform: rotate(0deg); }
            25% { transform: rotate(-16deg); }
            75% { transform: rotate(16deg); }
        }
    </style>

    @stack('styles')
</head>

<body
    class="bg-[#F0F1F0] dark:bg-gray-900 bg-pet-pattern font-sans antialiased flex min-h-screen overflow-x-hidden transition-colors duration-300">

    <aside
        class="w-20 hover:w-64 bg-gradient-to-r from-emerald-600 to-emerald-700 text-white flex flex-col fixed h-full z-50 shadow-[8px_0_30px_rgba(0,0,0,0.25)] dark:shadow-2xl transition-all duration-300 ease-in-out overflow-hidden group">

        <a href="{{ route('vitrine.index') }}" title="Ir para a Página Inicial"
            class="h-16 flex items-center px-4 border-b border-emerald-500/50 flex-shrink-0 hover:bg-black/10 transition-colors cursor-pointer">
            <div class="w-12 flex justify-center flex-shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8">
                    <ellipse cx="12" cy="17" rx="6" ry="5" />
                    <ellipse cx="5" cy="9" rx="2.6" ry="3.2" />
                    <ellipse cx="10.5" cy="5.5" rx="2.6" ry="3.4" />
                    <ellipse cx="15.5" cy="5.8" rx="2.6" ry="3.2" />
                    <ellipse cx="20" cy="9.5" rx="2.4" ry="3" transform="rotate(20 20 9.5)" />
                </svg>
            </div>
            <span
                class="text-2xl font-bold font-brand tracking-tight text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap ml-4">
                SafePet
            </span>
        </a>

        <nav class="flex-1 py-6 flex flex-col gap-1 overflow-y-auto scrollbar-hide">

            <p
                class="text-[10px] font-bold text-emerald-200 uppercase tracking-wider px-6 mb-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap">
                Adoção</p>

            <a href="{{ route('vitrine.index') }}"
                class="flex items-center px-4 py-3 mx-2 rounded-xl hover:bg-white/10 transition">
                <div class="w-12 flex justify-center flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6">
                        <path d="M3 11.5 12 4l9 7.5" />
                        <path d="M5 10v9a1 1 0 0 0 1 1h4v-6h4v6h4a1 1 0 0 0 1-1v-9" />
                    </svg>
                </div>
                <span
                    class="font-medium text-sm ml-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap">Quero
                    Adotar</span>
            </a>

            <a href="{{ route('comunidade.ver', 'doar') }}"
                class="flex items-center px-4 py-3 mx-2 rounded-xl hover:bg-white/10 transition">
                <div class="w-12 flex justify-center flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6">
                        <path
                            d="M19 14c1.5-1.4 3-3.2 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.1 3 5.5l7 7Z" />
                    </svg>
                </div>
                <span
                    class="font-medium text-sm ml-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap">Quero
                    Doar</span>
            </a>

            <hr class="border-emerald-500/50 my-4 mx-4">

            <p
                class="text-[10px] font-bold text-emerald-200 uppercase tracking-wider px-6 mb-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap">
                Serviços</p>

            <a href="{{ route('comunidade.ver', 'perdi') }}"
                class="flex items-center px-4 py-3 mx-2 rounded-xl hover:bg-white/10 transition">
                <div class="w-12 flex justify-center flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6">
                        <path d="M12 3 2 20h20L12 3Z" />
                        <path d="M12 10v4" />
                        <path d="M12 17h.01" />
                    </svg>
                </div>
                <span
                    class="font-medium text-sm ml-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap">Perdi
                    um Pet</span>
            </a>

            <a href="{{ route('comunidade.ver', 'encontrei') }}"
                class="flex items-center px-4 py-3 mx-2 rounded-xl hover:bg-white/10 transition">
                <div class="w-12 flex justify-center flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6">
                        <circle cx="12" cy="12" r="9" />
                        <path d="M15 9l-2 6-6 2 2-6 6-2Z" />
                    </svg>
                </div>
                <span
                    class="font-medium text-sm ml-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap">Encontrei
                    um Pet</span>
            </a>

            <a href="{{ route('ongs') }}"
                class="flex items-center px-4 py-3 mx-2 rounded-xl hover:bg-white/10 transition">
                <div class="w-12 flex justify-center flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6">
                        <rect x="4" y="7" width="16" height="14" rx="1" />
                        <path d="M9 7V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v3" />
                        <path d="M12 11v6" />
                        <path d="M9 14h6" />
                    </svg>
                </div>
                <span
                    class="font-medium text-sm ml-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap">ONGs
                    Parceiras</span>
            </a>

            @can('access-admin')
                <hr class="border-emerald-500/50 my-4 mx-4">

                <p
                    class="text-[10px] font-bold text-emerald-200 uppercase tracking-wider px-6 mb-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap">
                    Administração</p>

                <a href="{{ route('admin.triagem') }}"
                    class="flex items-center px-4 py-3 mx-2 rounded-xl hover:bg-white/10 transition">
                    <div class="w-12 flex justify-center flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6">
                            <circle cx="11" cy="11" r="7" />
                            <path d="m21 21-4.3-4.3" />
                        </svg>
                    </div>
                    <span
                        class="font-medium text-sm ml-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap">Central
                        de Triagem</span>
                </a>

                <a href="{{ route('admin.anuncios.index') }}"
                    class="flex items-center px-4 py-3 mx-2 rounded-xl hover:bg-white/10 transition">
                    <div class="w-12 flex justify-center flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6">
                            <path d="M3 11v2a2 2 0 0 0 2 2h1l8 4V5L6 9H5a2 2 0 0 0-2 2Z" />
                            <path d="M17 9a3 3 0 0 1 0 6" />
                        </svg>
                    </div>
                    <span
                        class="font-medium text-sm ml-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap">Aprovação
                        de Anúncios</span>
                </a>

                <a href="{{ route('admin.animais.index') }}"
                    class="flex items-center px-4 py-3 mx-2 rounded-xl hover:bg-white/10 transition">
                    <div class="w-12 flex justify-center flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <ellipse cx="12" cy="17" rx="6" ry="5" />
                            <ellipse cx="5" cy="9" rx="2.6" ry="3.2" />
                            <ellipse cx="10.5" cy="5.5" rx="2.6" ry="3.4" />
                            <ellipse cx="15.5" cy="5.8" rx="2.6" ry="3.2" />
                            <ellipse cx="20" cy="9.5" rx="2.4" ry="3" transform="rotate(20 20 9.5)" />
                        </svg>
                    </div>
                    <span
                        class="font-medium text-sm ml-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap">Gerenciar
                        Animais</span>
                </a>
            @endcan

            <hr class="border-emerald-500/50 my-4 mx-4">

            <p
                class="text-[10px] font-bold text-emerald-200 uppercase tracking-wider px-6 mb-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap">
                Informações</p>

            <a href="{{ route('termos') }}"
                class="flex items-center px-4 py-3 mx-2 rounded-xl hover:bg-white/10 transition text-emerald-100 hover:text-white">
                <div class="w-12 flex justify-center flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
                        <path d="M7 3h7l5 5v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1Z" />
                        <path d="M14 3v5h5" />
                        <path d="M9 13h6M9 17h6" />
                    </svg>
                </div>
                <span
                    class="font-medium text-sm ml-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap">Termos
                    de Uso</span>
            </a>

            <a href="{{ route('privacidade') }}"
                class="flex items-center px-4 py-3 mx-2 rounded-xl hover:bg-white/10 transition text-emerald-100 hover:text-white">
                <div class="w-12 flex justify-center flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
                        <rect x="4" y="11" width="16" height="9" rx="1.5" />
                        <path d="M8 11V7a4 4 0 0 1 8 0v4" />
                    </svg>
                </div>
                <span
                    class="font-medium text-sm ml-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap">Privacidade</span>
            </a>
        </nav>
    </aside>

    <div class="flex-1 ml-20 flex flex-col min-h-screen">

        <header
            class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-md border-b border-gray-100 dark:border-gray-700 h-16 flex items-center justify-end px-8 sticky top-0 z-40 gap-4 shadow-sm dark:shadow-none transition-colors duration-300">
            @auth
                <a href="{{ route('perfil.meusDados') }}"
                    class="font-semibold text-sm text-gray-600 dark:text-gray-300 hover:text-emerald-600 dark:hover:text-emerald-400 transition flex items-center gap-1.5">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4">
                        <path d="M12 21s7-6.6 7-11.5A7 7 0 0 0 5 9.5C5 14.4 12 21 12 21Z" />
                        <circle cx="12" cy="9.5" r="2.3" />
                    </svg>
                    Meus Dados
                </a>
                <a href="{{ Auth::user()->eAdmin() ? route('admin.triagem') : route('candidato.painel') }}"
                    class="font-semibold text-sm text-gray-600 dark:text-gray-300 hover:text-emerald-600 dark:hover:text-emerald-400 transition flex items-center gap-1.5">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4">
                        <circle cx="12" cy="8" r="4" />
                        <path d="M4 20c0-4 3.6-6 8-6s8 2 8 6" />
                    </svg>
                    Meu Painel
                </a>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit"
                        class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-xl text-sm transition">
                        Sair
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}"
                    class="font-semibold text-sm text-gray-600 dark:text-gray-300 hover:text-emerald-600 dark:hover:text-emerald-400 transition">
                    Entrar
                </a>
                <a href="{{ route('cadastro') }}"
                    class="bg-gradient-to-r from-emerald-600 to-emerald-700 hover:from-emerald-700 hover:to-emerald-800 text-white font-bold text-xs py-2.5 px-5 rounded-xl shadow-sm transition">
                    Criar Conta
                </a>
            @endauth

            <button onclick="toggleDarkMode()"
                class="p-2 rounded-lg bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 font-medium transition-colors duration-300 focus:outline-none flex items-center justify-center border border-gray-200 dark:border-gray-600 w-10 h-10">
                <span class="block dark:hidden text-lg">🌙</span>
                <span class="hidden dark:block text-lg">☀️</span>
            </button>
        </header>

        <main class="flex-grow p-8">
            @yield('conteudo')
        </main>

    </div>

    @stack('scripts')
</body>

</html>