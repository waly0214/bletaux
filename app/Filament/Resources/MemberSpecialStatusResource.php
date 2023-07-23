<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use App\Models\MemberSpecialStatus;
use Filament\Forms\Components\Card;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\MemberSpecialStatusResource\Pages;
use App\Filament\Resources\MemberSpecialStatusResource\RelationManagers;

class MemberSpecialStatusResource extends Resource
{
    protected static ?string $model = MemberSpecialStatus::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Card::make()->schema([
                TextInput::make('name')
                ->minLength(2)
                ->maxLength(255)
                ->required()
                ->unique(ignoreRecord:true)
            ])
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->sortable()->searchable(),
                TextColumn::make('created_at')->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMemberSpecialStatuses::route('/'),
            'create' => Pages\CreateMemberSpecialStatus::route('/create'),
            'view' => Pages\ViewMemberSpecialStatus::route('/{record}'),
            'edit' => Pages\EditMemberSpecialStatus::route('/{record}/edit'),
        ];
    }
}
