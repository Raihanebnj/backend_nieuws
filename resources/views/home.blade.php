@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-12">

    {{-- Hero / Top Uitgelicht Nieuws --}}
    @if($uitgelicht = $nieuwsitems->first())
    <div class="relative bg-gradient-to-r from-pink-200 via-purple-200 to-indigo-200 rounded-xl shadow-2xl mb-12 overflow-hidden">
        <div class="p-10 md:flex md:items-center md:justify-between">
            <div class="md:w-2/3">
                <h1 class="text-4xl md:text-5xl font-extrabold mb-4 text-gray-900">{{ $uitgelicht->titel }}</h1>
                <p class="text-lg mb-4 text-gray-800">{{ \Illuminate\Support\Str::limit(strip_tags($uitgelicht->content), 220) }}</p>
                <a href="{{ route('nieuwsitems.show', $uitgelicht) }}" 
                   class="bg-pink-500 hover:bg-pink-600 text-gray-100 font-semibold py-3 px-7 rounded-lg shadow transition duration-300">
                    Lees verder →
                </a>
            </div>
        </div>
    </div>
    @endif

    {{-- Laatste Nieuws Sectie --}}
    <h2 class="text-3xl font-bold mb-6 text-indigo-900">Laatste Nieuws</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
        @foreach($nieuwsitems->skip(1) as $item)
        <div class="bg-gradient-to-br from-indigo-50 to-purple-50 rounded-lg p-6 shadow-lg hover:shadow-2xl transition duration-300">
            <h3 class="text-xl font-bold text-purple-800 mb-2">{{ $item->titel }}</h3>
            <p class="text-sm text-gray-600 mb-2">{{ $item->publicatiedatum ? $item->publicatiedatum->format('d-m-Y') : 'Datum onbekend' }}</p>
            <p class="text-gray-700 mb-4">{{ \Illuminate\Support\Str::limit(strip_tags($item->content), 150) }}</p>
            <a href="{{ route('nieuwsitems.show', $item) }}" 
               class="inline-block bg-pink-500 hover:bg-pink-600 text-gray-100 font-medium py-2 px-4 rounded transition duration-300">
                Lees verder →
            </a>
        </div>
        @endforeach
    </div>

    {{-- Kort Nieuws / Highlights --}}
    <h2 class="text-3xl font-bold mb-6 text-indigo-900">Kort Nieuws</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-12">
        @foreach($nieuwsitems->take(6) as $item)
        <div class="bg-indigo-50 border-l-4 border-indigo-400 p-4 rounded-lg hover:bg-indigo-100 transition duration-300">
            <h4 class="text-lg font-semibold text-indigo-800 mb-1">{{ $item->titel }}</h4>
            <p class="text-sm text-gray-700">{{ \Illuminate\Support\Str::limit(strip_tags($item->content), 80) }}</p>
        </div>
        @endforeach
    </div>

    

    {{-- Paginatie --}}
    @if ($nieuwsitems->hasPages())
        <div class="flex justify-center">
            {{ $nieuwsitems->links() }}
        </div>
    @endif

</div>
@endsection
