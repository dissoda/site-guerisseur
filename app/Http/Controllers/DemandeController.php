<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Dossier;
use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DemandeController extends Controller
{
    public function create(Request $request): View
    {
        $services = Service::where('actif', true)->get();

        $serviceSelectionne = $request->query('service');

        return view('demande.create', [
            'services' => $services,
            'serviceSelectionne' => $serviceSelectionne,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $donnees = $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'telephone' => ['required', 'string', 'max:50'],
            'pays' => ['required', 'string', 'max:255'],
            'service_id' => ['required', 'exists:services,id'],
            'description_besoin' => ['required', 'string', 'max:5000'],
        ]);

        $client = Client::firstOrCreate(
            ['email' => $donnees['email']],
            [
                'nom' => $donnees['nom'],
                'telephone' => $donnees['telephone'],
                'pays' => $donnees['pays'],
                'langue' => app()->getLocale(),
            ]
        );

        $dossier = Dossier::create([
            'client_id' => $client->id,
            'service_id' => $donnees['service_id'],
            'description_besoin' => $donnees['description_besoin'],
            'statut' => 'nouveau',
        ]);

        return redirect()
            ->route('suivi.show', $dossier->token)
            ->with('succes', __('demande.confirmation'));
    }
}