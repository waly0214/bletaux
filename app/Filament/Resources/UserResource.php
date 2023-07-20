<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Resources\Pages\Page;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\UserResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\UserResource\RelationManagers;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationGroup = 'User Management';
    protected static ?int $navigationSort = 1;


    public static function form(Form $form): Form
    {
        return $form

            ->schema([
                Section::make('User Status')
                ->schema([
                    Grid::make(4)
                        ->schema([
                            Toggle::make('active')
                                ->label('Active User')
                                ->default(true)
                                ->inline(false)
                                ->onColor('success')
                                ->offColor('danger'),

                    ]),
                ]),
                Section::make('Basic User Information')
                ->schema([
                    TextInput::make('first_name')
                        ->required()
                        ->maxLength(255),
                    TextInput::make('last_name')
                        ->required()
                        ->maxLength(255),
                    TextInput::make('email')
                            ->label('Email Address')
                            ->required()
                            ->maxLength(255),
                    TextInput::make('password')
                            ->type('password')
                            ->label('Password')
                            ->required(fn(Page $livewire) : bool=> $livewire instanceof CreateRecord)
                            ->minLength(8)
                            ->same('passwordConfirmation')
                            ->dehydrated(fn ($state) => filled($state))
                            ->dehydrateStateUsing(fn($state) => Hash::make($state)),
                    TextInput::make('passwordConfirmation')
                            ->type('password')
                            ->label('Password Confrimation')
                            ->required(fn(Page $livewire) : bool=> $livewire instanceof CreateRecord)
                            ->minLength(8)
                            ->dehydrated(false)
                    //]),
                ])->columnSpan(8),

                Section::make('Contact Information / Positions Held')

                ->schema([

                    TextInput::make('home_phone'),
                    TextInput::make('cell_phone'),
                    TextInput::make('email')->nullable()->unique(ignoreRecord:true),


                    Forms\Components\Select::make('roles')
                        ->multiple()
                        ->relationship('roles', 'name')->preload(),
                    Forms\Components\Select::make('permissions')
                        ->multiple()
                        ->relationship('permissions', 'name')->preload(),




                    // Select::make('position_id')->nullable()
                    //     ->relationship('position', 'name')
                    //     ->label('Local Position Held'),

                    // Select::make('national_position_id')->nullable()
                    //     ->relationship('NationalPosition', 'name')
                    //     ->label('Local Position Held'),
                    ])->columnSpan(4)

            ])->columns(12);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('first_name')->sortable()->searchable(),
                TextColumn::make('last_name')->sortable()->searchable(),
                TextColumn::make('email')->sortable()->searchable(),
                TextColumn::make('created_at')->dateTime()->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
