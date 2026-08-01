@extends('layouts.public')

@section('titre', __('nav.demande') . ' — ' . config('app.name'))

@section('content')
    <div class="mx-auto max-w-2xl px-6 py-16">
        <h1 class="text-3xl font-semibold text-stone-900 mb-2">{{ __('nav.demande') }}</h1>
        <p class="text-stone-600 mb-10">{{ __('demande.intro') }}</p>

        @if ($errors->any())
            <div class="mb-6 rounded-md border border-red-200 bg-red-50 p-4 text-sm text-red-700">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $erreur)
                        <li>{{ $erreur }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('demande.store') }}" class="space-y-6">
            @csrf

            <div>
                <label class="block text-sm font-medium text-stone-700 mb-1">{{ __('demande.champ_nom') }}</label>
                <input type="text" name="nom" value="{{ old('nom') }}" class="w-full rounded-md border border-stone-300 px-3 py-2">
            </div>

            <div>
                <label class="block text-sm font-medium text-stone-700 mb-1">{{ __('demande.champ_email') }}</label>
                <input type="email" name="email" value="{{ old('email') }}" class="w-full rounded-md border border-stone-300 px-3 py-2">
            </div>

            <div>
                <label class="block text-sm font-medium text-stone-700 mb-1">{{ __('demande.champ_telephone') }}</label>
                <input type="text" name="telephone" value="{{ old('telephone') }}" class="w-full rounded-md border border-stone-300 px-3 py-2">
            </div>

            <div>
                <label class="block text-sm font-medium text-stone-700 mb-1">{{ __('demande.champ_pays') }}</label>
                <input type="text" name="pays" value="{{ old('pays') }}" class="w-full rounded-md border border-stone-300 px-3 py-2">
            </div>

            <div>
                <label class="block text-sm font-medium text-stone-700 mb-1">{{ __('demande.champ_service') }}</label>
                <select name="service_id" class="w-full rounded-md border border-stone-300 px-3 py-2">
                    <option value="">{{ __('demande.champ_service_placeholder') }}</option>
                    @foreach($services as $service)
                        <option value="{{ $service->id }}" @selected(old('service_id', $serviceSelectionne ? null : '') == $service->id || $service->slug === $serviceSelectionne)>{{ $service->nom }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-stone-700 mb-1">{{ __('demande.champ_description') }}</label>
                <textarea name="description_besoin" rows="6" class="w-full rounded-md border border-stone-300 px-3 py-2">{{ old('description_besoin') }}</textarea>
            </div>

            <button type="submit" class="rounded-md bg-stone-900 px-6 py-3 text-white hover:bg-stone-700">{{ __('demande.envoyer') }}</button>
        </form>
    </div>
@endsection