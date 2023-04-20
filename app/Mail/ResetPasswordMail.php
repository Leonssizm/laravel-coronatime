<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ResetPasswordMail extends Mailable
{
	use Queueable, SerializesModels;

	public $verificationUrl;

	public $user;

	public function __construct($verificationUrl, $user)
	{
		$this->verificationUrl = $verificationUrl;
		$this->user = $user;
	}

	public function envelope(): Envelope
	{
		return new Envelope(
			subject: 'Reset Password Mail',
		);
	}

	public function content(): Content
	{
		return new Content(
			view: 'components.emails.recover-password',
		);
	}

	public function build()
	{
		return $this->from('from@example.com')
					->to($this->user->email)
					->subject('Recover Password Mail')
					->with([
						'username'         => $this->user->username,
						'verificationLink' => $this->verificationUrl,
					]);
	}
}
