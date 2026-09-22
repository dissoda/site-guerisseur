<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('titre', config('app.name'))</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-sable text-brun font-sans antialiased">

    <header class="border-b border-brun/10 bg-sable/95 backdrop-blur sticky top-0 z-30" x-data="{ menuOuvert: false }">
        <div class="mx-auto max-w-6xl px-6 py-3 flex items-center justify-between">

            <a href="{{ route('accueil') }}" class="flex items-center gap-3 font-display text-xl font-semibold text-brun">
                <img src="{{ asset('images/logo.png') }}" alt="{{ config('app.name') }}" class="h-12 w-12 object-contain">
                {{ config('app.name') }}
            </a>

            <nav class="hidden md:flex items-center gap-8 text-sm">
                <a href="{{ route('accueil') }}" class="hover:text-mousse transition">{{ __('nav.accueil') }}</a>
                <a href="{{ route('services.index') }}" class="hover:text-mousse transition">{{ __('nav.services') }}</a>
                <a href="{{ route('publications.index') }}" class="hover:text-mousse transition">{{ __('nav.blog') }}</a>
                <a href="{{ route('temoignages.index') }}" class="hover:text-mousse transition">{{ __('nav.temoignages') }}</a>
                <a href="{{ route('demande.create') }}" class="rounded-full bg-mousse px-5 py-2.5 text-sable font-medium hover:bg-foret transition">
                    {{ __('nav.demande') }}
                </a>
            </nav>

            <div class="hidden md:flex items-center gap-1.5 text-xs font-mono ml-6">
                @foreach(\App\Http\Middleware\SetLocale::LANGUES_DISPONIBLES as $code)
                    <a href="{{ route('langue.changer', ['locale' => $code]) }}" class="uppercase px-1.5 py-1 rounded {{ app()->getLocale() === $code ? 'bg-brun text-sable' : 'text-brun/40 hover:text-brun' }}">
                        {{ $code }}
                    </a>
                @endforeach
            </div>

            <button @click="menuOuvert = !menuOuvert" class="md:hidden p-2 text-brun" aria-label="Menu">
                <svg x-show="!menuOuvert" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
                </svg>
                <svg x-show="menuOuvert" x-cloak class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <div x-show="menuOuvert" x-cloak x-transition class="md:hidden border-t border-brun/10 bg-sable px-6 py-4 space-y-3">
            <a href="{{ route('accueil') }}" class="block py-1.5">{{ __('nav.accueil') }}</a>
            <a href="{{ route('services.index') }}" class="block py-1.5">{{ __('nav.services') }}</a>
            <a href="{{ route('publications.index') }}" class="block py-1.5">{{ __('nav.blog') }}</a>
            <a href="{{ route('temoignages.index') }}" class="block py-1.5">{{ __('nav.temoignages') }}</a>
            <a href="{{ route('demande.create') }}" class="block rounded-full bg-mousse px-5 py-2.5 text-sable font-medium text-center mt-2">
                {{ __('nav.demande') }}
            </a>
            <div class="flex items-center gap-1.5 text-xs font-mono pt-3 border-t border-brun/10">
                @foreach(\App\Http\Middleware\SetLocale::LANGUES_DISPONIBLES as $code)
                    <a href="{{ route('langue.changer', ['locale' => $code]) }}" class="uppercase px-2 py-1 rounded {{ app()->getLocale() === $code ? 'bg-brun text-sable' : 'text-brun/40' }}">
                        {{ $code }}
                    </a>
                @endforeach
            </div>
        </div>
    </header>

    <main class="entree-page">
        @yield('content')
    </main>

    <footer class="bg-foret text-sable">
        <div class="mx-auto max-w-6xl px-6 py-14 grid grid-cols-1 sm:grid-cols-3 gap-10">

            <div>
                <a href="{{ route('accueil') }}" class="flex items-center gap-3 font-display text-lg mb-3">
                    <img src="{{ asset('images/logo.png') }}" alt="" class="h-10 w-10 object-contain">
                    {{ config('app.name') }}
                </a>
                <p class="text-sm text-sable/60 leading-relaxed">{{ __('accueil.sous_titre') }}</p>
            </div>

            <div>
                <p class="text-xs uppercase tracking-wider text-sable/50 mb-4 font-mono">{{ __('nav.services') }}</p>
                <nav class="flex flex-col gap-2 text-sm text-sable/80">
                    <a href="{{ route('services.index') }}" class="hover:text-ocre transition">{{ __('nav.services') }}</a>
                    <a href="{{ route('publications.index') }}" class="hover:text-ocre transition">{{ __('nav.blog') }}</a>
                    <a href="{{ route('temoignages.index') }}" class="hover:text-ocre transition">{{ __('nav.temoignages') }}</a>
                    <a href="{{ route('demande.create') }}" class="hover:text-ocre transition">{{ __('nav.demande') }}</a>
                    <a href="{{ route('suivi.retrouver') }}" class="hover:text-ocre transition">{{ __('suivi.retrouver_titre') }}</a>
                </nav>
            </div>

            <div>
                <p class="text-xs uppercase tracking-wider text-sable/50 mb-4 font-mono">{{ __('nav.accueil') }}</p>
                <div class="flex flex-wrap gap-1.5 text-xs font-mono">
                    @foreach(\App\Http\Middleware\SetLocale::LANGUES_DISPONIBLES as $code)
                        <a href="{{ route('langue.changer', ['locale' => $code]) }}" class="uppercase px-2 py-1 rounded {{ app()->getLocale() === $code ? 'bg-sable text-foret' : 'text-sable/50 hover:text-sable' }}">
                            {{ $code }}
                        </a>
                    @endforeach
                </div>
            </div>

        </div>

        <div class="border-t border-sable/10">
            <div class="mx-auto max-w-6xl px-6 py-5 text-xs text-sable/50 flex items-center justify-center gap-4">
                <span>&copy; {{ date('Y') }} {{ config('app.name') }}. @lang('nav.droits_reserves')</span>
                <a href="{{ url('/admin/login') }}" class="text-sable/30 hover:text-sable/60 transition" title="Espace administrateur">
                    <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z"/>
                    </svg>
                </a>
            </div>
        </div>
    </footer>

</body>
</html>