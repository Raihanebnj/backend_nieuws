@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto py-12">
    <h1 class="text-3xl font-bold mb-6 text-gray-900">Gebruiker bewerken</h1>

    <form action="{{ route('admin.users.update', $user) }}" method="POST" class="space-y-4 bg-gray-100 p-6 rounded shadow">
        @csrf
        @method('PUT')
        <div>
            <label class="block text-gray-800">Naam</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full border p-2 rounded" required>
        </div>
        <div>
            <label class="block text-gray-800">Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="w-full border p-2 rounded" required>
        </div>
        <div>
            <label class="block text-gray-800">Wachtwoord (laat leeg om niet te veranderen)</label>
            <input type="password" name="password" class="w-full border p-2 rounded">
        </div>
        <div>
            <label class="block text-gray-800">Bevestig wachtwoord</label>
            <input type="password" name="password_confirmation" class="w-full border p-2 rounded">
        </div>
        <div class="flex items-center space-x-2">
            <input type="checkbox" name="is_admin" id="is_admin" value="1" {{ old('is_admin', $user->is_admin) ? 'checked' : '' }}>
            <label for="is_admin" class="text-gray-800">Admin rechten</label>
        </div>
        <button type="submit" class="bg-green-500 text-gray-900 px-4 py-2 rounded hover:bg-green-600">Opslaan</button>
    </form>
</div>
@endsection
