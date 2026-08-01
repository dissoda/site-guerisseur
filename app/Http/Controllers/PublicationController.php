<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use Illuminate\View\View;

class PublicationController extends Controller
{
    public function index(): View
    {
        $publications = Publication::publiees()
            ->latest('publie_le')
            ->paginate(9);

        return view('publications.index', [
            'publications' => $publications,
        ]);
    }

    public function show(Publication $publication): View
    {
        abort_unless($publication->statut === 'publie', 404);

        return view('publications.show', [
            'publication' => $publication,
        ]);
    }
}