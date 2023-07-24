<?php

namespace App\Filament\Resources\MemberResource\Pages;

use App\Models\Member;
use Filament\Pages\Actions;
use App\Filament\Resources\MemberResource;
use Filament\Resources\Pages\CreateRecord;

class CreateMember extends CreateRecord
{
    protected static string $resource = MemberResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
{
    // $data['name'] = $data['first_name'] . ' ' . $data['last_name'];
    // $data['name_last_first'] = $data['last_name'] . ', ' . $data['first_name'];

    $member_id = $data['member_id'];
    $member_name = Member::where( 'id', $member_id)->first();
    $data['name'] = $member_name->name_last_first;
    $data['member_id'] = $member_id;
    dd($data);

    return $data;

    return $data;
}
}
