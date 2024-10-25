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
                })
                ->successNotification(function () {
                    return [
                        'title' => 'Order Accepted',
                        'body' => 'Your order has been accepted.',
                    ];
                }),

            Action::make('reject')
                ->label('Reject')
                ->color('danger')
                ->action(function ($record) {
                    Mail::to($record->user->email)->send(new RejectedMail($record));
                }),

            Action::make('downloadPdf')
                ->label('Download PDF')
                ->action(fn($record) => $this->generatePdf($record))
        ];
    }

    protected function generatePdf($record)
    {
        $user_name = $record->user->name;
        $user_email = $record->user->email;
        $phone = $record->phone;
        $address = $record->address;
        $products = $record->orderItems;
        $total = $record->total;

        $pdf = Pdf::loadView('src.screens.orders.pdf', [
            'user_name' => $user_name,
            'user_email' => $user_email,
            'phone' => $phone,
            'address' => $address,
            'products' => $products,
            'total' => $total,
            'record' => $record,
        ]);

        return response()->stream(
            fn() => print($pdf->output()), 
            200, 
            [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => "attachment; filename=\"order-{$record->id}.pdf\""
            ]
        );
    }
}
