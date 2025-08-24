@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-12">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Nieuwsitems</h1>
        <a href="{{ route('admin.nieuwsitems.create') }}" class="bg-blue-500 text-gray-900 px-4 py-2 rounded shadow hover:bg-blue-600 hover:text-gray-100 transition">Nieuw nieuwsitem</a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-6 shadow">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($nieuwsitems as $nieuws)
        <div class="bg-white shadow rounded-lg p-6 hover:shadow-lg transition">
            @if($nieuws->afbeelding)
                <img src="{{ asset('storage/'.$nieuws->afbeelding) }}" alt="Afbeelding" class="mb-4 w-full h-48 object-cover rounded">
            @endif
            <h2 class="text-xl font-bold text-gray-900 mb-2">{{ $nieuws->titel }}</h2>
            <p class="text-gray-800 mb-4">{{ \Illuminate\Support\Str::limit($nieuws->content, 100) }}</p>
            <div class="flex justify-end space-x-2">
                <a href="{{ route('admin.nieuwsitems.edit', $nieuws) }}" class="bg-yellow-500 text-gray-900 px-3 py-1 rounded hover:bg-yellow-600 hover:text-gray-100 transition">Bewerk</a>
                <form action="{{ route('admin.nieuwsitems.destroy', $nieuws) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-gray-900 px-3 py-1 rounded hover:bg-red-600 hover:text-gray-100 transition" onclick="return confirm('Weet je zeker dat je dit nieuwsitem wilt verwijderen?')">Verwijder</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>

    <div class="mt-6">
        {{ $nieuwsitems->links() }}
    </div>
</div>
@endsection
