@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto py-12">
    <h1 class="text-4xl font-extrabold text-gray-900 mb-8 text-center">Bewerk Nieuwsitem</h1>

    <form action="{{ route('admin.nieuwsitems.update', $nieuwsitem) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

    
        <div>
            <label class="block text-gray-900 font-semibold mb-2 text-lg">Titel</label>
            <input type="text" name="titel" value="{{ old('titel', $nieuwsitem->titel) }}" required
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-yellow-300 focus:outline-none text-gray-900">
        </div>

        <div>
            <label class="block text-gray-900 font-semibold mb-2 text-lg">Inhoud</label>
            <textarea name="content" rows="5" required
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-yellow-300 focus:outline-none text-gray-900">{{ old('content', $nieuwsitem->content) }}</textarea>
        </div>

        <div>
            <label class="block text-gray-900 font-semibold mb-2 text-lg">Afbeelding</label>
            @if($nieuwsitem->afbeelding)
                <img src="{{ asset('storage/'.$nieuwsitem->afbeelding) }}" alt="Afbeelding"
                    class="mb-2 w-36 h-auto rounded-lg border border-gray-200 shadow-sm">
            @endif
            <input type="file" name="afbeelding" accept="image/*"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-yellow-300 focus:outline-none text-gray-900">
        </div>

        <div>
            <label class="block text-gray-900 font-semibold mb-2 text-lg">Publicatiedatum</label>
            <input type="date" name="publicatiedatum"
                value="{{ old('publicatiedatum', $nieuwsitem->publicatiedatum->format('Y-m-d')) }}" required
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-yellow-300 focus:outline-none text-gray-900">
        </div>


        <div class="flex justify-center">
            <button type="submit"
                class="bg-gradient-to-r from-yellow-400 to-yellow-500 hover:from-yellow-500 hover:to-yellow-600 text-gray-900 font-bold px-10 py-4 rounded-3xl shadow-lg transform hover:scale-105 transition duration-300">
                Opslaan
            </button>
        </div>
    </form>
</div>
@endsection
