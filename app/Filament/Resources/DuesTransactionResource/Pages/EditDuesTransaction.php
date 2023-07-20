<?php

namespace App\Filament\Resources\DuesTransactionResource\Pages;

use App\Filament\Resources\DuesTransactionResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDuesTransaction extends EditRecord
{
    protected static string $resource = DuesTransactionResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
