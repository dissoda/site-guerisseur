@extends('layouts.public')

@section('titre', __('suivi.titre') . ' — ' . config('app.name'))

@section('content')
    <div class="mx-auto max-w-2xl px-6 py-16">

        @if (session('succes'))
            <div class="mb-8 rounded-sm border border-mousse/30 bg-mousse/10 p-4 text-sm text-foret flex items-start gap-3">
                <svg class="w-5 h-5 shrink-0 text-mousse mt-0.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/>
                </svg>
                {{ session('succes') }}
            </div>
        @endif

        <h1 class="font-display text-3xl sm:text-4xl text-brun mb-1">{{ __('suivi.titre') }}</h1>
        <p class="text-brun/60 mb-10">{{ $dossier->service->nom }}</p>

        <div class="rounded-sm border border-brun/15 bg-white/60 p-6 mb-10">
            <p class="text-xs font-mono uppercase tracking-wide text-mousse mb-1">{{ __('suivi.statut_dossier') }}</p>
            <p class="text-lg font-display text-brun">{{ __('suivi.statuts_dossier.' . $dossier->statut) }}</p>
        </div>

        @if ($dossier->ritualsPrescrits->isEmpty())
            <p class="text-brun/60">{{ __('suivi.aucune_etape') }}</p>
        @else
            <h2 class="font-display text-xl text-brun mb-5">{{ __('suivi.etapes') }}</h2>

            <div class="space-y-4">
                @foreach ($dossier->ritualsPrescrits as $rituel)
                    <div class="rounded-sm border border-brun/15 bg-white/60 p-6">
                        <div class="flex items-center justify-between mb-2">
                            <span class="font-medium text-brun">
                                {{ __('suivi.statuts_rituel.' . $rituel->statut) }}
                            </span>
                            @if ($rituel->montant_total > 0)
                                <span class="text-sm font-mono text-brun/60">
                                    {{ number_format($rituel->montant_total, 2) }} FCFA
                                </span>
                            @endif
                        </div>

                        @if ($rituel->paiement)
                            <p class="text-sm text-brun/60">
                                {{ __('suivi.statut_paiement') }} :
                                {{ __('suivi.statuts_paiement.' . $rituel->paiement->statut) }}
                            </p>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif

    </div>
@endsection