<?php

namespace App\Filament\Resources\DuesTransactionResource\Pages;

use App\Filament\Resources\DuesTransactionResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDuesTransactions extends ListRecords
{
    protected static string $resource = DuesTransactionResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
