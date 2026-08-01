<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('titre', config('app.name'))</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-stone-50 text-stone-800 antialiased">

    <header class="border-b border-stone-200 bg-white">
        <div class="mx-auto max-w-6xl px-6 py-4 flex items-center justify-between">
            <a href="{{ route('accueil') }}" class="text-lg font-semibold text-stone-900">
                {{ config('app.name') }}
            </a>

            <nav class="hidden md:flex items-center gap-6 text-sm text-stone-600">
                <a href="{{ route('accueil') }}" class="hover:text-stone-900">{{ __('nav.accueil') }}</a>
                <a href="{{ route('services.index') }}" class="hover:text-stone-900">@lang('nav.services')</a>
                <a href="{{ route('publications.index') }}" class="hover:text-stone-900">@lang('nav.blog')</a>
                <a href="{{ route('temoignages.index') }}" class="hover:text-stone-900">@lang('nav.temoignages')</a>
                <a href="{{ route('demande.create') }}" class="rounded-md bg-stone-900 px-4 py-2 text-white hover:bg-stone-700">
                    @lang('nav.demande')
                </a>
            </nav>

            <div class="flex items-center gap-2 text-sm">
                @foreach(\App\Http\Middleware\SetLocale::LANGUES_DISPONIBLES as $code)
                    <a href="{{ route('langue.changer', ['locale' => $code]) }}" class="uppercase px-1.5 {{ app()->getLocale() === $code ? 'font-semibold text-stone-900' : 'text-stone-400 hover:text-stone-700' }}">
                        {{ $code }}
                    </a>
                @endforeach
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="border-t border-stone-200 bg-white mt-16">
        <div class="mx-auto max-w-6xl px-6 py-8 text-sm text-stone-500 text-center">
            &copy; {{ date('Y') }} {{ config('app.name') }}. @lang('nav.droits_reserves')
        </div>
    </footer>

</body>
</html>