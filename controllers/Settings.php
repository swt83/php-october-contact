<?php namespace Travis\Contact\Controllers;

use Backend\Classes\Controller;
use System\Classes\SettingsManager;

class Settings extends Controller
{
    public $implement = ['Backend\Behaviors\FormController'];

    public $formConfig = 'config_form.yaml';

    public $requiredPermissions = [
        'travis.contact.manage_contact'
    ];

    public function __construct()
    {
        parent::__construct();
        SettingsManager::setContext('Travis.Contact', 'contact', 'settings');
    }
}