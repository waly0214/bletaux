<?php

namespace App\Filament\Resources\DuesTransactionResource\Pages;

use App\Models\Member;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;
use App\Filament\Resources\DuesTransactionResource;

class ViewDuesTransaction extends ViewRecord
{
    protected static string $resource = DuesTransactionResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }

    public function member($id): array {
        $member = Member::where('id', $id)->first();

        return $member;
    }
}
