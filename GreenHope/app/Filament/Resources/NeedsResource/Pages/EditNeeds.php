<?php

namespace App\Filament\Resources\NeedsResource\Pages;

use App\Filament\Resources\NeedsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditNeeds extends EditRecord
{
    protected static string $resource = NeedsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
