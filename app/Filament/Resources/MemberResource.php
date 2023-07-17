<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\City;
use Filament\Tables;
use App\Models\State;
use App\Models\Member;
use App\Models\Country;
use Forms\Components\Card;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Repeater;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\MemberResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use SebastianBergmann\CodeCoverage\Driver\Selector;
use App\Filament\Resources\MemberResource\RelationManagers;
use App\Filament\Resources\MemberResource\Widgets\MemberStatsOverview;

class MemberResource extends Resource
{
    protected static ?string $model = Member::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';


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
                            Toggle::make('green')
                                ->label('Green Member Status')
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
                Tables\Columns\IconColumn::make('green')
                    ->label('Green Newsletter')
                    ->alignCenter()
                    ->boolean()
                    ->sortable(),
                TextColumn::make('first_name')->sortable()->searchable(),
                TextColumn::make('last_name')->sortable()->searchable(),
                TextColumn::make('auxiliary.name')->sortable()->searchable(),

            ])
            ->filters([
                SelectFilter::make('auxiliary')->relationship('auxiliary', 'name'),
                SelectFilter::make('active')
                    ->options([
                        1 => 'Active',
                        0 => 'Inactive',
                    ]),
                SelectFilter::make('green')
                    ->label('Green Newsletter')
                    ->options([
                        1 => 'Green Subscriber',
                        0 => 'Hard copy in the mail',
                    ]),
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getWidgets(): array {
        return [
            MemberStatsOverview::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMembers::route('/'),
            'create' => Pages\CreateMember::route('/create'),
            'edit' => Pages\EditMember::route('/{record}/edit'),
        ];
    }
}
