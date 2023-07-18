<?php

namespace App\Filament\Resources\ScholarshipResource\Pages;

use App\Filament\Resources\ScholarshipResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewScholarship extends ViewRecord
{
    protected static string $resource = ScholarshipResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
