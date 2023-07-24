<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Member;
use Filament\Resources\Form;
use Filament\Resources\Table;
use App\Models\MembershipType;
use App\Models\DuesTransaction;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\DuesTransactionResource\Pages;
use App\Filament\Resources\DuesTransactionResource\RelationManagers;

class DuesTransactionResource extends Resource
{
    protected static ?string $model = DuesTransaction::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Select::make('year')
            ->label('For Year')
            ->options([
                '2008' => '2008',
                '2009' => '2009',
                '2010' => '2010',
                '2011' => '2011',
                '2012' => '2012',
                '2013' => '2013',
                '2014' => '2014',
                '2015' => '2015',
                '2016' => '2016',
                '2017' => '2017',
                '2018' => '2018',
                '2019' => '2019',
                '2020' => '2020',
                '2021' => '2021',
                '2022' => '2022',
                '2023' => '2023',
                '2024' => '2024',
                '2025' => '2025',
                '2026' => '2026',
                '2027' => '2027',
                '2028' => '2028',
            ])
            ->required()
            ->searchable(),
            Select::make('member_id')
            ->label('Member Name')
            ->options(Member::all()->pluck('name', 'id'))
            ->required()
            ->searchable(),
            DatePicker::make('date')->label('Transaction Date')->required(),
            Select::make('membershipType')
            ->label('Membership Type')
            ->options(MembershipType::all()->pluck('name', 'id'))
            ->required()
            ->searchable(),
            TextInput::make('amount')->required(),
            TextInput::make('memo'),

        ]);
}

public static function table(Table $table): Table
{
    return $table
        ->columns([
            TextColumn::make('year')->label('For Dues Year')->sortable()->searchable(),
            TextColumn::make('name')->label('Name')
            ->sortable()->searchable(),
            TextColumn::make('date')->date('F d, Y')->sortable()->searchable(),
            TextColumn::make('amount')
                ->icon('heroicon-money')
                ->sortable()
                ->searchable(),
            TextColumn::make('memo')->sortable()->searchable(),
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
            'index' => Pages\ListDuesTransactions::route('/'),
            'create' => Pages\CreateDuesTransaction::route('/create'),
            'view' => Pages\ViewDuesTransaction::route('/{record}'),
            'edit' => Pages\EditDuesTransaction::route('/{record}/edit'),
        ];
    }
}
