<?php

namespace App\Filament\Resources\MemberResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use App\Models\Member;
use Filament\Resources\Form;
use Filament\Resources\Table;
use App\Models\MembershipType;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Actions\CreateAction;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;

class DuesTransactionsRelationManager extends RelationManager
{
    protected static string $relationship = 'duesTransactions';

    protected static ?string $recordTitleAttribute = 'date';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Select::make('year')
            ->label('For Year')
            ->options([

                '2025' => '2025',
                '2024' => '2024',
                '2023' => '2023',
                '2022' => '2022',
                '2021' => '2021',
                '2020' => '2020',
                '2019' => '2019',
                '2018' => '2018',
                '2017' => '2017',
                '2016' => '2016',
                '2015' => '2015',
                '2014' => '2014',
                '2013' => '2013',
                '2012' => '2012',
                '2011' => '2011',
                '2010' => '2010',
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
                TextColumn::make('year')->sortable()->searchable(),
                TextColumn::make('name')->sortable()->searchable(),
                TextColumn::make('date')->date('F d, Y')->sortable()->searchable(),
                TextColumn::make('amount')
                    ->icon('heroicon-o-currency-dollar')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('memo')->sortable()->searchable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }


}
