@extends('layouts.public')

@section('titre', $service->nom . ' — ' . config('app.name'))

@section('content')
    <div class="mx-auto max-w-3xl px-6 py-16">
        <a href="{{ route('services.index') }}" class="text-sm text-brun/60 hover:text-brun transition inline-flex items-center gap-1">
            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0 7-7m-7 7h18"/>
            </svg>
            {{ __('nav.services') }}
        </a>

        <x-icone-service :slug="$service->slug" class="w-10 h-10 text-mousse mt-6 mb-3" />
        <h1 class="font-display text-3xl sm:text-4xl text-brun mb-6">{{ $service->nom }}</h1>

        <div class="prose prose-stone max-w-none text-brun/80">
            {!! nl2br(e($service->description)) !!}
        </div>

        <div class="mt-10">
            <a href="{{ route('demande.create', ['service' => $service->slug]) }}" class="inline-flex items-center gap-2 rounded-full bg-mousse px-6 py-3 text-sable font-medium hover:bg-foret transition">
                {{ __('nav.demande') }}
                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/>
                </svg>
            </a>
        </div>
    </div>
@endsection