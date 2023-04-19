<?php

namespace App\Mail;

use GuzzleHttp\Psr7\Message;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class VerificationMail extends Mailable
{
	use Queueable, SerializesModels;

	public $verificationUrl;

	public $user;

	/**
	 * Create a new message instance.
	 */
	public function __construct($verificationUrl, $user)
	{
		$this->verificationUrl = $verificationUrl;
		$this->user = $user;
	}

	public function envelope(): Envelope
	{
		return new Envelope(
			subject: 'Verification Mail',
		);
	}

	public function content(): Content
	{
		return new Content(
			view: 'components.emails.welcome',
		);
	}

	public function build()
	{
		return $this->from('from@example.com')
					->to($this->user->email)
					->subject('Verification Mail')
					->with([
						'username'         => $this->user->username,
						'verificationLink' => $this->verificationUrl,
					]);
	}
}
