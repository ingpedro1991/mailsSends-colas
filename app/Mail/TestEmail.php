<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
    * The objMsg instance.
    *
    * @var objMsg
    */
    public $objMsg;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($objMsg)
    {
        $this->objMsg = $objMsg;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.test-mail')
                     ->with([
                        'quienEnvia' => $this->objMsg->quienEnvia,
                        'asunto' => $this->objMsg->asunto,
                        'emailQuienEnvia' => $this->objMsg->emailQuienEnvia,
                        'mensaje' => $this->objMsg,
                    ]);
    }
}
