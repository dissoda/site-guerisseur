@extends('layouts.public')

@section('titre', __('suivi.titre') . ' — ' . config('app.name'))

@section('content')
    <div class="mx-auto max-w-2xl px-6 py-16">

        @if (session('succes'))
            <div class="mb-8 rounded-md border border-green-200 bg-green-50 p-4 text-sm text-green-800">
                {{ session('succes') }}
            </div>
        @endif

        <h1 class="text-3xl font-semibold text-stone-900 mb-1">{{ __('suivi.titre') }}</h1>
        <p class="text-stone-600 mb-10">{{ $dossier->service->nom }}</p>

        <div class="rounded-lg border border-stone-200 bg-white p-6 mb-8">
            <p class="text-sm text-stone-500 mb-1">{{ __('suivi.statut_dossier') }}</p>
            <p class="text-lg font-medium text-stone-900">{{ __('suivi.statuts_dossier.' . $dossier->statut) }}</p>
        </div>

        @if ($dossier->ritualsPrescrits->isEmpty())
            <p class="text-stone-600">{{ __('suivi.aucune_etape') }}</p>
        @else
            <h2 class="text-xl font-semibold text-stone-900 mb-4">{{ __('suivi.etapes') }}</h2>

            <div class="space-y-4">
                @foreach ($dossier->ritualsPrescrits as $rituel)
                    <div class="rounded-lg border border-stone-200 bg-white p-6">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-sm font-medium text-stone-900">
                                {{ __('suivi.statuts_rituel.' . $rituel->statut) }}
                            </span>
                            @if ($rituel->montant_total > 0)
                                <span class="text-sm text-stone-500">
                                    {{ number_format($rituel->montant_total, 2) }} FCFA
                                </span>
                            @endif
                        </div>

                        @if ($rituel->paiement)
                            <p class="text-sm text-stone-500">
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