@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-12">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Gebruikers</h1>
        <a href="{{ route('admin.users.create') }}" class="bg-blue-500 text-gray-900 px-4 py-2 rounded shadow hover:bg-blue-600 hover:text-gray-100 transition">Nieuwe gebruiker</a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-6 shadow">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($users as $user)
        <div class="bg-white shadow rounded-lg p-6 hover:shadow-lg transition">
            <div class="mb-4">
                <h2 class="text-xl font-semibold text-gray-900">{{ $user->name }}</h2>
                <p class="text-gray-700">{{ $user->email }}</p>
                <p class="mt-1 text-sm font-medium text-gray-800">Admin: {{ $user->is_admin ? 'Ja' : 'Nee' }}</p>
            </div>
            <div class="flex justify-between mt-4">
                <a href="{{ route('admin.users.edit', $user) }}" class="bg-yellow-500 text-gray-900 px-3 py-1 rounded hover:bg-yellow-600 hover:text-gray-100 transition">Bewerk</a>
                <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-gray-900 px-3 py-1 rounded hover:bg-red-600 hover:text-gray-100 transition" onclick="return confirm('Weet je zeker dat je deze gebruiker wilt verwijderen?')">Verwijder</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
