@extends('layouts.public')

@section('titre', __('nav.blog') . ' — ' . config('app.name'))

@section('content')
    <div class="mx-auto max-w-5xl px-6 py-16">
        <h1 class="font-display text-3xl sm:text-4xl text-brun mb-2">{{ __('nav.blog') }}</h1>
        <p class="text-brun/60 mb-12">{{ __('accueil.sous_titre') }}</p>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
            @foreach($publications as $publication)
                <a href="{{ route('publications.show', $publication) }}" class="group block rounded-sm border border-brun/15 bg-white/60 overflow-hidden hover:border-mousse hover:bg-white transition">
                    @if(!empty($publication->images))
                        <div class="h-48 overflow-hidden">
                            <img src="{{ asset('storage/' . $publication->images[0]) }}" alt="" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        </div>
                    @else
                        <div class="h-48 bg-foret/5 flex items-center justify-center">
                            <svg class="w-10 h-10 text-brun/20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.3">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 19.5V6a2 2 0 0 1 2-2h9l5 5v10.5a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2Z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 4v4a1 1 0 0 0 1 1h4"/>
                            </svg>
                        </div>
                    @endif
                    <div class="p-6">
                        <p class="text-xs font-mono text-mousse mb-2 uppercase tracking-wide">{{ $publication->publie_le?->translatedFormat('d F Y') }}</p>
                        <h2 class="font-display text-xl text-brun mb-2">{{ $publication->titre }}</h2>
                        <div class="text-sm text-brun/70 line-clamp-3">
                            {!! strip_tags($publication->contenu) !!}
                        </div>
                        <span class="inline-flex items-center gap-1 text-sm text-mousse mt-4 group-hover:gap-2 transition-all">
                            {{ __('accueil.voir_tout') }}
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0-4 4m4-4H3"/>
                            </svg>
                        </span>
                    </div>
                </a>
            @endforeach
        </div>

        <div class="mt-12">
            {{ $publications->links() }}
        </div>
    </div>
@endsection