<?php namespace Travis\Contact\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class Messages extends Controller
{
    public $implement = ['Backend\Behaviors\ListController','Backend\Behaviors\FormController'];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public $requiredPermissions = [
        'travis.contact.manage_contact' 
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Travis.Contact', 'contact', 'messages');
    }
}