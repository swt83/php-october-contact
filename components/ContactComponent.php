<?php

namespace Travis\Contact\Components;

use Cms\Classes\ComponentBase;
use Travis\Contact\Classes\Forms\ContactForm;
use Travis\Contact\Models\Settings;

class ContactComponent extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'Contact Form',
            'description' => 'Add a contact form to your website.'
        ];
    }

    public function defineProperties()
    {
        return [
            'is_allow_important' => [
                 'title' => 'Allow Important Inquiry',
                 'description' => 'Allow a message to be flagged as important.',
                 'default' => 0,
                 'type' => 'dropdown',
                 'options' => [0 => 'No', 1 => 'Yes'],
            ],
            'important_description' => [
                 'title' => 'Important Checkbox Description',
                 'description' => 'Customize the text beside the "is_important" checkbox.',
                 'default' => 'Is this a press inquiry?',
                 'placeholder' => 'Is this a press inquiry?',
                 'type' => 'text',
            ],
            'button' => [
                 'title' => 'Button Text',
                 'description' => 'Change the default button text.',
                 'default' => 'Submit',
                 'placeholder' => 'Submit',
                 'type' => 'text',
            ]
        ];
    }

    function onRun()
    {
        // load settings
        $settings = Settings::instance()
                ->toArray(); // auto-cached

        // if post...
        if (\Request::isMethod('post'))
        {
            // redirect
            return ContactForm::run($settings);
        }

        // if recaptcha...
        if (ex($settings, 'is_recaptcha'))
        {
            // inject
            $this->addJs('https://www.google.com/recaptcha/api.js');
        }

        // bind
        $this->page['input'] = ContactForm::all();
        $this->page['alert'] = ContactForm::get_alert();
        $this->page['settings'] = $settings;
    }

    public function onRender()
    {
        // bind
        $this->page['properties'] = $this->getProperties(); // auto-cached
    }
}