<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Mes Candidatures</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <a href="{{ route('applications.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Ajouter une entreprise</a>
            </div>
        </div>
    </div>

    <div class="mt-6 bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Entreprise</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Poste</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @forelse($applications as $app)
                <tr>
                    <td class="px-6 py-4">{{ $app->company_name }}</td>
                    <td class="px-6 py-4">{{ $app->job_title }}</td>
                    <td class="px-6 py-4">{{ $app->applied_at }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="px-6 py-4 text-center text-gray-500">
                        Aucune candidature enregistrée pour le moment.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
</x-app-layout>


