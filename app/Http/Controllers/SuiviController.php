<?php

namespace App\Http\Controllers;

use App\Models\Dossier;
use Illuminate\View\View;

class SuiviController extends Controller
{
    public function show(string $token): View
    {
        $dossier = Dossier::viaToken($token)
            ->with(['client', 'service', 'ritualsPrescrits.paiement'])
            ->firstOrFail();

        return view('suivi.show', [
            'dossier' => $dossier,
        ]);
    }
}