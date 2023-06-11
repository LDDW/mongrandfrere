<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Attachment;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    public array $customer;

    /**
     * Create a new message instance.
     */
    public function __construct(array $customer)
    {
        $this->customer = $customer;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address($this->customer['email'], $this->customer['firstname'] . ' ' . $this->customer['lastname']),
            subject: 'Nouveau contact de ' . $this->customer['firstname'] . ' ' . $this->customer['lastname'],
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.contact',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        if(isset($this->customer['file'])) {
            return [
                Attachment::fromStorage('contact/'.$this->customer['file']->hashName())
            ];
        } else {
            return [];
        }
    }
}
