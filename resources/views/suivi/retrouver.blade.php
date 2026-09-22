@extends('layouts.public')

@section('titre', __('suivi.retrouver_titre') . ' — ' . config('app.name'))

@section('content')
    <div class="mx-auto max-w-md px-6 py-16">
        <h1 class="font-display text-3xl text-brun mb-2">{{ __('suivi.retrouver_titre') }}</h1>
        <p class="text-brun/60 mb-10">{{ __('suivi.retrouver_intro') }}</p>

        @if (session('succes'))
            <div class="mb-6 rounded-sm border border-mousse/30 bg-mousse/10 p-4 text-sm text-foret">
                {{ session('succes') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-6 rounded-sm border border-argile/30 bg-argile/10 p-4 text-sm text-argile">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('suivi.retrouver.envoyer') }}" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium text-brun/80 mb-1.5">{{ __('demande.champ_email') }}</label>
                <input type="email" name="email" value="{{ old('email') }}" class="w-full rounded-sm border border-brun/20 bg-white px-3 py-2.5 focus:border-mousse focus:outline-none">
            </div>
            <button type="submit" class="w-full rounded-full bg-mousse px-6 py-3 text-sable font-medium hover:bg-foret transition">
                {{ __('suivi.retrouver_envoyer') }}
            </button>
        </form>
    </div>
@endsection