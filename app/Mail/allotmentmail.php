<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class allotmentmail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $name;
    public $enroll_number;
    public $room_number;
    public $allotment_date;

    public function __construct($subject, $name, $enroll_number, $room_number, $allotment_date)
    {
        $this->subject = $subject;
        $this->name = $name;
        $this->enrolment_number = $enroll_number;
        $this->room_number = $room_number;
        $this->allotment_date = $allotment_date;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->subject,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.allotmentmail',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
