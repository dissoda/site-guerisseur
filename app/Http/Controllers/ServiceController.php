<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\View\View;

class ServiceController extends Controller
{
    public function index(): View
    {
        $services = Service::where('actif', true)->get();

        return view('services.index', [
            'services' => $services,
        ]);
    }

    public function show(Service $service): View
    {
        abort_unless($service->actif, 404);

        return view('services.show', [
            'service' => $service,
        ]);
    }
}