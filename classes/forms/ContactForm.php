<?php

namespace Travis\Contact\Classes\Forms;

use Mail;
use Travis\Reformed;
use Travis\Recaptcha;
use Travis\Contact\Models\Message;

class ContactForm extends Reformed
{
	public static $rules = [
		'first' => 'required',
		'last' => 'required',
		'email' => 'required|email',
		'subject' => 'required',
		'contact_message' => 'required', // "message" is a laravel keyword?
	];

	public static function run($settings)
	{
		// if validates...
		if (static::is_valid())
		{
			// capture
			$input = static::all();

			// default
			$pass = true;

			// if using recaptcha...
			if (ex($settings, 'is_recaptcha'))
			{
				// validate
				$pass = Recaptcha::verify(ex($settings, 'recaptcha_secret_key'), ex($input, 'g-recaptcha-response'));
			}

			// if NOT pass...
			if (!$pass)
			{
				// set alert
				static::set_alert('Message not sent.', 'red');

				// return w/ errors
				return \Redirect::to(\URL::current())->withInput();
			}

			// save
			$record = new Message;
			$record->first = static::get('first');
			$record->last = static::get('last');
			$record->email = static::get('email');
			$record->subject = static::get('subject');
			$record->is_important = static::get('is_important') ? 1 : 0;
			$record->message = static::get('contact_message');
			$record->save();

			// send email
			static::send($settings, $input);

			// set alert
			static::set_alert('Message sent.', 'green');

			// return
			return \Redirect::to(\URL::current());
		}

		// return w/ errors
		return \Redirect::to(\URL::current())->withInput();
	}

	protected static function send($settings, $input)
	{
		// send...
		Mail::send('travis.contact::mail.message', $input, function($message) use($settings, $input)
		{
		    $message->to(ex($settings, 'recipient_email'));
		    $message->from(ex($input, 'email'));
		    $message->replyTo(ex($input, 'email'));
		    $message->subject(ex($input, 'subject'));
		});
	}
}