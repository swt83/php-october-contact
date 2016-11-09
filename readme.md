# Contact for October

Add a contact form to your website.

## Install

Add as a submodule to your project:

```bash
$ git submodule add git@github.com:swt83/php-october-contact.git plugs/travis/contact
```

## Usage

Install the plugin, define the required form settings, then add the component to your page.  Your mail settings must be corrent and functioning.

## Notes

- To customize the form, copy ``components/contactcomponent/default.htm`` to your own new partial.
- For the reCAPTCHA to work, your template must include the ``{% styles %}`` markup.