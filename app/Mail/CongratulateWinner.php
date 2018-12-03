<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Lead;

class CongratulateWinner extends Mailable
{
    use Queueable, SerializesModels;

    public $lead;
    public $actionUrl;
    public $subject;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Lead $lead, $subject = 'Congratulations')
    {
        $this->lead = $lead;
        $this->actionUrl = 'https://action-to-controller-here';
        $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email.congratulate-winner-content')->subject($this->subject);
    }
}
