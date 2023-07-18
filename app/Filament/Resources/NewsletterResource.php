<?php

namespace App\Filament\Resources;

use Closure;
use Filament\Forms;
use Filament\Tables;
use App\Models\Newsletter;
use Illuminate\Support\Str;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\NewsletterResource\Pages;
use App\Filament\Resources\NewsletterResource\RelationManagers;

class NewsletterResource extends Resource
{
    protected static ?string $model = Newsletter::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    protected static ?string $navigationGroup = 'Members Area Content';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                ->schema([
                    Forms\Components\Grid::make(2)
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(2048),
                        ]),
                Forms\Components\Select::make('year')
                        ->options([
                            '2029' => '2029',
                            '2028' => '2028',
                            '2027' => '2027',
                            '2026' => '2026',
                            '2025' => '2025',
                            '2024' => '2024',
                            '2023' => '2023',
                            '2022' => '2022',
                            '2020' => '2020',
                            '2019' => '2019',
                            '2018' => '2018',
                            '2017' => '2017',
                            '2016' => '2016',
                            '2015' => '2015',
                            '2014' => '2014',
                            '2013' => '2013',
                            '2012' => '2012',
                        ])->required(),

                Forms\Components\Toggle::make('active')
                    ->required(),
                Forms\Components\DatePicker::make('published_at')
                ->label('Date Published'),

            ])->columnSpan(8),

            Forms\Components\Card::make()
            ->schema([
                Forms\Components\FileUpload::make('location'),

            ])->columnSpan(4)
                ])->columns(12);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('year')->sortable()->searchable(),
                TextColumn::make('title')->sortable()->searchable(),
                TextColumn::make('created_at')->date(),
            ])
            ->filters([
                //
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListNewsletters::route('/'),
            'create' => Pages\CreateNewsletter::route('/create'),
            'view' => Pages\ViewNewsletter::route('/{record}'),
            'edit' => Pages\EditNewsletter::route('/{record}/edit'),
        ];
    }
}
