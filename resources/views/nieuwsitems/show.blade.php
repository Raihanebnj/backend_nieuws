@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto p-6 bg-white rounded-lg shadow-md mt-10">

    {{-- Nieuwsitem Titel --}}
    <h2 class="text-3xl font-bold mb-6">{{ $nieuwsitem->titel }}</h2>

    {{-- Afbeelding --}}
    @if($nieuwsitem->afbeelding)
        <img src="{{ asset('storage/' . $nieuwsitem->afbeelding) }}" 
             alt="{{ $nieuwsitem->titel }}" 
             class="w-full h-auto rounded mb-6 object-cover">
    @endif

    {{-- Content --}}
    <div class="prose max-w-none mb-6">
        {!! nl2br(e($nieuwsitem->content)) !!}
    </div>

    {{-- Publicatiedatum --}}
    <p class="text-gray-500 text-sm">
        Gepubliceerd op {{ \Carbon\Carbon::parse($nieuwsitem->publicatiedatum)->format('d-m-Y') }}
    </p>
</div>
@endsection
