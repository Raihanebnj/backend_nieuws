@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-12 max-w-3xl">

    <div class="bg-gradient-to-r from-pink-50 via-yellow-50 to-indigo-50 rounded-2xl shadow-xl p-10">
        <h1 class="text-4xl font-extrabold mb-6 text-indigo-900 text-center">Contacteer ons</h1>
        <p class="text-gray-700 mb-8 text-center">Heb je vragen, opmerkingen of nieuws om te delen? Vul onderstaand formulier in en wij nemen zo snel mogelijk contact met je op.</p>

        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
            @csrf

            <div class="flex flex-col">
                <label for="naam" class="font-semibold text-gray-800 mb-2">Naam</label>
                <input type="text" name="naam" id="naam" value="{{ old('naam') }}" 
                       class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-indigo-400">
                @error('naam')
                    <p class="text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-col">
                <label for="email" class="font-semibold text-gray-800 mb-2">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" 
                       class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-indigo-400">
                @error('email')
                    <p class="text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-col">
                <label for="bericht" class="font-semibold text-gray-800 mb-2">Bericht</label>
                <textarea name="bericht" id="bericht" rows="6" 
                          class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-indigo-400">{{ old('bericht') }}</textarea>
                @error('bericht')
                    <p class="text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-center">
                <button type="submit" 
                        class="bg-indigo-200 hover:bg-indigo-300 text-gray-900 font-semibold py-3 px-8 rounded-full shadow-lg transition duration-300">
                    Verstuur
                </button>
            </div>
        </form>
    </div>

</div>
@endsection
