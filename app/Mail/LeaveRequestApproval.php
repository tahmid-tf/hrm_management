<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class LeaveRequestApproval extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $user;
    public $status;
    public $admin_comment;
    public $leave_type;
    public $start_date;
    public $end_date;

    /**
     * Create a new message instance.
     */

    public function __construct($user, $status, $admin_comment, $leave_type, $start_date, $end_date)
    {
        $this->user = $user;
        $this->status = $status;
        $this->admin_comment = $admin_comment;
        $this->leave_type = $leave_type;
        $this->start_date = $start_date;
        $this->end_date = $end_date;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Your Leave Request has been ' . $this->status
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.leave_status_update',
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
