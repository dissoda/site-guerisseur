@extends('layouts.public')

@section('titre', __('nav.demande') . ' — ' . config('app.name'))

@section('content')
    <div class="mx-auto max-w-2xl px-6 py-16">
        <h1 class="font-display text-3xl sm:text-4xl text-brun mb-2">{{ __('nav.demande') }}</h1>
        <p class="text-brun/60 mb-10">{{ __('demande.intro') }}</p>

        @if ($errors->any())
            <div class="mb-6 rounded-sm border border-argile/30 bg-argile/10 p-4 text-sm text-argile">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $erreur)
                        <li>{{ $erreur }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('demande.store') }}" class="space-y-6 rounded-sm border border-brun/15 bg-white/60 p-6 sm:p-8">
            @csrf

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-brun/80 mb-1.5">{{ __('demande.champ_nom') }}</label>
                    <input type="text" name="nom" value="{{ old('nom') }}" class="w-full rounded-sm border border-brun/20 bg-white px-3 py-2.5 focus:border-mousse focus:outline-none">
                </div>

                <div>
                    <label class="block text-sm font-medium text-brun/80 mb-1.5">{{ __('demande.champ_email') }}</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="w-full rounded-sm border border-brun/20 bg-white px-3 py-2.5 focus:border-mousse focus:outline-none">
                </div>

                <div>
                    <label class="block text-sm font-medium text-brun/80 mb-1.5">{{ __('demande.champ_telephone') }}</label>
                    <input type="text" name="telephone" value="{{ old('telephone') }}" class="w-full rounded-sm border border-brun/20 bg-white px-3 py-2.5 focus:border-mousse focus:outline-none">
                </div>

                <div>
                    <label class="block text-sm font-medium text-brun/80 mb-1.5">{{ __('demande.champ_pays') }}</label>
                    <input type="text" name="pays" value="{{ old('pays') }}" class="w-full rounded-sm border border-brun/20 bg-white px-3 py-2.5 focus:border-mousse focus:outline-none">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-brun/80 mb-1.5">{{ __('demande.champ_service') }}</label>
                <select name="service_id" class="w-full rounded-sm border border-brun/20 bg-white px-3 py-2.5 focus:border-mousse focus:outline-none">
                    <option value="">{{ __('demande.champ_service_placeholder') }}</option>
                    @foreach($services as $service)
                        <option value="{{ $service->id }}" @selected(old('service_id', $serviceSelectionne ? null : '') == $service->id || $service->slug === $serviceSelectionne)>{{ $service->nom }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-brun/80 mb-1.5">{{ __('demande.champ_description') }}</label>
                <textarea name="description_besoin" rows="6" class="w-full rounded-sm border border-brun/20 bg-white px-3 py-2.5 focus:border-mousse focus:outline-none">{{ old('description_besoin') }}</textarea>
            </div>

            <button type="submit" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 rounded-full bg-mousse px-8 py-3.5 text-sable font-medium hover:bg-foret transition">
                {{ __('demande.envoyer') }}
                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/>
                </svg>
            </button>
        </form>
    </div>
@endsection