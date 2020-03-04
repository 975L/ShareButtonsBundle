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

### Step 3: Create MySql table

You can use `php bin/console make:migration` to create the migration file as documented in [Symfony's Doctrine docs](https://symfony.com/doc/current/doctrine.html) OR use `/Resources/sql/sharebuttons.sql` to create the table `sharebuttons`. The `DROP TABLE` is commented to avoid dropping by mistake.

### Step 4: Integration with your website

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

### Step 5: Define configuration

You need to define the Role needed to access data and if you wish to save statistics of shares. You can do this by using `sharebuttons_config` Route or directly in your `/config/config_bundles.yaml`, in this case, do not forget to clear the cache after. Options are described in the file `/Resources/config/bundle.yaml`.

To save time and avoid database access at each share, the statistics are saved, as SQL queries, in the file `/var/tmp/sqlFile.sql` (you need to create the folder). **You must import (and then delete) this sql file to your database on a regular basis, to enter them, in one shot, in the database. Or you can use the bash script `ImportSqlFile.sql` in [c975L/ServicesBundle](https://github.com/975L/ServicesBundle) to achieve it by simply adding a cron :)**

### How to use

ShareButtonsBundle use [Fontawesome](https://fontawesome.com) for icons so **you have to load it from your web page**. You may use [c975L/IncludeLibraryBundle](https://github.com/975L/IncludeLibraryBundle) that will allow you to simply add `{{ inc_lib('fontawesome', 'css') }}` in your layout.html.twig, but if you use [c975L/SiteBundle](https://github.com/975L/SiteBundle) it's already there in `stylesheets` section :).

ShareButtonsBundle is quite easy to use. You simply have to add the following code in your Twig templates, that uses the provided Twig Extension:

```twig
{{ sharebuttons(['SHARE1', 'SHARE2', 'SHARE3', etc.], 'STYLE[distinct|ellipse|toolbar](default distinct)', 'SIZE[lg|md|sm|xs](default md)', 'ALIGNMENT[left|center|right](default center)', DISPLAY_ICON[true|false](default true), DISPLAY_TEXTX[true|false](default false), 'URL') }}

{# If you only need "main" shares you can also use the 'main' keyword as in the following #}
{{ sharebuttons('main', 'STYLE[distinct|ellipse|toolbar](default distinct)', 'SIZE[lg|md|sm|xs](default md)', 'ALIGNMENT[left|center|right](default center)', DISPLAY_ICON[true|false](default true), DISPLAY_TEXT[true|false](default false), 'URL') }}

{# The simpliest use is the following #}
{{ sharebuttons('main', 'STYLE[distinct|ellipse|toolbar](default distinct)') }}
```

You can also use a dropdown button with the provided Twig Extension:

```twig
{{ sharebuttons_dropdown(['SHARE1', 'SHARE2', 'SHARE3', etc.], 'URL', 'SIZE[lg|md|sm|xs](default md)', DISPLAY_ICON[true|false](default true), DISPLAY_TEXTX[true|false](default false)) }}

{# If you only need "main" shares you can also use the 'main' keyword as in the following #}
{{ sharebuttons_dropdown('main', 'URL', 'SIZE[lg|md|sm|xs](default md)', DISPLAY_ICON[true|false](default true), DISPLAY_TEXTX[true|false](default false)) }}

{# The simpliest use is the following #}
{{ sharebuttons_dropdown('main', 'URL' }}
```

public function sharebuttonsDropdown(Environment $environment, $shares, $size = 'md', $url, $displayIcon = true, $displayText = false)

Use the Route `sharebuttons_dashboard` (url: "/sharebuttons/dashboard") to access Dashboard.

### Available networks

You can use any the following name, in the Twig Extension explained above, for its corresponding network:

- facebook
- twitter
- linkedin
- pinterest
- email
- blogger
- buffer
- delicious
- evernote
- pocket
- reddit
- skype
- stumbleupon
- tumblr
- whatsapp
- wordpress

If this project **help you to reduce time to develop**, you can sponsor me via the "Sponsor" button at the top :)
