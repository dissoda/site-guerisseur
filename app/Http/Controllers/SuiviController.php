<?php

namespace App\Http\Controllers;

use App\Mail\RetrouverSuiviMail;
use App\Models\Client;
use App\Models\Dossier;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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

    public function retrouverForm(): View
    {
        return view('suivi.retrouver');
    }

    public function retrouverEnvoyer(Request $request): RedirectResponse
    {
        $donnees = $request->validate([
            'email' => ['required', 'email'],
        ]);

        $client = Client::where('email', $donnees['email'])->first();

        if ($client) {
            Mail::to($client->email)
                ->locale($client->langue ?? 'fr')
                ->send(new RetrouverSuiviMail($client));
        }

        return redirect()
            ->route('suivi.retrouver')
            ->with('succes', __('suivi.retrouver_confirmation'));
    }
}