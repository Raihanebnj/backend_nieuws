<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Lijst van alle gebruikers
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    // Formulier om gebruiker toe te voegen
    public function create()
    {
        return view('admin.users.create');
    }

    // Opslaan van nieuwe gebruiker
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => $request->has('is_admin'),
        ]);

        return redirect()->route('admin.users.index')->with('success', 'Gebruiker aangemaakt!');
    }

    // Formulier om gebruiker te bewerken
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    // Opslaan bewerkte gebruiker
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->is_admin = $request->has('is_admin');
        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'Gebruiker bijgewerkt!');
    }

    // Verwijderen van gebruiker
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'Gebruiker verwijderd!');
    }
}
