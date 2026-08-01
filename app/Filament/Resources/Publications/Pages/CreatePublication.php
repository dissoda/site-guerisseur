<?php

namespace App\Filament\Resources\Publications\Pages;

use App\Filament\Resources\Publications\PublicationResource;
use App\Services\Traducteur;
use Filament\Resources\Pages\CreateRecord;
use LaraZeus\SpatieTranslatable\Actions\LocaleSwitcher;
use LaraZeus\SpatieTranslatable\Resources\Pages\CreateRecord\Concerns\Translatable;

class CreatePublication extends CreateRecord
{
    use Translatable;

    protected static string $resource = PublicationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            LocaleSwitcher::make(),
        ];
    }

    protected function afterCreate(): void
    {
        app(Traducteur::class)->traduireChampsManquants(
            $this->record,
            ['titre', 'contenu'],
            $this->record->langue_origine,
        );
    }
}