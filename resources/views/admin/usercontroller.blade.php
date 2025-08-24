<x-admin-layout>
    <h1 class="text-2xl font-bold mb-4">Gebruikers Beheer</h1>

    <table class="w-full border">
        <thead>
            <tr>
                <th class="border px-2 py-1">Naam</th>
                <th class="border px-2 py-1">Email</th>
                <th class="border px-2 py-1">Acties</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td class="border px-2 py-1">{{ $user->name }}</td>
                    <td class="border px-2 py-1">{{ $user->email }}</td>
                    <td class="border px-2 py-1">
                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Verwijder</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-admin-layout>
