@extends('layouts.public')

@section('titre', $service->nom . ' — ' . config('app.name'))

@section('content')
    <div class="mx-auto max-w-3xl px-6 py-16">
        <a href="{{ route('services.index') }}" class="text-sm text-stone-500 hover:text-stone-900">&larr; {{ __('nav.services') }}</a>

        <h1 class="text-3xl font-semibold text-stone-900 mt-4 mb-6">{{ $service->nom }}</h1>

        <div class="prose prose-stone max-w-none">
            {!! nl2br(e($service->description)) !!}
        </div>

        <div class="mt-10">
            <a href="{{ route('demande.create', ['service' => $service->slug]) }}" class="inline-block rounded-md bg-stone-900 px-6 py-3 text-white hover:bg-stone-700">{{ __('nav.demande') }}</a>
        </div>
    </div>
@endsection