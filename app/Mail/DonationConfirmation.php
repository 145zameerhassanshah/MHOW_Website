<?php

namespace App\Mail;

use App\Models\Donation;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class DonationConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $donation;
    public $donor;

    public function __construct(Donation $donation)
    {
        $this->donation = $donation;
        $this->donor = $donation->donor;
       
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Thank You for Your Donation',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'admin.email.donation_confirmation',
            with: [
                'donation' => $this->donation,
                'donor' => $this->donor,
                
            ]
        );
    }

    public function attachments(): array
    {
        return [];
    }
}