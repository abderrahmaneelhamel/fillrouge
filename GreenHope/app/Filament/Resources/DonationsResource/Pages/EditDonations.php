<?php

namespace App\Filament\Resources\DonationsResource\Pages;

use App\Filament\Resources\DonationsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDonations extends EditRecord
{
    protected static string $resource = DonationsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
