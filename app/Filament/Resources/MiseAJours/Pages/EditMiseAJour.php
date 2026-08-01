<?php

namespace App\Filament\Resources\MiseAJours\Pages;

use App\Filament\Resources\MiseAJours\MiseAJourResource;
use App\Mail\MiseAJourMail;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Facades\Mail;

class EditMiseAJour extends EditRecord
{
    protected static string $resource = MiseAJourResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('envoyer')
                ->label('Envoyer au client')
                ->icon(Heroicon::OutlinedPaperAirplane)
                ->color('success')
                ->requiresConfirmation()
                ->visible(fn () => blank($this->record->envoyee_le))
                ->action(function () {
                    $client = $this->record->rituelPrescrit->dossier->client;

                    Mail::to($client->email)
                        ->locale($client->langue ?? 'fr')
                        ->send(new MiseAJourMail($this->record));

                    $this->record->update(['envoyee_le' => now()]);

                    Notification::make()
                        ->title('Mise à jour envoyée avec succès')
                        ->success()
                        ->send();
                }),
            DeleteAction::make(),
        ];
    }
}