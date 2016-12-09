# Contact for October

Add a contact form to your website.

## Install

Add as a submodule to your project:

```bash
$ git submodule add git@github.com:swt83/php-october-contact.git plugins/travis/contact
```

## Usage

Install the plugin, define the required form settings, then add the component to your page.  Your mail settings must be current and functioning.  To use to optional reCAPTCHA, go to [Google](https://www.google.com/recaptcha/admin#list) to register your form and get the required keys.

## Customization

Copy the contents of ``components/contactcomponent/default.htm`` to your own new partial, then open the ``components/ContactComponent.php`` file and copy the ``onRun()`` function contents to the ``onStart()`` function of the page using the partial you just created.

## Notes

For the reCAPTCHA to work, your template must include the ``{% styles %}`` markup.
