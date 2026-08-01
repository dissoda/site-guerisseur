@extends('layouts.public')

@section('titre', __('nav.blog') . ' — ' . config('app.name'))

@section('content')
    <div class="mx-auto max-w-3xl px-6 py-16">
        <h1 class="text-3xl font-semibold text-stone-900 mb-10">{{ __('nav.blog') }}</h1>

        <div class="space-y-10">
            @foreach($publications as $publication)
                <a href="{{ route('publications.show', $publication) }}" class="block rounded-lg border border-stone-200 bg-white overflow-hidden hover:border-stone-400 transition">
                    @if(!empty($publication->images))
                        <img src="{{ asset('storage/' . $publication->images[0]) }}" alt="" class="w-full h-56 object-cover">
                    @endif
                    <div class="p-6">
                        <p class="text-xs text-stone-400 mb-2">{{ $publication->publie_le?->translatedFormat('d F Y') }}</p>
                        <h2 class="text-xl font-semibold text-stone-900 mb-2">{{ $publication->titre }}</h2>
                        <div class="text-sm text-stone-600 line-clamp-3">
                            {!! strip_tags($publication->contenu) !!}
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

        <div class="mt-10">
            {{ $publications->links() }}
        </div>
    </div>
@endsection