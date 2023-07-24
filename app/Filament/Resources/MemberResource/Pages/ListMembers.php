<?php

namespace App\Filament\Resources\MemberResource\Pages;

use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\MemberResource;
use App\Filament\Resources\MemberResource\Widgets\MemberStatsOverview;

class ListMembers extends ListRecords
{
    protected static string $resource = MemberResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            MemberStatsOverview::class,
            NewestMembers::class,
        ];
    }
}
