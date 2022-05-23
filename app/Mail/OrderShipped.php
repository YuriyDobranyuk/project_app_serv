<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $currentUser;
    public $file;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order, $currentUser, $file)
    {
        $this->order = $order;
        $this->currentUser = $currentUser;
        $this->orderFile = $file;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.managerOrderSend', ['url' => $this->order]);
    }
}
