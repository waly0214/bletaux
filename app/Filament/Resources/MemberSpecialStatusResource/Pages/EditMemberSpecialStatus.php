<?php

namespace App\Filament\Resources\MemberSpecialStatusResource\Pages;

use App\Filament\Resources\MemberSpecialStatusResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMemberSpecialStatus extends EditRecord
{
    protected static string $resource = MemberSpecialStatusResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
