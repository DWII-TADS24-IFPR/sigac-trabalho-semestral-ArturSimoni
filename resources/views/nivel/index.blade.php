<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Níveis') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <a href="{{ route('coordenador.niveis.create') }}" class="mb-4 inline-block px-4 py-2 bg-indigo-600 text-white rounded shadow hover:bg-indigo-700 transition">Novo Nível</a>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">ID</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Nome</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Ações</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach ($niveis as $nivel)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $nivel->id }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $nivel->nome }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <a href="{{ route('coordenador.niveis.show', $nivel->id) }}" class="inline-block px-3 py-1 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition">Ver</a>
                                            <a href="{{ route('coordenador.niveis.edit', $nivel->id) }}" class="inline-block px-3 py-1 bg-yellow-600 text-white rounded hover:bg-yellow-700 transition ml-2">Editar</a>
                                            <form action="{{ route('coordenador.niveis.destroy', $nivel->id) }}" method="POST" class="inline-block ml-2" onsubmit="return confirm('Tem certeza que deseja excluir este nível?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 transition">Excluir</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>