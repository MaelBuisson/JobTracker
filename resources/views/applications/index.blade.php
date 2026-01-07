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
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Type de candidature</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
    @forelse($applications as $app)
    <tr>
        <td class="px-6 py-4 text-sm text-gray-900">{{ $app->company_name }}</td>
        <td class="px-6 py-4 text-sm text-gray-900">{{ $app->job_title }}</td>
        <td class="px-6 py-4 text-sm">
            {{-- Le bonus visuel commence ici --}}
            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                {{ $app->status === 'En attente' ? 'bg-yellow-100 text-yellow-800' : '' }}
                {{ $app->status === 'Relancé' ? 'bg-blue-100 text-blue-800' : '' }}
                {{ $app->status === 'Entretien' ? 'bg-green-100 text-green-800' : '' }}
                {{ $app->status === 'Refusé' ? 'bg-red-100 text-red-800' : '' }}">
                {{ $app->status }}
            </span>
            {{-- Fin du bonus --}}
        </td>
        <td class="px-6 py-4 text-sm text-gray-500">{{ $app->applied_at }}</td>
    </tr>
    @empty
    <tr>
        <td colspan="4" class="px-6 py-4 text-center text-gray-500 text-sm">
            Aucune candidature enregistrée. Commencez par en ajouter une !
        </td>
    </tr>
    @endforelse
</tbody>
    </table>
</div>
</x-app-layout>


