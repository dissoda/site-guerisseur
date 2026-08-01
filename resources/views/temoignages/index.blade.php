@extends('layouts.public')

@section('titre', __('nav.temoignages') . ' — ' . config('app.name'))

@section('content')
    <div class="mx-auto max-w-2xl px-6 py-16">
        <h1 class="text-3xl font-semibold text-stone-900 mb-10">{{ __('nav.temoignages') }}</h1>

        @if (session('succes'))
            <div class="mb-8 rounded-md border border-green-200 bg-green-50 p-4 text-sm text-green-800">
                {{ session('succes') }}
            </div>
        @endif

        <div class="space-y-6 mb-16">
            @forelse ($temoignages as $temoignage)
                <div class="rounded-lg border border-stone-200 bg-white p-6">
                    <p class="text-stone-700 mb-3">&ldquo;{{ $temoignage->texte }}&rdquo;</p>
                    <p class="text-sm font-medium text-stone-900">{{ $temoignage->nom }}</p>
                </div>
            @empty
                <p class="text-stone-500">{{ __('temoignages.aucun') }}</p>
            @endforelse
        </div>

        <div class="rounded-lg border border-stone-200 bg-white p-6">
            <h2 class="text-lg font-semibold text-stone-900 mb-4">{{ __('temoignages.ajouter_titre') }}</h2>

            @if ($errors->any())
                <div class="mb-4 rounded-md border border-red-200 bg-red-50 p-4 text-sm text-red-700">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $erreur)
                            <li>{{ $erreur }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('temoignages.store') }}" class="space-y-4">
                @csrf

                <div>
                    <label class="block text-sm font-medium text-stone-700 mb-1">{{ __('temoignages.champ_nom') }}</label>
                    <input type="text" name="nom" value="{{ old('nom') }}" class="w-full rounded-md border border-stone-300 px-3 py-2">
                </div>

                <div>
                    <label class="block text-sm font-medium text-stone-700 mb-1">{{ __('temoignages.champ_texte') }}</label>
                    <textarea name="texte" rows="4" class="w-full rounded-md border border-stone-300 px-3 py-2">{{ old('texte') }}</textarea>
                </div>

                <button type="submit" class="rounded-md bg-stone-900 px-6 py-3 text-white hover:bg-stone-700">{{ __('temoignages.envoyer') }}</button>
            </form>
        </div>
    </div>
@endsection