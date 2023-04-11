<?php

namespace App\Filament\Resources\NeedsResource\Pages;

use App\Filament\Resources\NeedsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListNeeds extends ListRecords
{
    protected static string $resource = NeedsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
