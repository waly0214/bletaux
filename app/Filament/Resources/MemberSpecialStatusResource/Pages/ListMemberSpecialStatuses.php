<?php

namespace App\Filament\Resources\MemberSpecialStatusResource\Pages;

use App\Filament\Resources\MemberSpecialStatusResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMemberSpecialStatuses extends ListRecords
{
    protected static string $resource = MemberSpecialStatusResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
