<?php

namespace App\Filament\Resources\DuesTransactionResource\Pages;

use App\Models\Member;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\DuesTransactionResource;

class CreateDuesTransaction extends CreateRecord
{
    protected static string $resource = DuesTransactionResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $member_id = $data['member_id'];
        $member_name = Member::where( 'id', $member_id)->first();
        $data['name'] = $member_name->name_last_first;
        $data['member_id'] = $member_id;
        //dd($data);

        return $data;
    }

    public function memberId(){
        $id = app('request')->input('id');
        dd($id);
        return $id;
    }




}
