<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;


class Welcome extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct()
    {
        //
    }

    public function build(){
        $user = Auth::user();
        $this->from(config('mail.from.address'),config('mail.from.name'))
            ->subject('Welcome to my friend list!')
            ->view('mail.welcome',['user'=>$user]);
    }
}
