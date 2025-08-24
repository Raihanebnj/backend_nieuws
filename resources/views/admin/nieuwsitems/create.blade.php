@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto py-12">
    <h1 class="text-4xl font-bold text-gray-900 mb-8">Nieuw Nieuwsitem</h1>

    <form action="{{ route('admin.nieuwsitems.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div>
            <label class="block text-gray-900 font-semibold mb-1">Titel</label>
            <input type="text" name="titel" class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-blue-400" value="{{ old('titel') }}" required>
        </div>

        <div>
            <label class="block text-gray-900 font-semibold mb-1">Inhoud</label>
            <textarea name="content" rows="6" class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-blue-400" required>{{ old('content') }}</textarea>
        </div>

        <div>
            <label class="block text-gray-900 font-semibold mb-1">Afbeelding</label>
            <input type="file" name="afbeelding" accept="image/*" class="w-full">
        </div>

        <div>
            <label class="block text-gray-900 font-semibold mb-1">Publicatiedatum</label>
            <input type="date" name="publicatiedatum" class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-blue-400" value="{{ old('publicatiedatum', now()->format('Y-m-d')) }}" required>
        </div>

        <button type="submit" class="bg-blue-600 text-gray-900 font-bold px-6 py-3 rounded hover:bg-blue-700 transition duration-300 shadow-lg">
            Opslaan
        </button>
    </form>
</div>
@endsection
