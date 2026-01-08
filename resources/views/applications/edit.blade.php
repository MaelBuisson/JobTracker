<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Application: {{ $application->company_name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <form action="{{ route('applications.update', $application->id) }}" method="POST">
                    @csrf
                    @method('PUT') <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Company Name</label>
                        <input type="text" name="company_name" value="{{ old('company_name', $application->company_name) }}" 
                               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Job Title</label>
                        <input type="text" name="job_title" value="{{ old('job_title', $application->job_title) }}" 
                               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Status</label>
                        <select name="status" class="shadow border rounded w-full py-2 px-3 text-gray-700">
                            <option value="En attente" {{ $application->status == 'En attente' ? 'selected' : '' }}>En attente</option>
                            <option value="Envoyé" {{ $application->status == 'Envoyé' ? 'selected' : '' }}>Envoyé</option>
                            <option value="Relancé" {{ $application->status == 'Relancé' ? 'selected' : '' }}>Relancé</option>
                            <option value="Entretien" {{ $application->status == 'Entretien' ? 'selected' : '' }}>Entretien 🎉</option>
                            <option value="Refusé" {{ $application->status == 'Refusé' ? 'selected' : '' }}>Refusé</option>
                        </select>
                    </div>

                    <div class="flex items-center justify-between mt-6">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Update Application
                        </button>
                        <a href="{{ route('applications.index') }}" class="text-gray-500 hover:text-gray-800">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>