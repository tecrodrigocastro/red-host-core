<?php

namespace App\Filament\Resources\HostingAccountResource\Pages;

use App\Filament\Resources\HostingAccountResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewHostingAccount extends ViewRecord
{
    protected static string $resource = HostingAccountResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
