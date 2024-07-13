<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HostingAccountResource\Pages;
use App\Filament\Resources\HostingAccountResource\RelationManagers;
use App\Models\Client;
use App\Models\HostingAccount;
use App\Models\Plan;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HostingAccountResource extends Resource
{
    protected static ?string $model = HostingAccount::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('client_id')
                ->label('Cliente')
                    ->options(
                        fn () => Client::pluck('name', 'id')
                    )
                    ->searchable()
                    ->required(),
                Select::make('plan_id')
                    ->label('Plano')
                    ->options(
                        fn () => Plan::pluck('name', 'id')
                    )
                    ->required(),
                TextInput::make('domain')
                    ->label('Domínio')

                    ->required(),
                Select::make('status')
                ->options([
                    'active' => 'Ativo',
                    'suspended' => 'Suspenso',
                    'canceled' => 'Cancelado',
                ])

                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('client.name')
                    ->label('Cliente')
                    ->sortable(),
                TextColumn::make('plan.name')
                    ->label('Plano')
                    ->sortable(),
                TextColumn::make('domain')
                    ->label('Domínio')
                    ->searchable(),
                TextColumn::make('status')
                    ->label('Status')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListHostingAccounts::route('/'),
            'create' => Pages\CreateHostingAccount::route('/create'),
            'view' => Pages\ViewHostingAccount::route('/{record}'),
            'edit' => Pages\EditHostingAccount::route('/{record}/edit'),
        ];
    }
}
