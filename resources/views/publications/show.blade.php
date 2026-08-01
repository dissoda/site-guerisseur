@extends('layouts.public')

@section('titre', $publication->titre . ' — ' . config('app.name'))

@section('content')
    <div class="mx-auto max-w-2xl px-6 py-16">
        <a href="{{ route('publications.index') }}" class="text-sm text-stone-500 hover:text-stone-900">&larr; {{ __('nav.blog') }}</a>

        <p class="text-xs text-stone-400 mt-4">{{ $publication->publie_le?->translatedFormat('d F Y') }}</p>
        <h1 class="text-3xl font-semibold text-stone-900 mt-1 mb-6">{{ $publication->titre }}</h1>

        @if(!empty($publication->images))
            <div class="space-y-4 mb-8">
                @foreach($publication->images as $image)
                    <img src="{{ asset('storage/' . $image) }}" alt="" class="w-full rounded-lg">
                @endforeach
            </div>
        @endif

        <div class="prose prose-stone max-w-none">
            {!! $publication->contenu !!}
        </div>

        @if(!empty($publication->videos))
            <div class="space-y-4 mt-8">
                @foreach($publication->videos as $video)
                    <video controls class="w-full rounded-lg">
                        <source src="{{ asset('storage/' . $video) }}">
                    </video>
                @endforeach
            </div>
        @endif
    </div>
@endsection