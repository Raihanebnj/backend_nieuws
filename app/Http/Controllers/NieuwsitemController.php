<?php

namespace App\Http\Controllers;

use App\Models\Nieuwsitem;
use Illuminate\Http\Request;

class NieuwsitemController extends Controller
{
    public function index()
    {
        $nieuwsitems = Nieuwsitem::orderBy('publicatiedatum', 'desc')
            ->paginate(10);

        return view('nieuwsitems.index', compact('nieuwsitems'));
    }

    public function show(Nieuwsitem $nieuwsitem)
    {
        return view('nieuwsitems.show', compact('nieuwsitem'));
    }
}
