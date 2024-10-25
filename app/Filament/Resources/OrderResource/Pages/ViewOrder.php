<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use App\Mail\AcceptedMail;
use App\Mail\RejectedMail;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\ViewRecord;
use Illuminate\Support\Facades\Mail;

class ViewOrder extends ViewRecord
{
    protected static string $resource = OrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('accept')
                    ->label('Accept')
                    ->color('success')
                    ->action(function ($record) {
                        Mail::to($record->user->email)->send(new AcceptedMail($record));
                    }),

            Action::make('Reject')
                    ->label('Reject')
                    ->color('danger')
                    ->action(function ($record) {
                        Mail::to($record->user->email)->send(new RejectedMail($record));
                    }),

        ];
    }
}
