@extends('layouts.public')

@section('titre', $publication->titre . ' — ' . config('app.name'))

@section('content')
    <div class="mx-auto max-w-2xl px-6 py-16">
        <a href="{{ route('publications.index') }}" class="text-sm text-brun/60 hover:text-brun transition inline-flex items-center gap-1">
            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0 7-7m-7 7h18"/>
            </svg>
            {{ __('nav.blog') }}
        </a>

        <p class="text-xs font-mono text-mousse mt-6 uppercase tracking-wide">{{ $publication->publie_le?->translatedFormat('d F Y') }}</p>
        <h1 class="font-display text-3xl sm:text-4xl text-brun mt-2 mb-8">{{ $publication->titre }}</h1>

        @if(!empty($publication->images))
            <div class="space-y-4 mb-10">
                @foreach($publication->images as $image)
                    <img src="{{ asset('storage/' . $image) }}" alt="" class="w-full rounded-sm">
                @endforeach
            </div>
        @endif

        <div class="prose prose-stone max-w-none text-brun/80">
            {!! $publication->contenu !!}
        </div>

        @if(!empty($publication->videos))
            <div class="space-y-4 mt-10">
                @foreach($publication->videos as $video)
                    <video controls class="w-full rounded-sm">
                        <source src="{{ asset('storage/' . $video) }}">
                    </video>
                @endforeach
            </div>
        @endif

        @include('partials.separateur')

        <div class="text-center">
            <a href="{{ route('demande.create') }}" class="inline-flex items-center gap-2 rounded-full bg-mousse px-6 py-3 text-sable font-medium hover:bg-foret transition">
                {{ __('nav.demande') }}
                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/>
                </svg>
            </a>
        </div>
    </div>
@endsection