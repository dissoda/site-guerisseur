@extends('layouts.public')

@section('titre', config('app.name'))

@section('content')

    <section class="relative bg-foret text-sable overflow-hidden">
        <svg class="absolute -right-24 -top-24 w-[500px] h-[500px] text-sable/5" viewBox="0 0 200 200" fill="none" stroke="currentColor" stroke-width="1">
            <path d="M100 190V70M100 70C70 70 50 50 50 20M100 70c30 0 50-20 50-50M100 110c-25 0-42-15-42-40M100 110c25 0 42-15 42-40M100 150c-20 0-34-12-34-32M100 150c20 0 34-12 34-32"/>
        </svg>

        <div class="relative mx-auto max-w-4xl px-6 py-24 sm:py-32 text-center">
            <h1 class="font-display text-4xl sm:text-5xl font-medium mb-6 leading-tight">{{ __('accueil.titre') }}</h1>
            <p class="text-lg text-sable/80 mb-10 max-w-xl mx-auto">{{ __('accueil.sous_titre') }}</p>
            <a href="{{ route('demande.create') }}" class="inline-flex items-center gap-2 rounded-full bg-ocre px-8 py-3.5 text-foret font-medium hover:bg-sable transition">
                {{ __('nav.demande') }}
                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/>
                </svg>
            </a>
        </div>
    </section>

    <section class="mx-auto max-w-6xl px-6 py-20">
        <div class="flex items-center justify-between mb-10">
            <h2 class="font-display text-2xl sm:text-3xl text-brun">{{ __('nav.services') }}</h2>
            <a href="{{ route('services.index') }}" class="text-sm text-mousse hover:text-foret transition flex items-center gap-1">
                {{ __('accueil.voir_tout') }}
                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
            @foreach($services as $service)
                <a href="{{ route('services.show', $service) }}" class="group block rounded-sm border border-brun/15 bg-white/60 p-6 hover:border-mousse hover:bg-white transition relative">
                    <span class="absolute top-0 right-0 w-4 h-4 bg-sable border-l border-b border-brun/15 group-hover:border-mousse transition"></span>
                    <x-icone-service :slug="$service->slug" class="w-6 h-6 text-mousse mb-3" />
                    <h3 class="font-display text-lg text-brun mb-2">{{ $service->nom }}</h3>
                    <p class="text-sm text-brun/70 line-clamp-2">{{ $service->description }}</p>
                </a>
            @endforeach
        </div>
    </section>

    @include('partials.separateur')

    @if($publications->isNotEmpty())
        <section class="bg-white/60">
            <div class="mx-auto max-w-6xl px-6 py-20">
                <div class="flex items-center justify-between mb-10">
                    <h2 class="font-display text-2xl sm:text-3xl text-brun">{{ __('nav.blog') }}</h2>
                    <a href="{{ route('publications.index') }}" class="text-sm text-mousse hover:text-foret transition flex items-center gap-1">
                        {{ __('accueil.voir_tout') }}
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0-4 4m4-4H3"/>
                        </svg>
                    </a>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                    @foreach($publications as $publication)
                        <a href="{{ route('publications.show', $publication) }}" class="block rounded-sm border border-brun/15 overflow-hidden hover:border-mousse transition bg-white">
                            @if(!empty($publication->images))
                                <img src="{{ asset('storage/' . $publication->images[0]) }}" alt="" class="w-full h-40 object-cover">
                            @endif
                            <div class="p-4">
                                <h3 class="font-display text-brun">{{ $publication->titre }}</h3>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>

        @include('partials.separateur')
    @endif

    @if($temoignages->isNotEmpty())
        <section class="mx-auto max-w-6xl px-6 py-20">
            <h2 class="font-display text-2xl sm:text-3xl text-brun mb-10">{{ __('nav.temoignages') }}</h2>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                @foreach($temoignages as $temoignage)
                    <div class="rounded-sm border border-brun/15 bg-white/60 p-6">
                        <svg class="w-6 h-6 text-ocre mb-3" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M7.5 6C4.5 6 3 8.5 3 11.5c0 2.5 1.7 4.5 4 4.5.3 2-1 3.5-3 4v1c3.5-.3 6-2.7 6-6.5V11c0-3-1-5-2.5-5Zm10 0C14.5 6 13 8.5 13 11.5c0 2.5 1.7 4.5 4 4.5.3 2-1 3.5-3 4v1c3.5-.3 6-2.7 6-6.5V11c0-3-1-5-2.5-5Z"/>
                        </svg>
                        <p class="text-brun/80 mb-4 text-sm leading-relaxed">{{ $temoignage->texte }}</p>
                        <p class="text-sm font-medium text-brun font-display">{{ $temoignage->nom }}</p>
                    </div>
                @endforeach
            </div>
        </section>
    @endif

@endsection