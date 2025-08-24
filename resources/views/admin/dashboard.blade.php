@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
    <h1 class="text-4xl font-bold text-gray-800 mb-12 text-center">Admin Dashboard</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        {{-- Userbeheer kaart --}}
        <a href="{{ route('admin.users.index') }}" class="group block bg-white rounded-2xl shadow-lg p-8 transform hover:-translate-y-2 hover:shadow-2xl transition-all duration-300">
            <div class="flex items-center space-x-4">
                <div class="p-4 bg-blue-100 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A4 4 0 0112 15a4 4 0 016.879 2.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-2xl font-semibold text-gray-800 group-hover:text-blue-700">Userbeheer</h2>
                    <p class="text-gray-600 mt-2 group-hover:text-gray-800">Gebruikers beheren, toevoegen en admin-rechten geven.</p>
                </div>
            </div>
        </a>

        {{-- Nieuwsitems beheer kaart --}}
        <a href="{{ route('admin.nieuwsitems.index') }}" class="group block bg-white rounded-2xl shadow-lg p-8 transform hover:-translate-y-2 hover:shadow-2xl transition-all duration-300">
            <div class="flex items-center space-x-4">
                <div class="p-4 bg-green-100 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V7a2 2 0 012-2h4l2-2h4a2 2 0 012 2v2m0 0h2a2 2 0 012 2v9a2 2 0 01-2 2h-2m-6 0v-6m0 0H7m6 0h6" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-2xl font-semibold text-gray-800 group-hover:text-green-700">Nieuwsitems beheer</h2>
                    <p class="text-gray-600 mt-2 group-hover:text-gray-800">Nieuwsartikelen toevoegen, bewerken of verwijderen.</p>
                </div>
            </div>
        </a>

            </div>
        </a>
    </div>
</div>
@endsection
