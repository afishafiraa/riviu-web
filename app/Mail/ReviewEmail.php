<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReviewEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $id_random;
    public $data;


/**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($id_random,$data)
    {
        $this->id_random = $id_random;
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        return $this->subject('Ayo isi penilaian layanan myIndihome')->view('email.review');
        
    }
}
