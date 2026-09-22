@extends('layouts.public')

@section('titre', __('nav.temoignages') . ' — ' . config('app.name'))

@section('content')
    <div class="mx-auto max-w-2xl px-6 py-16">
        <h1 class="font-display text-3xl sm:text-4xl text-brun mb-10">{{ __('nav.temoignages') }}</h1>

        @if (session('succes'))
            <div class="mb-8 rounded-sm border border-mousse/30 bg-mousse/10 p-4 text-sm text-foret flex items-start gap-3">
                <svg class="w-5 h-5 shrink-0 text-mousse mt-0.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/>
                </svg>
                {{ session('succes') }}
            </div>
        @endif

        <div class="space-y-5 mb-16">
            @forelse ($temoignages as $temoignage)
                <div class="rounded-sm border border-brun/15 bg-white/60 p-6">
                    <svg class="w-6 h-6 text-ocre mb-3" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M7.5 6C4.5 6 3 8.5 3 11.5c0 2.5 1.7 4.5 4 4.5.3 2-1 3.5-3 4v1c3.5-.3 6-2.7 6-6.5V11c0-3-1-5-2.5-5Zm10 0C14.5 6 13 8.5 13 11.5c0 2.5 1.7 4.5 4 4.5.3 2-1 3.5-3 4v1c3.5-.3 6-2.7 6-6.5V11c0-3-1-5-2.5-5Z"/>
                    </svg>
                    <p class="text-brun/80 mb-3 leading-relaxed">{{ $temoignage->texte }}</p>
                    <p class="text-sm font-medium text-brun font-display">{{ $temoignage->nom }}</p>
                </div>
            @empty
                <p class="text-brun/50">{{ __('temoignages.aucun') }}</p>
            @endforelse
        </div>

        @include('partials.separateur')

        <div class="rounded-sm border border-brun/15 bg-white/60 p-6 sm:p-8">
            <h2 class="font-display text-xl text-brun mb-5">{{ __('temoignages.ajouter_titre') }}</h2>

            @if ($errors->any())
                <div class="mb-5 rounded-sm border border-argile/30 bg-argile/10 p-4 text-sm text-argile">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $erreur)
                            <li>{{ $erreur }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('temoignages.store') }}" class="space-y-4">
                @csrf

                <div>
                    <label class="block text-sm font-medium text-brun/80 mb-1.5">{{ __('temoignages.champ_nom') }}</label>
                    <input type="text" name="nom" value="{{ old('nom') }}" class="w-full rounded-sm border border-brun/20 bg-white px-3 py-2.5 focus:border-mousse focus:outline-none">
                </div>

                <div>
                    <label class="block text-sm font-medium text-brun/80 mb-1.5">{{ __('temoignages.champ_texte') }}</label>
                    <textarea name="texte" rows="4" class="w-full rounded-sm border border-brun/20 bg-white px-3 py-2.5 focus:border-mousse focus:outline-none">{{ old('texte') }}</textarea>
                </div>

                <button type="submit" class="rounded-full bg-mousse px-6 py-3 text-sable font-medium hover:bg-foret transition">
                    {{ __('temoignages.envoyer') }}
                </button>
            </form>
        </div>
    </div>
@endsection