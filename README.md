# ShareButtonsBundle

ShareButtonsBundle does the following:

- Defines buttons to share web page on different tools.

This Bundle relies on the use of [Bootstrap](http://getbootstrap.com/) and [Fontawesome](https://fontawesome.com).

[ShareButtonsBundle dedicated web page](https://975l.com/en/pages/sharebuttons-bundle).

[ShareButtonsBundle API documentation](https://975l.com/apidoc/c975L/ShareButtonsBundle.html).

## Bundle installation

### Step 1: Download the Bundle

Use [Composer](https://getcomposer.org) to install the library

```bash
    composer require c975L/sharebuttons-bundle
```

### Step 2: Enable the Routes

Then, enable the routes by adding them to the `/config/routes.yaml` file of your project:

```yml
c975_l_share_buttons:
    resource: "@c975LShareButtonsBundle/Controller/"
    type:     annotation
    prefix: /
    #Multilingual website use the following
    #prefix: /{_locale}
    #defaults:   { _locale: '%locale%' }
    #requirements:
    #    _locale: en|fr|es
```

### Step 3: Integration with your website

It is strongly recommended to use the [Override Templates from Third-Party Bundles feature](http://symfony.com/doc/current/templating/overriding.html) to integrate fully with your site.

For this, simply, create the following structure `app/Resources/c975LExceptionCheckerBundle/views/` in your app and then duplicate the file `layout.html.twig` in it, to override the existing Bundle file, then apply your needed changes, such as language, etc.

In `layout.html.twig`, it will mainly consist to extend your layout and define specific variables, i.e. :

```twig
{% extends 'layout.html.twig' %}

{# Defines specific variables #}
{% set title = 'ShareButtons' %}

{% block content %}
    {% block sharebuttons_content %}
    {% endblock %}
{% endblock %}
```

### Step 4: Made use of assets

To use styles and javascript you have to include them from `public/css/` and `public/js/`:

```twig
<link rel="stylesheet" href="bundles/c975lsite/css/animations.min.css">
<script src="bundles/c975lsharebuttons/js/functions.min.js"></script>
```

### Step 5: Define configuration

You need to define the Role needed to access data and if you wish to save statistics of shares. You can do this by using `sharebuttons_config` Route or directly in your `/config/config_bundles.yaml`, in this case, do not forget to clear the cache after. Options are described in the file `/Resources/config/bundle.yaml`.

### How to use

ShareButtonsBundle use [Fontawesome](https://fontawesome.com) for icons, their svgs are included in the bundle to avoid having to link to fontawesome css/js.

ShareButtonsBundle is quite easy to use. You simply have to add the following code in your Twig templates, that uses the provided Twig Extension:

```twig
{{ sharebuttons(['SHARE1', 'SHARE2', 'SHARE3', etc.], 'STYLE[distinct|ellipse|circle|toolbar](default distinct)', 'ALIGNMENT[left|center|right](default center)', DISPLAY_ICON[true|false](default true), DISPLAY_TEXT[true|false](default false), 'URL') }}

{# If you only need "main" shares you can also use the 'main' keyword as in the following #}
{{ sharebuttons('main', 'STYLE[distinct|ellipse|circle|toolbar](default distinct)', 'ALIGNMENT[left|center|right](default center)', DISPLAY_ICON[true|false](default true), DISPLAY_TEXT[true|false](default false), 'URL') }}

{# The simpliest use is the following #}
{{ sharebuttons('main', 'STYLE[distinct|ellipse|circle|toolbar](default distinct)') }}
```

Use the Route `sharebuttons_dashboard` (url: "/sharebuttons/dashboard") to access Dashboard.

### Available networks

You can use any the following name, in the Twig Extension explained above, for its corresponding network:

- facebook
- bluesky
- linkedin
- pinterest
- email
- blogger
- buffer
- delicious
- evernote
- reddit
- skype
- stumbleupon
- tumblr
- whatsapp
- wordpress

If this project **help you to reduce time to develop**, you can sponsor me via the "Sponsor" button at the top :)
