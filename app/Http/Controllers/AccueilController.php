<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use App\Models\Service;
use App\Models\Temoignage;
use Illuminate\View\View;

class AccueilController extends Controller
{
    public function index(): View
    {
        $services = Service::where('actif', true)->take(3)->get();
        $publications = Publication::publiees()->latest('publie_le')->take(3)->get();
        $temoignages = Temoignage::publies()->latest()->take(3)->get();

        return view('accueil', [
            'services' => $services,
            'publications' => $publications,
            'temoignages' => $temoignages,
        ]);
    }
}