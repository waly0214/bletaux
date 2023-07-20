<?php

namespace App\Filament\Resources\AuxiliaryResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;

class MembersRelationManager extends RelationManager
{
    protected static string $relationship = 'members';

    protected static ?string $recordTitleAttribute = 'first_name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Membership Status')
            ->schema([
                Grid::make(4)
                    ->schema([
                        Select::make('auxiliary_id')
                            ->relationship('auxiliary', 'name')
                            ->required(),
                        Toggle::make('active')
                            ->label('Active Member')
                            ->default(true)
                            ->inline(false)
                            ->onColor('success')
                            ->offColor('danger'),
                ]),
            ]),
            Section::make('Basic Member Information')
            ->schema([

                TextInput::make('first_name')->required(),
                TextInput::make('last_name')->required(),
                TextInput::make('address')->required(),
                Grid::make(3)
                ->schema([
                    TextInput::make('city')->nullable(),
                    TextInput::make('state')->nullable(),
                    TextInput::make('zip_code')->nullable(),
                ]),
                Grid::make(2)
                ->schema([
                    DatePicker::make('date_of_birth'),
                    DatePicker::make('date_joined')->label('Date Joined the Auxiliary'),
                ]),





            ])->columnSpan(8),


            Section::make('Contact Information / Positions Held')
            ->schema([
                TextInput::make('home_phone'),
                TextInput::make('cell_phone'),
                TextInput::make('email')->nullable()->unique(ignoreRecord:true),

                Select::make('position_id')->nullable()
                    ->relationship('position', 'name')
                    ->label('Local Position Held'),

                    Select::make('national_position_id')->nullable()
                    ->relationship('NationalPosition', 'name')
                    ->label('Local Position Held'),
            ])->columnSpan(4)





        ])->columns(12);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\IconColumn::make('active')
                    ->boolean()
                    ->sortable(),
                Tables\Columns\TextColumn::make('first_name')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('last_name')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('email')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('cell_phone')->sortable()->searchable(),

            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ForceDeleteAction::make(),
                Tables\Actions\RestoreAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                Tables\Actions\ForceDeleteBulkAction::make(),
            Tables\Actions\RestoreBulkAction::make(),
            ]);
    }

    protected function getTableQuery(): Builder
{
    return parent::getTableQuery()
        ->withoutGlobalScopes([
            SoftDeletingScope::class,
        ]);
}
}
