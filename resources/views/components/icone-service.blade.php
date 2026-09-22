@props(['slug'])

@php
    $classe = match(true) {
        str_contains($slug, 'amour') || str_contains($slug, 'affection') => 'coeur',
        str_contains($slug, 'mariage') || str_contains($slug, 'partenaire') => 'anneaux',
        str_contains($slug, 'travail') || str_contains($slug, 'emploi') || str_contains($slug, 'contrat') => 'mallette',
        str_contains($slug, 'fertil') || str_contains($slug, 'enfant') => 'pousse',
        str_contains($slug, 'plante') || str_contains($slug, 'guerison') || str_contains($slug, 'sante') => 'feuille',
        default => 'etincelle',
    };
@endphp

@if($classe === 'coeur')
    <svg {{ $attributes }} viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 20.5s-7.5-4.6-9.8-9.3C.7 7.6 2.4 4 6 4c2 0 3.5 1.1 4.5 2.6C11.5 5.1 13 4 15 4c3.6 0 5.3 3.6 3.8 7.2C16.5 15.9 12 20.5 12 20.5Z"/>
    </svg>
@elseif($classe === 'anneaux')
    <svg {{ $attributes }} viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
        <circle cx="8.5" cy="14" r="4.5"/>
        <circle cx="15.5" cy="14" r="4.5"/>
        <path stroke-linecap="round" d="M12 5v3.5"/>
    </svg>
@elseif($classe === 'mallette')
    <svg {{ $attributes }} viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
        <rect x="3" y="8" width="18" height="12" rx="1.5"/>
        <path stroke-linecap="round" stroke-linejoin="round" d="M8 8V6a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/>
    </svg>
@elseif($classe === 'pousse')
    <svg {{ $attributes }} viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 21v-9m0 0c0-3.5-2-6-5.5-6.5C6 8.5 8 11 12 12Zm0 0c0-3.5 2-6 5.5-6.5C18 8.5 16 11 12 12Z"/>
    </svg>
@elseif($classe === 'feuille')
    <svg {{ $attributes }} viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
        <path stroke-linecap="round" stroke-linejoin="round" d="M20 4C10 4 4 10 4 18c8 0 14-6 14-14Z"/>
        <path stroke-linecap="round" d="M20 4 8 16"/>
    </svg>
@else
    <svg {{ $attributes }} viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v3m0 12v3m9-9h-3M6 12H3m14.5-6.5-2 2m-9 9-2 2m0-13 2 2m9 9 2 2"/>
    </svg>
@endif