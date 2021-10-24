<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMassageToUserNotActive extends Mailable
{
    use Queueable, SerializesModels;
    private $user;
    private $sePrice;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( $sePrice, $user )
    {
       
        $this->user = $user;
        $this->sePrice = $sePrice;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.sendMassageToUserNotActive',['price' => $this->sePrice,  'user' => $this->user]);
    }
}
