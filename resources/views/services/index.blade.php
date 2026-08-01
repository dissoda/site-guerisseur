@extends('layouts.public')

@section('titre', __('nav.services') . ' — ' . config('app.name'))

@section('content')
    <div class="mx-auto max-w-6xl px-6 py-16">
        <h1 class="text-3xl font-semibold text-stone-900 mb-10">{{ __('nav.services') }}</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($services as $service)
                <a href="{{ route('services.show', $service) }}" class="block rounded-lg border border-stone-200 bg-white p-6 hover:border-stone-400 transition">
                    <h2 class="text-lg font-semibold text-stone-900 mb-2">{{ $service->nom }}</h2>
                    <p class="text-sm text-stone-600 line-clamp-3">{{ $service->description }}</p>
                </a>
            @endforeach
        </div>
    </div>
@endsection