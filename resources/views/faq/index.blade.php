@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-12">
    <h1 class="text-4xl font-extrabold mb-10 text-center text-indigo-900">Veelgestelde Vragen</h1>

    <div class="grid gap-8 md:grid-cols-2">
        @foreach($categorieen as $categorie)
            <div class="bg-indigo-50 rounded-xl shadow-lg p-6 hover:shadow-2xl transition duration-300">
                <h2 class="text-2xl font-semibold mb-4 text-indigo-700 border-b-2 border-indigo-200 pb-2">{{ $categorie->naam }}</h2>
                <div class="space-y-4">
                    @foreach($categorie->vragen as $vraag)
                        <div class="bg-white rounded-lg p-4 shadow-sm hover:shadow-md transition duration-200">
                            <h3 class="text-lg font-bold text-gray-800 mb-2">{{ $vraag->vraag }}</h3>
                            <p class="text-gray-700">{{ $vraag->antwoord }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
