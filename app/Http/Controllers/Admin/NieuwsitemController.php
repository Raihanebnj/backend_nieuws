<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Nieuwsitem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NieuwsitemController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function index()
    {
        $nieuwsitems = Nieuwsitem::latest('publicatiedatum')->paginate(10);
        return view('admin.nieuwsitems.index', compact('nieuwsitems'));
    }

    public function create()
    {
        return view('admin.nieuwsitems.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titel' => 'required|string|max:255',
            'content' => 'required|string',
            'afbeelding' => 'nullable|image|max:2048',
            'publicatiedatum' => 'required|date',
        ]);

        if ($request->hasFile('afbeelding')) {
            $validated['afbeelding'] = $request->file('afbeelding')->store('nieuwsitems', 'public');
        }

        Nieuwsitem::create($validated);

        return redirect()->route('admin.nieuwsitems.index')->with('success', 'Nieuwsitem succesvol aangemaakt.');
    }

    public function edit(Nieuwsitem $nieuwsitem)
    {
        return view('admin.nieuwsitems.edit', compact('nieuwsitem'));
    }

    public function update(Request $request, Nieuwsitem $nieuwsitem)
    {
        $validated = $request->validate([
            'titel' => 'required|string|max:255',
            'content' => 'required|string',
            'afbeelding' => 'nullable|image|max:2048',
            'publicatiedatum' => 'required|date',
        ]);

        if ($request->hasFile('afbeelding')) {
            if ($nieuwsitem->afbeelding) {
                Storage::disk('public')->delete($nieuwsitem->afbeelding);
            }
            $validated['afbeelding'] = $request->file('afbeelding')->store('nieuwsitems', 'public');
        }

        $nieuwsitem->update($validated);

        return redirect()->route('admin.nieuwsitems.index')->with('success', 'Nieuwsitem succesvol bijgewerkt.');
    }

    public function destroy(Nieuwsitem $nieuwsitem)
    {
        if ($nieuwsitem->afbeelding) {
            Storage::disk('public')->delete($nieuwsitem->afbeelding);
        }

        $nieuwsitem->delete();

        return redirect()->route('admin.nieuwsitems.index')->with('success', 'Nieuwsitem verwijderd.');
    }
}
