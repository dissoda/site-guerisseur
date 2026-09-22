@extends('layouts.public')

@section('titre', __('nav.services') . ' — ' . config('app.name'))

@section('content')
    <div class="mx-auto max-w-6xl px-6 py-16">
        <h1 class="font-display text-3xl sm:text-4xl text-brun mb-10">{{ __('nav.services') }}</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($services as $service)
                <a href="{{ route('services.show', $service) }}" class="group block rounded-sm border border-brun/15 bg-white/60 p-6 hover:border-mousse hover:bg-white transition relative">
                    <span class="absolute top-0 right-0 w-4 h-4 bg-sable border-l border-b border-brun/15 group-hover:border-mousse transition"></span>
                    <x-icone-service :slug="$service->slug" class="w-7 h-7 text-mousse mb-4" />
                    <h2 class="font-display text-lg text-brun mb-2">{{ $service->nom }}</h2>
                    <p class="text-sm text-brun/70 line-clamp-3">{{ $service->description }}</p>
                </a>
            @endforeach
        </div>
    </div>
@endsection