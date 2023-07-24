<?php

namespace App\Filament\Resources\MembersResource\Widgets;

use Closure;
use Filament\Tables;
use App\Models\Member;
use Illuminate\Database\Eloquent\Builder;
use Filament\Widgets\TableWidget as BaseWidget;

class NewestMembers extends BaseWidget
{
    protected function getTableQuery(): Builder
    {
        return Member::query()->latest();
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('id'),
            Tables\Columns\TextColumn::make('member.name')
                ->label('Memeber'),
        ];
    }
}
