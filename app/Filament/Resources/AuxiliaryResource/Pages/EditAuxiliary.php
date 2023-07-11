<?php

namespace App\Filament\Resources\AuxiliaryResource\Pages;

use App\Filament\Resources\AuxiliaryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAuxiliary extends EditRecord
{
    protected static string $resource = AuxiliaryResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
