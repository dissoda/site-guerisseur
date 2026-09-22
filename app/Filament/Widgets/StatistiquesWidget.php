<?php

namespace App\Filament\Widgets;

use App\Models\Client;
use App\Models\Dossier;
use App\Models\Paiement;
use App\Models\RituelPrescrit;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatistiquesWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Nouveaux dossiers aujourd\'hui', Dossier::whereDate('created_at', today())->count())
                ->icon('heroicon-o-folder-open')
                ->color('success'),

            Stat::make('Total clients', Client::count())
                ->icon('heroicon-o-users')
                ->color('gray'),

            Stat::make('Paiements en attente', Paiement::where('statut', 'en_attente')->count())
                ->icon('heroicon-o-clock')
                ->color('warning'),

            Stat::make('Rituels en cours', RituelPrescrit::where('statut', 'rituel_en_cours')->count())
                ->icon('heroicon-o-sparkles')
                ->color('primary'),
        ];
    }
}