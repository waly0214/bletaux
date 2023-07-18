<?php

namespace App\Filament\Resources\MembershipTypeResource\Pages;

use App\Filament\Resources\MembershipTypeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMembershipType extends CreateRecord
{
    protected static string $resource = MembershipTypeResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
