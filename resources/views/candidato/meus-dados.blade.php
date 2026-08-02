@extends('layouts.app')

@section('conteudo')
    <div class="max-w-3xl mx-auto mt-6 space-y-6">

        <div
            class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 transition-colors duration-300">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">Meus Dados 📍</h1>
            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Mantenha seu endereço atualizado para futuras adoções.
            </p>
        </div>

        @if(session('sucesso'))
            <div
                class="bg-green-100 dark:bg-green-900/50 border border-green-400 dark:border-green-700 text-green-700 dark:text-green-200 px-4 py-3 rounded-xl transition-colors duration-300">
                {{ session('sucesso') }}
            </div>
        @endif

        <div
            class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 transition-colors duration-300">

            {{-- Tabela com os dados atuais --}}
            <h2 class="text-lg font-bold text-gray-700 dark:text-gray-200 mb-4">Dados Atuais</h2>
            <div class="overflow-x-auto mb-8">
                <table class="w-full text-sm text-left">
                    <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                        <tr>
                            <td class="py-2 pr-4 font-semibold text-gray-500 dark:text-gray-400 w-1/3">Nome</td>
                            <td class="py-2 text-gray-800 dark:text-gray-100">{{ $usuario->name }}</td>
                        </tr>
                        <tr>
                            <td class="py-2 pr-4 font-semibold text-gray-500 dark:text-gray-400">E-mail</td>
                            <td class="py-2 text-gray-800 dark:text-gray-100">{{ $usuario->email }}</td>
                        </tr>
                        
                        <tr>
                            <td class="py-2 pr-4 font-semibold text-gray-500 dark:text-gray-400">WhatsApp</td>
                            <td class="py-2 text-gray-800 dark:text-gray-100">{{ $usuario->whatsapp ?? '—' }}</td>
                        </tr>
                        <tr>
                            <td class="py-2 pr-4 font-semibold text-gray-500 dark:text-gray-400">CEP</td>
                            <td class="py-2 text-gray-800 dark:text-gray-100">{{ $usuario->cep ?? '—' }}</td>
                        </tr>
                        <tr>
                            <td class="py-2 pr-4 font-semibold text-gray-500 dark:text-gray-400">Logradouro</td>
                            <td class="py-2 text-gray-800 dark:text-gray-100">{{ $usuario->logradouro ?? '—' }}</td>
                        </tr>
                        <tr>
                            <td class="py-2 pr-4 font-semibold text-gray-500 dark:text-gray-400">Número</td>
                            <td class="py-2 text-gray-800 dark:text-gray-100">{{ $usuario->numero ?? '—' }}</td>
                        </tr>
                        <tr>
                            <td class="py-2 pr-4 font-semibold text-gray-500 dark:text-gray-400">Complemento</td>
                            <td class="py-2 text-gray-800 dark:text-gray-100">{{ $usuario->complemento ?? '—' }}</td>
                        </tr>
                        <tr>
                            <td class="py-2 pr-4 font-semibold text-gray-500 dark:text-gray-400">Bairro</td>
                            <td class="py-2 text-gray-800 dark:text-gray-100">{{ $usuario->bairro ?? '—' }}</td>
                        </tr>
                        <tr>
                            <td class="py-2 pr-4 font-semibold text-gray-500 dark:text-gray-400">Cidade / UF</td>
                            <td class="py-2 text-gray-800 dark:text-gray-100">
                                {{ $usuario->cidade ?? '—' }}{{ $usuario->uf ? ' / ' . $usuario->uf : '' }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            {{-- Formulário de edição --}}
            <h2 class="text-lg font-bold text-gray-700 dark:text-gray-200 mb-4 border-t dark:border-gray-700 pt-6">Atualizar
                Endereço</h2>

            <form action="{{ route('perfil.atualizar') }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-gray-700 dark:text-gray-300 font-semibold mb-1">CEP</label>
                        <input type="text" id="cep" name="cep" required maxlength="9" placeholder="00000-000"
                            value="{{ old('cep', $usuario->cep) }}"
                            class="w-full border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 rounded-lg p-2.5 text-gray-900 dark:!text-white focus:ring-2 focus:ring-indigo-500 outline-none transition"
                            onblur="buscarCep()">
                        <span id="cep-feedback" class="text-xs text-indigo-600 dark:text-indigo-400 hidden mt-1">Buscando
                            CEP...</span>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-gray-700 dark:text-gray-300 font-semibold mb-1">Logradouro (Rua/Av)</label>
                        <input type="text" id="logradouro" name="logradouro" required
                            value="{{ old('logradouro', $usuario->logradouro) }}"
                            class="w-full border border-gray-300 dark:border-gray-700 bg-gray-100 dark:bg-gray-800/80 text-gray-800 dark:!text-gray-300 rounded-lg p-2.5 font-medium"
                            readonly>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                    <div>
                        <label class="block text-gray-700 dark:text-gray-300 font-semibold mb-1">Número</label>
                        <input type="text" id="numero" name="numero" required value="{{ old('numero', $usuario->numero) }}"
                            class="w-full border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 rounded-lg p-2.5 text-gray-900 dark:!text-white focus:ring-2 focus:ring-indigo-500 outline-none">
                    </div>
                    <div>
                        <label class="block text-gray-700 dark:text-gray-300 font-semibold mb-1">Complemento</label>
                        <input type="text" id="complemento" name="complemento" placeholder="Apto, bloco..."
                            value="{{ old('complemento', $usuario->complemento) }}"
                            class="w-full border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 rounded-lg p-2.5 text-gray-900 dark:!text-white focus:ring-2 focus:ring-indigo-500 outline-none placeholder-gray-400 dark:placeholder-gray-500">
                    </div>
                    <div>
                        <label class="block text-gray-700 dark:text-gray-300 font-semibold mb-1">Bairro</label>
                        <input type="text" id="bairro" name="bairro" required value="{{ old('bairro', $usuario->bairro) }}"
                            class="w-full border border-gray-300 dark:border-gray-700 bg-gray-100 dark:bg-gray-800/80 text-gray-800 dark:!text-gray-300 rounded-lg p-2.5 font-medium"
                            readonly>
                    </div>
                    <div>
                        <label class="block text-gray-700 dark:text-gray-300 font-semibold mb-1">Cidade</label>
                        <input type="text" id="cidade" name="cidade" required value="{{ old('cidade', $usuario->cidade) }}"
                            class="w-full border border-gray-300 dark:border-gray-700 bg-gray-100 dark:bg-gray-800/80 text-gray-800 dark:!text-gray-300 rounded-lg p-2.5 font-medium"
                            readonly>
                    </div>
                    <div>
                        <label class="block text-gray-700 dark:text-gray-300 font-semibold mb-1">UF</label>
                        <input type="text" id="uf" name="uf" required value="{{ old('uf', $usuario->uf) }}"
                            class="w-full border border-gray-300 dark:border-gray-700 bg-gray-100 dark:bg-gray-800/80 text-gray-800 dark:!text-gray-300 rounded-lg p-2.5 font-medium"
                            readonly>
                    </div>
                </div>

                <button type="submit"
                    class="w-full bg-indigo-600 text-white py-3 rounded-lg font-semibold hover:bg-indigo-700 shadow-md transition">
                    Salvar Alterações
                </button>
            </form>
        </div>

    </div>

    <script>
        function buscarCep() {
            let cep = document.getElementById('cep').value.replace(/\D/g, '');
            let feedback = document.getElementById('cep-feedback');

            if (cep.length !== 8) return;

            feedback.classList.remove('hidden');

            fetch(`https://viacep.com.br/ws/${cep}/json/`)
                .then(response => response.json())
                .then(data => {
                    feedback.classList.add('hidden');
                    if (!data.erro) {
                        document.getElementById('logradouro').value = data.logradouro;
                        document.getElementById('bairro').value = data.bairro;
                        document.getElementById('cidade').value = data.localidade;
                        document.getElementById('uf').value = data.uf;

                        document.getElementById('numero').focus();
                    } else {
                        alert('CEP não encontrado! Verifique o número digitado.');
                    }
                })
                .catch(error => {
                    feedback.classList.add('hidden');
                    console.error('Erro ao buscar o CEP:', error);
                    alert('Erro de conexão ao buscar o CEP.');
                });
        }
    </script>
@endsection