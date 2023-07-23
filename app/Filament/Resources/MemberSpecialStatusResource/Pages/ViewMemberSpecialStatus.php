<?php

namespace App\Filament\Resources\MemberSpecialStatusResource\Pages;

use App\Filament\Resources\MemberSpecialStatusResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewMemberSpecialStatus extends ViewRecord
{
    protected static string $resource = MemberSpecialStatusResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
