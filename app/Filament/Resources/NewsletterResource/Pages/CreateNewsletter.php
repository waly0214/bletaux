<?php

namespace App\Filament\Resources\NewsletterResource\Pages;

use Spatie\PdfToImage\Pdf;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\NewsletterResource;

class CreateNewsletter extends CreateRecord
{
    protected static string $resource = NewsletterResource::class;


    protected function mutateFormDataBeforeCreate(array $data): array{
        $data['user_id'] = auth()->id();
    return $data;

    }


}
