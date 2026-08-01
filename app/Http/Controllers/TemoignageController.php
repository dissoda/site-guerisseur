<?php

namespace App\Http\Controllers;

use App\Models\Temoignage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TemoignageController extends Controller
{
    public function index(): View
    {
        $temoignages = Temoignage::publies()->latest()->get();

        return view('temoignages.index', [
            'temoignages' => $temoignages,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $donnees = $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'texte' => ['required', 'string', 'max:2000'],
        ]);

        Temoignage::create([
            'nom' => $donnees['nom'],
            'texte' => $donnees['texte'],
            'statut' => 'en_attente',
        ]);

        return redirect()
            ->route('temoignages.index')
            ->with('succes', __('temoignages.confirmation'));
    }
}