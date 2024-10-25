<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use App\Mail\AcceptedMail;
use App\Mail\RejectedMail;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\ViewRecord;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf;

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

            Action::make('downloadPdf')
                    ->label('Download PDF')
                    ->action(fn ($record) => $this->generatePdf($record))
        ];
    }

    protected function generatePdf($record)
    {
        // Extract necessary data from the record
        $user_name = $record->user->name; // Assuming user relationship exists
        $user_email = $record->user->email;
        $phone = $record->phone; // Assuming phone is available in the record
        $address = $record->address; // Assuming address is available in the record
        $products = $record->orderItems; // Assuming orderItems relationship exists
        $total = $record->total; // Assuming total is available in the record

        $pdf = Pdf::loadView('src.screens.orders.pdf', [
            'user_name' => $user_name,
            'user_email' => $user_email,
            'phone' => $phone,
            'address' => $address,
            'products' => $products,
            'total' => $total,
            'record' => $record,
        ]);

        return response()->streamDownload(
            fn () => print($pdf->output()), 
            "order-{$record->id}.pdf"
        );
    }

}
