<?php

namespace Travis\Contact;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
	public function registerComponents()
	{
	    return [
	        'Travis\Contact\Components\ContactComponent' => 'contactForm'
	    ];
	}

    public function registerSettings()
    {
    	return [
	        'settings' => [
	            'label'       => 'Settings',
	            'description' => 'Manage contact form delivery settings.',
	            'category'    => 'Contact Form',
	            'icon'        => 'icon-envelope',
	            'class'       => 'Travis\Contact\Models\Settings',
	            'order'       => 500,
	            'keywords'    => 'contact form',
	            'permissions' => ['travis.contact.manage_contact']
	        ]
	    ];
    }

    public function registerMailTemplates()
	{
	    return [
	        'travis.contact::mail.message' => 'The email sent to you from the contact form.',
	    ];
	}
}
