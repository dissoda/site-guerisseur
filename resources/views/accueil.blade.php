@extends('layouts.public')

@section('titre', config('app.name'))

@section('content')

    <section class="bg-white border-b border-stone-200">
        <div class="mx-auto max-w-4xl px-6 py-24 text-center">
            <h1 class="text-4xl font-semibold text-stone-900 mb-4">{{ __('accueil.titre') }}</h1>
            <p class="text-lg text-stone-600 mb-8">{{ __('accueil.sous_titre') }}</p>
            <a href="{{ route('demande.create') }}" class="inline-block rounded-md bg-stone-900 px-8 py-3 text-white hover:bg-stone-700">{{ __('nav.demande') }}</a>
        </div>
    </section>

    <section class="mx-auto max-w-6xl px-6 py-16">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-2xl font-semibold text-stone-900">{{ __('nav.services') }}</h2>
            <a href="{{ route('services.index') }}" class="text-sm text-stone-500 hover:text-stone-900">{{ __('accueil.voir_tout') }} &rarr;</a>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
            @foreach($services as $service)
                <a href="{{ route('services.show', $service) }}" class="block rounded-lg border border-stone-200 bg-white p-6 hover:border-stone-400 transition">
                    <h3 class="font-semibold text-stone-900 mb-2">{{ $service->nom }}</h3>
                    <p class="text-sm text-stone-600 line-clamp-2">{{ $service->description }}</p>
                </a>
            @endforeach
        </div>
    </section>

    @if($publications->isNotEmpty())
        <section class="bg-white border-t border-stone-200">
            <div class="mx-auto max-w-6xl px-6 py-16">
                <div class="flex items-center justify-between mb-8">
                    <h2 class="text-2xl font-semibold text-stone-900">{{ __('nav.blog') }}</h2>
                    <a href="{{ route('publications.index') }}" class="text-sm text-stone-500 hover:text-stone-900">{{ __('accueil.voir_tout') }} &rarr;</a>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                    @foreach($publications as $publication)
                        <a href="{{ route('publications.show', $publication) }}" class="block rounded-lg border border-stone-200 overflow-hidden hover:border-stone-400 transition">
                            @if(!empty($publication->images))
                                <img src="{{ asset('storage/' . $publication->images[0]) }}" alt="" class="w-full h-40 object-cover">
                            @endif
                            <div class="p-4">
                                <h3 class="font-semibold text-stone-900">{{ $publication->titre }}</h3>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if($temoignages->isNotEmpty())
        <section class="mx-auto max-w-6xl px-6 py-16">
            <h2 class="text-2xl font-semibold text-stone-900 mb-8">{{ __('nav.temoignages') }}</h2>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                @foreach($temoignages as $temoignage)
                    <div class="rounded-lg border border-stone-200 bg-white p-6">
                        <p class="text-stone-700 mb-3 text-sm">&ldquo;{{ $temoignage->texte }}&rdquo;</p>
                        <p class="text-sm font-medium text-stone-900">{{ $temoignage->nom }}</p>
                    </div>
                @endforeach
            </div>
        </section>
    @endif

@endsection