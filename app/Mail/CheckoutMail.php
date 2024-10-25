<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CheckoutMail extends Mailable
{
    use Queueable, SerializesModels;

    public $cartItems;
    public $total;

    public function __construct($cartItems, $total)
    {
        $this->cartItems = $cartItems;
        $this->total = $total;
    }

    public function build()
    {
        return $this->view('emails.checkout')
            ->subject('New Checkout Order')
            ->with([
                'cartItems' => $this->cartItems,
                'total' => $this->total
            ]);
    }
}
