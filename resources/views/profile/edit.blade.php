@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-12 max-w-2xl">
    <div class="bg-gradient-to-r from-pink-50 via-yellow-50 to-indigo-50 rounded-2xl shadow-xl p-10">
        <h1 class="text-3xl font-extrabold text-indigo-900 mb-6 text-center">Profiel bewerken</h1>

        @if(session('status'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-lg">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('POST')

            {{-- Profielfoto --}}
            <div class="flex flex-col items-center">
                @if($user->profielfoto)
                    <img src="{{ asset('storage/' . $user->profielfoto) }}" 
                         alt="Profielfoto" 
                         class="w-32 h-32 rounded-full object-cover mb-4 shadow-md">
                @endif
                <label class="cursor-pointer bg-indigo-200 hover:bg-indigo-300 text-gray-900 font-semibold py-2 px-4 rounded-full transition duration-300">
                    Kies profielfoto
                    <input id="profielfoto" type="file" name="profielfoto" class="hidden" accept="image/*">
                </label>
                @error('profielfoto')
                    <p class="text-red-600 mt-2">{{ $message }}</p>
                @enderror
            </div>

            {{-- Gebruikersnaam --}}
            <div class="flex flex-col">
                <label for="username" class="font-semibold text-gray-800 mb-2">Gebruikersnaam</label>
                <input id="username" type="text" name="username" value="{{ old('username', $user->username) }}" 
                       class="border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-indigo-400 @error('username') border-red-500 @enderror" required>
                @error('username')
                    <p class="text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Email --}}
            <div class="flex flex-col">
                <label for="email" class="font-semibold text-gray-800 mb-2">E-mail</label>
                <input id="email" type="email" name="email" value="{{ old('email', $user->email) }}" 
                       class="border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-indigo-400 @error('email') border-red-500 @enderror" required>
                @error('email')
                    <p class="text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Bio --}}
            <div class="flex flex-col">
                <label for="over_mij" class="font-semibold text-gray-800 mb-2">Bio</label>
                <textarea id="over_mij" name="over_mij" rows="4" 
                          class="border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-indigo-400 @error('over_mij') border-red-500 @enderror">{{ old('over_mij', $user->over_mij) }}</textarea>
                @error('over_mij')
                    <p class="text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Opslaan knop --}}
            <div class="flex justify-center">
                <button type="submit" 
                        class="bg-indigo-200 hover:bg-indigo-300 text-gray-900 font-semibold py-3 px-8 rounded-full shadow-lg transition duration-300">
                    Opslaan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
