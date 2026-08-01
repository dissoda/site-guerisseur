<?php

namespace App\Filament\Resources\RituelPrescrits\Pages;

use App\Filament\Resources\RituelPrescrits\RituelPrescritResource;
use App\Mail\PropositionRituelMail;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Facades\Mail;

class EditRituelPrescrit extends EditRecord
{
    protected static string $resource = RituelPrescritResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('envoyerProposition')
                ->label('Envoyer la proposition')
                ->icon(Heroicon::OutlinedPaperAirplane)
                ->color('success')
                ->requiresConfirmation()
                ->visible(fn () => $this->record->lignesFacture()->count() > 0)
                ->action(function () {
                    $client = $this->record->dossier->client;

                    Mail::to($client->email)
                        ->locale($client->langue ?? 'fr')
                        ->send(new PropositionRituelMail($this->record));

                    $this->record->update([
                        'statut' => 'proposition_envoyee',
                        'envoye_le' => now(),
                    ]);

                    Notification::make()
                        ->title('Proposition envoyée avec succès')
                        ->success()
                        ->send();
                }),
            DeleteAction::make(),
        ];
    }
}