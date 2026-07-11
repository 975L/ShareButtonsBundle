# ShareButtonsBundle

**THIS BUNDLE HAS BEEN REPLACED BY [c975L/SocialBundle](https://github.com/975L/SocialBundle)**

Symfony bundle that provides a Twig function to embed share buttons for popular social networks, with SVG icons included and multiple display styles.

[![GitHub](https://img.shields.io/github/license/975L/ShareButtonsBundle)](https://github.com/975L/ShareButtonsBundle/blob/master/LICENSE)
[![Packagist Version](https://img.shields.io/packagist/v/c975l/sharebuttons-bundle)](https://packagist.org/packages/c975l/sharebuttons-bundle)
[![PHP Version](https://img.shields.io/packagist/php-v/c975l/sharebuttons-bundle)](https://packagist.org/packages/c975l/sharebuttons-bundle)

---

## Features

- Single Twig function `sharebuttons()` to embed share buttons anywhere in a template
- Supports a configurable list of social networks
- `main` shorthand to display the most common networks
- Multiple display styles: `distinct`, `ellipse`, `circle`, `toolbar`
- Alignment options: `left`, `center`, `right`
- Icon-only or icon + text display
- Optional custom URL override
- SVG icons embedded — no external CSS or JS required
- Configuration managed via [c975L/ConfigBundle](https://github.com/975L/ConfigBundle)

---

## Requirements

- PHP >= 8.0
- [c975L/ConfigBundle](https://github.com/975L/ConfigBundle)

---

## Installation

### Download

```bash
composer require c975l/sharebuttons-bundle
```

### Enable routes

Add the following to `config/routes.yaml`:

```yaml
c975_l_share_buttons:
    resource: "@c975LShareButtonsBundle/"
    type: attribute
    prefix: /
    # For multilingual websites:
    # prefix: /{_locale}
    # defaults: { _locale: '%locale%' }
    # requirements:
    #     _locale: en|fr|es
```

### Load configuration values

```bash
php bin/console c975l:config:load-all
```

Then use the ConfigBundle dashboard to set the values for each key.

---

## Usage

Use the `sharebuttons()` Twig function to render share buttons:

```twig
{# Full signature #}
{{ sharebuttons(shares, style, alignment, displayIcon, displayText, url) }}

{# Display the main social networks with default style #}
{{ sharebuttons('main') }}

{# Custom selection, ellipse style, centered, icon only #}
{{ sharebuttons(['facebook', 'linkedin', 'email'], 'ellipse', 'center', true, false) }}

{# Override the shared URL #}
{{ sharebuttons('main', 'distinct', 'center', true, false, 'https://example.com/my-page') }}
```

| Parameter | Type | Default | Description |
| --- | --- | --- | --- |
| `shares` | `array\|'main'` | — | Network list, or `'main'` for the default set |
| `style` | `string` | `'distinct'` | `distinct`, `ellipse`, `circle`, or `toolbar` |
| `alignment` | `string` | `'center'` | `left`, `center`, or `right` |
| `displayIcon` | `bool` | `true` | Show network icon |
| `displayText` | `bool` | `false` | Show network name |
| `url` | `string\|null` | `null` | Override the shared URL (defaults to current page) |

---

If this project **helps you save development time**, consider sponsoring via the **Sponsor** button at the top of the GitHub page. Thank you!
