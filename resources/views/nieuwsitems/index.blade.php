@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-12 px-4 space-y-12">

    @foreach($nieuwsitems as $item)
        <div class="bg-gradient-to-r from-purple-100 via-pink-50 to-yellow-50 rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition duration-300">
            <div class="md:flex md:items-center p-6 space-y-4 md:space-y-0 md:space-x-6">
                
                {{-- Tekst links --}}
                <div class="md:flex-1">
                    <h3 class="text-2xl font-bold mb-2 text-indigo-900">{{ $item->titel }}</h3>
                    <p class="text-gray-700 mb-2 text-sm">{{ $item->publicatiedatum ? $item->publicatiedatum->format('d-m-Y') : 'Datum onbekend' }}</p>
                    <p class="text-gray-800 mb-4">{{ \Illuminate\Support\Str::limit(strip_tags($item->content), 150) }}</p>
                    <a href="{{ route('nieuwsitems.show', $item) }}" 
                       class="inline-block bg-indigo-500 hover:bg-indigo-600 text-gray-100 font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300">
                        Lees meer →
                    </a>
                </div>

                {{-- Vierkante foto rechts --}}
                <div class="md:w-48 flex-shrink-0 flex items-center justify-center">
                    <div class="w-48 h-48 rounded-lg overflow-hidden shadow-md bg-gray-100">
                        <img src="{{ $item->afbeelding ? asset('storage/' . $item->afbeelding) : asset('images/fallback.jpg') }}" 
                             alt="{{ $item->titel }}" 
                             class="w-full h-full object-contain object-center">
                    </div>
                </div>

            </div>
        </div>
    @endforeach

    {{-- Paginatie --}}
    @if ($nieuwsitems->hasPages())
        <div class="mt-8 flex justify-center">
            {{ $nieuwsitems->links() }}
        </div>
    @endif
</div>
@endsection
