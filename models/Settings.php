<?php

namespace Travis\Contact\Models;

use Model;

class Settings extends Model
{
	use \October\Rain\Database\Traits\Validation;

    public $rules = [
    	'recipient_email' => 'required|email'
    ];

    public $implement = ['System.Behaviors.SettingsModel'];

    public $settingsCode = 'travis_contact_settings';

    public $settingsFields = 'fields.yaml';
}